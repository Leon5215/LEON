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
// 資料庫連線
$conn = new mysqli("127.0.0.1","root","","leon");

// 檢查連線
if ($conn->connect_error) {
    die("連線失敗：" . $conn->connect_error);
}

$img = "20250622180533_8043.jpg";  // 確保這裡的變數有被正確取得

$sql = "SELECT * FROM cars WHERE img = '$img'";
$result = $conn->query($sql);

// 檢查查詢是否成功
if ($result === false) {
    die("SQL 錯誤：" . $conn->error); // 會顯示錯誤訊息幫助你除錯
}

// 繼續處理查詢結果
while ($row = mysqli_fetch_assoc($result)) {
    echo "車輛名稱：" . $row['name'] . "<br>";
    // 根據你的資料庫欄位調整
}

$conn->close();
?>

    </main>

<footer>&copy; 2025 車輛管理平台</footer>
</body>
</html>
