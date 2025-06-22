<!DOCTYPE html>

<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>新增車輛</title>
    <link rel="stylesheet" href="/style/admin.css">
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
        
        <table>
            <tr><td colspan="2"><h2>新增車輛</h2></td></tr>
            <tr><td>車名 : </td><td><input type="text" name="name" required></td></tr>
            <tr><td>CC數：</td><td><input type="text" name="cc" required></td></tr>
            <tr><td>馬力：</td><td><input type="text" name="hp" required></td></tr>
            <tr><td>傳動：</td><td><input type="text" name="wd" required></td></tr>
            <tr><td>人數：</td><td><input type="text" name="peo" required></td></tr>
            <tr><td>介紹：</td><td><input type="text" name="text" required></td></tr>
            <tr><td>圖片：</td><td><input type="file" name="img" accept="image/*" required></td></tr>
            <tr><td colspan="2"><input type="submit" value="送出" class="login-button"></td></tr>
        </table>
    </form>
</main>

<footer>&copy; 2025 車輛管理平台</footer>
</body>
</html>
