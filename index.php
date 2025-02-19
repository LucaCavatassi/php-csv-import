<?php
$db_name = "php-csv-import";
$db_connection = "mysql";
$db_host = "127.0.0.1";
$db_port = "8889";
$db_username = "root";
$db_password = "root";

$conn = new mysqli($db_host,$db_username,$db_password,$db_name,$db_port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Database connected successfully!";
}