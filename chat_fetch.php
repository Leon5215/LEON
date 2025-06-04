<?php
include("db.php");

$sender = $_GET['sender'] ?? null;
$receiver = $_GET['receiver'] ?? null;

if (!$sender || !$receiver) exit;

$stmt = $conn->prepare("
    SELECT m.*, u.name 
    FROM messages m
    JOIN user u ON m.sender_id = u.id
    WHERE (sender_id = ? AND receiver_id = ?) 
       OR (sender_id = ? AND receiver_id = ?)
    ORDER BY created_at ASC
");

if (!$stmt) {
    die("SQL 錯誤: " . $conn->error); // 印出 SQL 錯誤訊息
}

$stmt->bind_param("iiii", $sender, $receiver, $receiver, $sender);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $name = htmlspecialchars($row['name']);
    $message = nl2br(htmlspecialchars($row['message']));
    $time = date("H:i", strtotime($row['created_at']));
    echo "<p><strong>{$name}:</strong> {$message} <small style='color:#999;'>({$time})</small></p>";
}
?>
