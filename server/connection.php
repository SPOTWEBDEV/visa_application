<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function checkUrlProtocol($url)
{
    $parsedUrl = parse_url($url);
    if (isset($parsedUrl['scheme'])) {
        return $parsedUrl['scheme'];
    } else {
        return 'invalid';
    }
}

$currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


$request = checkUrlProtocol($currentUrl);
define("HOST", "localhost");


if ($request === 'https') {
    $sitename = "PAIX VISA AND TOURIST SERVICE";
    $domain = "https://paix-vts.com/";
    $site_email = "support@paid-vts.com";
    define("USER", "");
    define("PASSWORD", "");
    define("DATABASE", "");


    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
} elseif ($request === 'http') {
    $sitename = "PAIX VISA AND TOURIST Service";
    $domain = "http://localhost/visa_application";
    $site_email = "support@paid-vts.com";
    define("USER", "root");
    define("PASSWORD", "");
    define("DATABASE", "visa_application");


    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
} else {
    $sitename = "PAIX VISA AND TOURIST SERVIC";
    $domain = "http://localhost/visa_application";
    $site_email = "support@paid-vts.com";
    define("USER", "root");
    define("PASSWORD", "");
    define("DATABASE", "visa_application");


    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
};

// session_start();
