<?php
include("db.php");

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$current_image = $_POST['current_image'];

// 處理圖片上傳
if (!empty($_FILES['image']['name'])) {
    $target_dir = "uploads/";
    $new_image = time() . '_' . basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $new_image;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $new_image;
    } else {
        die("圖片上傳失敗！");
    }
} else {
    $image = $current_image; // 沒上傳新圖就用原圖
}

// 更新資料
$stmt = $conn->prepare("UPDATE cars SET name=?, description=?, image=? WHERE id=?");
$stmt->bind_param("sssi", $name, $description, $image, $id);

if ($stmt->execute()) {
    header("Location: carlist.php");
    exit;
} else {
    echo "更新失敗：" . $stmt->error;
}
?>
