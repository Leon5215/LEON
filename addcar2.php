<?php
include("db.php");

$car_name = $_POST['car_name'];
$car_desc = $_POST['car_desc'];

$img_name = $_FILES['car_img']['name'];
$tmp_name = $_FILES['car_img']['tmp_name'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($img_name);

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if (move_uploaded_file($tmp_name, $target_file)) {
    $stmt = $conn->prepare("INSERT INTO cars (name, description, image) VALUES (?, ?, ?)");
    
    // 檢查 prepare 是否成功
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);  // ❗會顯示 SQL 錯誤細節
    }

    $stmt->bind_param("sss", $car_name, $car_desc, $img_name);
    $stmt->execute();

    echo "✅ 新增成功！<br><a href='carlist.php'>回到車輛清單</a>";
} else {
    echo "❌ 圖片上傳失敗。";
}
?>
