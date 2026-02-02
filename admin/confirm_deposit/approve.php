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


if (!isset($_GET['approve_id']) || !is_numeric($_GET['approve_id'])) {
    die();
}

$id = isset($_GET['approve_id']) ? (int) $_GET['approve_id'] : 0;


if (empty($id)) {
   die();
}

try {
  
    
$connection->beginTransaction();
$statement = $connection->prepare("UPDATE deposits SET status = 'approved' WHERE id = :id");
if (!$statement->execute([":id" => $id])) {
      echo json_encode(["status" => "error", "message" => "approval failed"]);
      $connection->rollBack();
      exit;
}

 //get pending amount
$deposits = $connection->prepare("SELECT * FROM deposits WHERE id = ?");
$deposits->execute([$id]);
$amounts = $deposits->fetch();
$approved_amount = $amounts['amount'];
$user_id = $amounts['user_id'];


//update user balance
$update_users_balance = $connection->prepare("UPDATE users SET balance = balance + :amount WHERE id = :id ");
$update_users_balance->execute([":amount" => $approved_amount, ":id" =>  $user_id]);


 $connection->commit();
 echo json_encode(["status" => "success", "message" => "Deposit approved"]);
} catch (PDOException $e) {
   echo json_encode(["status" => "error", "message" => $e->getMessage()]);
   $connection->rollBack();
   exit;
}
