<?php
session_start();
include("db.php");

if (!isset($_GET['id'])) {
    die("缺少車輛 ID");
}

$id = intval($_GET['id']);

// 先查詢圖片檔案名稱
$stmt = $conn->prepare("SELECT image FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $imagePath = "uploads/" . $row['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath); // 刪除圖片
    }

    // 刪除資料
    $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: carlist.php");
    exit;
} else {
    echo "找不到該車輛資料";
}
?>
