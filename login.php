<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <?php include("db.php");?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>LOGIN</h1>
        </header>

        <nav>
            <a href="index.php">首頁</a>
            <a href="login.php">登入</a>
            <a href="adduser.php">註冊新帳號</a>
            <a href="about.php">關於</a>
        </nav>

        <main>
             <div class="login-title">登入系統</div>

  <!-- 登入卡片 -->
  <form action="login2.php" method="get">
    <div class="login-card">
      <h2>登入</h2>

      <div class="input-group">
        <input type="text" name="account" placeholder="帳號" autocomplete="off" required />
      </div>
      <div class="input-group">
        <input type="password" name="password" placeholder="密碼" autocomplete="off" required />
      </div>

      <button class="login-button" type="submit">登入按鈕</button>

      </div>
        </main> 
        <footer>
            &copy; 2025 車款介紹平台 - 保留所有權利
        </footer>
    </body>
</html>