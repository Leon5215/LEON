<?php
include("db.php");

$id = $_POST['id'];
$account = $_POST['account'];
$password = $_POST['password'];
$name = $_POST['name'];
$type = $_POST['type'];

if (!empty($password)) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE user SET account=?, password=?, name=?, type=? WHERE id=?");
    $stmt->bind_param("ssssi", $account, $hashed, $name, $type, $id);
} else {
    $stmt = $conn->prepare("UPDATE user SET account=?, name=?, type=? WHERE id=?");
    $stmt->bind_param("sssi", $account, $name, $type, $id);
}

$stmt->execute();
header("Location: userlist.php");
exit;
