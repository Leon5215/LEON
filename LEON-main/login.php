<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
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

    <main>
        <div class="login-card">
            <h2>登入系統</h2>

            <form action="login2.php" method="post">
                <div class="input-group">
                    <label for="account">帳號</label>
                    <input type="text" name="account" id="account" placeholder="請輸入帳號" autocomplete="off" required />
                </div>
                <div class="input-group">
                    <label for="password">密碼</label>
                    <input type="password" name="password" id="password" placeholder="請輸入密碼" autocomplete="off" required />
                </div>

                <button class="login-button" type="submit">登入</button>
            </form>
        </div>
    </main>

    <footer>
        &copy; 2025 車款介紹平台 - 保留所有權利
    </footer>
</body>
</html>
