<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>車款介紹首頁</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>車款介紹平台</h1>
    </header>

    <nav>
        <a href="index.php">首頁</a>
        <a href="login.php">登入</a>
        <a href="adduser.php">註冊新帳號</a>
        <a href="about.php">關於</a>
    </nav>

    <div class="search-box">
        <form method="get" action="index.php">
            <label for="search">搜尋車型：</label>
            <input type="text" id="search" name="keyword" placeholder="輸入車型"
                value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
            <button type="submit">搜尋</button>
        </form>
    </div>

    <main>
        <div class="welcome-card">
            <h2>歡迎來到車款介紹網站</h2>
            <p>這裡提供最新、最詳細的車型資料與比較分析，幫助您找到最適合的愛車。</p>
        </div>
        
<div class="car-list"><?php
// 資料庫連線設定
include ("db.php");
?>
    <h2>車款總覽</h2>
    <div class="car-items">
        <?php
        $sql="SELECT * FROM `cars` WHERE 1";
        $res=mysqli_query($link,$sql);
        while($row=mysqli_fetch_assoc($res)){
            echo "<div class='car-item'>";
            echo "<img src='img/".$row["img"]."' alt='".$row["name"]."' style='width:40%;'>";
            echo "<h3>".$row["name"]."<h3>";
            echo "</div>";
        }
        ?>
    </div>
</div>

    </main>
    <iframe width="0" height="0" style="display:none;" 
    src="https://www.youtube.com/embed/TgW7WzTGV0Q?autoplay=1&si=SLxXhmZTQr5psswk"
    title="YouTube video player" frameborder="0"
    allow="autoplay"
    allowfullscreen>
</iframe>



    <footer>
        &copy; 2025 車款介紹平台 - 保留所有權利
    </footer>
</body>
</html>
