
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
    


if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];


if (!empty($id)){ 
    $statement = $connection->prepare("DELETE  FROM plans WHERE id = :id");
    $statement->bindValue(":id", $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'product deleted successfully']);
        exit;
        
    }else{
        echo json_encode(['status' => 'error', 'message' => 'product deletion failed']);
        exit;

    }
   
}


   
}



    
?>