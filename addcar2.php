<?php
include ("db.php");
$name=$_POST["name"];
$cc=$_POST["cc"];
$hp=$_POST["hp"];
$wd=$_POST["wd"];
$peo=$_POST["peo"];
$text=$_POST["text"];

$targetDir = "img/"; // 要儲存圖片的資料夾

// 確保資料夾存在
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// 檢查是否為圖片
$check = getimagesize($_FILES["img"]["tmp_name"]);
if ($check === false) {
    echo "檔案不是圖片。";
    exit;
}

// 限制檔案大小 (最大 2MB)
if ($_FILES["img"]["size"] > 2000000) {
    echo "檔案太大。";
    exit;
}

// 檢查副檔名
$imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));
$allowedTypes = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedTypes)) {
    echo "只允許 JPG, JPEG, PNG, GIF 格式。";
    exit;
}
 
//  建立不重複檔名（時間戳 + 隨機數）
$uniqueName = date("YmdHis") . '_' . rand(1000, 9999) . '.' . $imageFileType;
$targetFile = $targetDir . $uniqueName;
// 嘗試移動檔案
if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
} else {
    echo "檔案上傳失敗。";
}
$sql="INSERT INTO `cars`(`id`, `name`, `cc`, `hp`, `wd`, `people`, `text`, `img`) VALUES (null,'$name','$cc','$hp','$wd','$peo','$text','$uniqueName')";
mysqli_query($link,$sql);

echo "<script>alert('新增成功')</script>";
echo "<script>location.href='checkcar.php?img=".$uniqueName."'</script>";



?>