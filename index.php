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
        <h1>車款介紹</h1>
    </header>

    <nav>
        <a href="#">首頁</a>
        <a href="#">登入</a>
        <a href="#">註冊新帳號</a>
        <a href="#">關於</a>
    </nav>

    <div class="search-box">
        <label for="search">搜尋車型：</label>
        <input type="text" id="search" name="keyword" placeholder="輸入車型"
            value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
    </div>

    <main>
        <h2>歡迎來到車款介紹網站</h2>
        <p>這裡提供最新、最詳細的車型資料與比較分析，幫助您找到最適合的愛車。</p>
    </main>

    <footer>
        &copy; 2025 車款介紹平台 - 保留所有權利
    </footer>
</body>
</html>
