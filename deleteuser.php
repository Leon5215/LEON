<?php
include("db.php");

$id = $_GET['id'];

// 避免刪除自己（可選功能）
session_start();
if ($_SESSION['user_id'] == $id) {
    die("無法刪除自己。");
}

$stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: userlist.php");
exit;
