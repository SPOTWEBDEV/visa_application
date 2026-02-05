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

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    $Product_Name = $_POST['ProductName'] ?? '';
    $DailyPercent = trim($_POST['DailyPercent'] ?? '');
    $MinimuimInvestment = trim($_POST['MinimuimInvestment'] ?? '');
    $MaximuimInvestment = trim($_POST['MaximuimInvestment'] ?? '');
    $MonthlyPercent = trim($_POST['MonthlyPercent'] ?? '');

    $MaximuimInvestment = trim($_POST['MaximuimInvestment'] ?? '');
    if (!empty($Product_Name) && !empty($DailyPercent) && !empty($MinimuimInvestment) && !empty($MaximuimInvestment) && !empty($MonthlyPercent)) {
        $statement = $connection->prepare("INSERT INTO plans(name, daily_percent, min_invest, max_invest, monthly_percent) VALUES(:name, :daily_percent, :min_invest, :max_invest, :monthly_percent)");


        $statement->bindParam(":name", $Product_Name);
        $statement->bindParam(":daily_percent", $DailyPercent);
        $statement->bindParam(":min_invest", $MinimuimInvestment);
        $statement->bindParam(":max_invest", $MaximuimInvestment);
        $statement->bindParam(":monthly_percent", $MonthlyPercent);
        if ($statement->execute()) {
         echo json_encode(['status' => 'success', 'message' => 'Product added successfully']);
            exit;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'input must not be invalid']);
        exit;
    }
}


?>