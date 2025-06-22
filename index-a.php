
<?php

include("db.php");
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>管理者首頁</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

    <header>
        <h1>管理後台系統</h1>
    </header>

    <nav>
        <a href="index-a.php">管理首頁</a>
        <a href="addcar.php">新增車輛</a>
        <a href="carlist.php">管理車輛</a>
        <a href="userlist.php">管理使用者</a>
        <a href="logout.php">登出</a>
    </nav>

    <main>
        <div class="admin-welcome">
            <h2>歡迎，<?php echo htmlspecialchars($_SESSION['name']); ?> 管理員</h2>
            <p>請從上方選單選擇要管理的項目。</p>
        </div>

        <section class="admin-functions">
            <div class="admin-card">
                <h3>車輛管理</h3>
                <ul>
                    <li><a href="addcar.php">新增車輛介紹</a></li>
                    <li><a href="carlist.php">修改 / 刪除車輛資料</a></li>
                </ul>
            </div>

            <div class="admin-card">
                <h3>使用者管理</h3>
                <ul>
                    <li><a href="userlist.php">檢視 / 編輯 / 停權 使用者</a></li>
                </ul>
            </div>
        </section>
    </main>

    <footer>
        &copy; 2025 車款管理平台 - 管理介面
    </footer>
</body>
</html>
