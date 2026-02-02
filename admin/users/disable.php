
<?php 
header("content-Type: application/json");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 include("../../server/connection.php"); 
if (!isset($_SESSION['admin_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
    exit; 
}


if (!isset($_GET['disable_user']) || !is_numeric($_GET['disable_user'])) {
     echo json_encode(['status' => 'error', 'message' => 'invalid request']);
    exit; 
}

$id = (int) $_GET['disable_user'];


$statement = $connection->prepare("UPDATE users SET status = :inactive WHERE id = :id ");
$statement->bindValue(':inactive', 'inactive', PDO::PARAM_STR);
$statement->bindValue(':id', $id, PDO::PARAM_STR);
 $statement->execute();

if (!$statement->rowCount() > 0 ) {
      echo json_encode(['status' => 'error', 'message' => 'user not found']);
    exit;  
}else{
    echo json_encode(['status' => 'success', 'message' => 'user disabled']);

}
