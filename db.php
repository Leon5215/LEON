<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leon"; // 你自己的資料庫名稱

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}
?>
