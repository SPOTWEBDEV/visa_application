<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
header("Content-Type: application/json");

if (!isset($_SESSION['admin_id'])) {
    echo json_encode(["status" => "error", "message" => "un-authorized access"]);
    exit;
}

include "../../server/connection.php";

if (!isset($_GET['decline_id']) || !is_numeric($_GET['decline_id'])) {
    echo json_encode(["status" => "error", "message" => "invalid request"]);
    exit;
}

$id = (int) $_GET['decline_id'];

if (empty($id)) {
    echo json_encode(["status" => "error", "message" => "invalid ID"]);
    exit;
}

$statement = $connection->prepare("UPDATE deposits SET status = 'rejected' WHERE id = :id");
if ($statement->execute([":id" => $id])) {
    echo json_encode(["status" => "success", "message" => "deposit rejected"]);
} else {
    echo json_encode(["status" => "error", "message" => "failed to update"]);
}
exit;
