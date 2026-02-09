<?php
header("Content-Type: application/json");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("../../server/connection.php");

if (!isset($_SESSION['admin_id'])) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
}

function respond($code, $status, $message, $extra = []) {
    http_response_code($code);
    echo json_encode(array_merge([
        "status" => $status,
        "message" => $message
    ], $extra));
    exit;
}

$action   = isset($_GET["action"]) ? strtolower(trim($_GET["action"])) : "";
$visaType = isset($_GET["visa_type"]) ? strtolower(trim($_GET["visa_type"])) : "";
$appRef   = isset($_GET["application_ref"]) ? trim($_GET["application_ref"]) : "";

if ($action === "" || $visaType === "" || $appRef === "") {
    respond(400, "error", "Missing required fields.");
}

if (!in_array($action, ["approve", "decline"], true)) {
    respond(400, "error", "Invalid action.");
}

$tableMap = [
    "business" => "business_visa_applications",
    "family" => "family_visa_applications",
    "immigration" => "immigration_visa_applications",
    "student" => "student_visa_applications",
    "travel" => "travel_visa_applications",
];

if (!isset($tableMap[$visaType])) {
    respond(400, "error", "Invalid visa type.");
}

$table = $tableMap[$visaType];
$newStatus = ($action === "approve") ? "approved" : "rejected";

/**
 * Only allow update when status is "submitted"
 * (You said: submitted should change to approved/declined)
 */
$checkSql = "SELECT status FROM {$table} WHERE application_ref = ? LIMIT 1";
$checkStmt = mysqli_prepare($connection, $checkSql);
if (!$checkStmt) {
    respond(500, "error", "Prepare failed (check): " . mysqli_error($connection));
}

mysqli_stmt_bind_param($checkStmt, "s", $appRef);

if (!mysqli_stmt_execute($checkStmt)) {
    $err = mysqli_stmt_error($checkStmt);
    mysqli_stmt_close($checkStmt);
    respond(500, "error", "Execute failed (check): " . $err);
}

$result = mysqli_stmt_get_result($checkStmt);
$row = $result ? mysqli_fetch_assoc($result) : null;
mysqli_stmt_close($checkStmt);

if (!$row) {
    respond(404, "error", "Application not found.");
}

$currentStatus = $row["status"] ?? "";

if ($currentStatus !== "submitted") {
    respond(400, "error", "Only SUBMITTED applications can be updated. Current: {$currentStatus}");
}

$updateSql = "UPDATE {$table} SET status = ? WHERE application_ref = ? LIMIT 1";
$updateStmt = mysqli_prepare($connection, $updateSql);
if (!$updateStmt) {
    respond(500, "error", "Prepare failed (update): " . mysqli_error($connection));
}

mysqli_stmt_bind_param($updateStmt, "ss", $newStatus, $appRef);

if (!mysqli_stmt_execute($updateStmt)) {
    $err = mysqli_stmt_error($updateStmt);
    mysqli_stmt_close($updateStmt);
    respond(500, "error", "Execute failed (update): " . $err);
}

$affected = mysqli_stmt_affected_rows($updateStmt);
mysqli_stmt_close($updateStmt);

if ($affected < 1) {
    respond(400, "error", "No row updated.");
}

respond(200, "success", "Application updated to {$newStatus}.", [
    "visa_type" => $visaType,
    "application_ref" => $appRef,
    "old_status" => $currentStatus,
    "new_status" => $newStatus
]);
