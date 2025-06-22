<!DOCTYPE html>

<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>確認車輛</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<header><h1>確認車輛</h1></header>
<nav>
    <a href="index-a.php">管理首頁</a>
    <a href="carlist.php">管理車輛</a>
    <a href="userlist.php">管理使用者</a>
    <a href="logout.php">登出</a>
</nav>

<main>
    <?php
    include ("db.php");
    $id=$_GET["id"];
    $sql="SELECT * FROM `cars` WHERE `id`=$id";
    $res=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($res)){
        echo "<table class='login-card'>
            <tr><td colspan='2'><h2>新增車輛</h2></td></tr>
            <tr><td>車名 : </td><td>".$row["name"]."</td></tr>
            <tr><td>CC數：</td><td>".$row["cc"]."</td></tr>
            <tr><td>馬力：</td><td>".$row["hp"]."</td></tr>
            <tr><td>傳動：</td><td>".$row["wd"]."</td></tr>
            <tr><td>人數：</td><td>".$row["people"]."</td></tr>
            <tr><td>介紹：</td><td>".$row["text"]."</td></tr>
            <tr><td>圖片：</td><td><img src='img/".$img."' style='width=40%'></td></tr>
        </table>";
    }
    
    ?>
    </main>

<footer>&copy; 2025 車輛管理平台</footer>
</body>
</html>
