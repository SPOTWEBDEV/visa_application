<?php
header('Content-Type: application/json');
include '../../../server/connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
        mysqli_close($connection);
        exit();
    }
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
        mysqli_close($connection);
        exit();
    }
    
   
    $query = "SELECT id, passwords FROM admin WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
        mysqli_close($connection);
        exit();
    }
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $email);
    
  
    if (!mysqli_stmt_execute($stmt)) {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        exit();
    }
    

    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['passwords'])) {
            session_start();
            $_SESSION['admin_id'] = $user['id'];
            
            echo json_encode(['status' => 'success', 'message' => 'Login successful']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'User does not exist']);
    }
    
    
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    exit();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit();
}
?>