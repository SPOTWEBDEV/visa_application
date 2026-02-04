<?php

header('Content-Type: application/json');
include '../../../server/connection.php';

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (!empty($email) && !empty($password)) {
        // Prepare SQL statement
        $query = "SELECT * FROM admin WHERE email = ?";
        $stmt = mysqli_prepare($connection, $query);
        
        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "s", $email);
            
            // Execute statement
            mysqli_stmt_execute($stmt);
            
            // Get result
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                // if (password_verify($password, $user['passwords'])) {
                //     session_start();
                //     $_SESSION['admin_id'] = $user['id'];
                //     
                //     exit;
                //     } else {
                //         echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
                //         }

                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'User does not exist']);
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
    }
}