<!DOCTYPE html>
<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['car_name'];
    $desc = $_POST['car_desc'];

    $imgName = $_FILES['car_img']['name'];
    $tmpName = $_FILES['car_img']['tmp_name'];

    $targetDir = "uploads/";
    $imgPath = $targetDir . basename($imgName);

    if (move_uploaded_file($tmpName, $imgPath)) {
        $stmt = $conn->prepare("INSERT INTO cars (name, description, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $desc, $imgName);
        $stmt->execute();
        header("Location: carlist.php");
        exit;
    } else {
        echo "<p style='color:red;'>圖片上傳失敗。</p>";
    }
}
?>

<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>新增車輛</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<header><h1>新增車輛</h1></header>
<nav>
    <a href="index-a.php">管理首頁</a>
    <a href="carlist.php">管理車輛</a>
    <a href="userlist.php">管理使用者</a>
    <a href="logout.php">登出</a>
</nav>

<main>
    <form action="addcar2.php" method="post" enctype="multipart/form-data" class="login-card">
        <h2>新增車輛</h2>
        <table class="form-table" align="center">
            <tr>
                <td><label for="car_name">車名：</label></td>
                <td><input type="text" name="car_name" id="car_name" required></td>
            </tr>
            <tr>
                <td><label for="car_desc">車輛介紹：</label></td>
                <td><textarea name="car_desc" id="car_desc" rows="4" required></textarea></td>
            </tr>
            <tr>
                <td><label for="car_img">圖片：</label></td>
                <td><input type="file" name="car_img" id="car_img"></td>
            </tr>
        </table>
        <button type="submit" class="login-button">送出</button>
    </form>
</main>

<footer>&copy; 2025 車輛管理平台</footer>
</body>
</html>
