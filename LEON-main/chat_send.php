<?php
include("db.php");

$sender_id = $_POST['sender_id'] ?? null;
$receiver_id = $_POST['receiver_id'] ?? null;
$message = trim($_POST['message'] ?? '');

if ($sender_id && $receiver_id && $message !== '') {
    $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $sender_id, $receiver_id, $message);
    $stmt->execute();
}
?>
