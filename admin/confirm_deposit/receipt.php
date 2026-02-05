<?php
session_start();
header("Content-Type: application/json");
if (!isset($_SESSION['admin_id'])) {
   echo json_encode(["status" => "error", "message" => "un-authosized access"]);
   exit;
}
include "../../server/connection.php";


if (!isset($_GET['receipt_id']) && !is_numeric($_GET['receipt_id'])){
    echo json_encode(["status" => "error", "message" => "invalid request"]);
   exit;
}

$id = (int) $_GET['receipt_id'] ?? '';

if (empty($id)) {
    echo json_encode(["status" => "error", "message" => "not found"]);
   exit;
}
$statement = $connection->prepare("SELECT receipt FROM deposits WHERE id = :id");
$statement->execute([":id" => $id]);
$receipts = $statement->fetch();

if (!$receipts) {
  echo json_encode(["status" => "error", "message" => "no receipt found"]);
   exit;
}

$receipt_url = "../../uploads/" . $receipts['receipt'];

echo json_encode([
  "status" => "success",
  "receipt_url" => $receipt_url
]);