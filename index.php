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
$host = 'localhost';
$dbname = 'leon';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 抓取所有車款資料
    $stmt = $pdo->query("SELECT name, image FROM cars");
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p>資料庫連線失敗：" . $e->getMessage() . "</p>";
}
?>
    <h2>車款總覽</h2>
    <div class="car-items">
        <?php if (!empty($cars)): ?>
            <?php foreach ($cars as $car): ?>
                <div class="car-item">
                    <img src="img/<?php echo htmlspecialchars($car['image']); ?>" alt="<?php echo htmlspecialchars($car['name']); ?>" width="200">
                    <h3><?php echo htmlspecialchars($car['name']); ?></h3>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>目前沒有車款資料。</p>
        <?php endif; ?>
    </div>
</div>

    </main>

    <footer>
        &copy; 2025 車款介紹平台 - 保留所有權利
    </footer>
</body>
</html>
