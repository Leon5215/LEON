<?php
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>使用者首頁</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
  <h1>車款平台 - 使用者介面</h1>
</header>

<nav>
  <a href="index-u.php">首頁</a>
  <a href="chat.php">與客服聊天</a>
  <a href="logout.php">登出</a>
</nav>

<main>
  <div class="admin-welcome">
    <h2>歡迎，<?php echo htmlspecialchars($_SESSION['name']); ?> 使用者</h2>
    <p>您可以與客服進行一對一聊天，或瀏覽平台資訊。</p>
  </div>

  <section class="admin-functions">
    <div class="admin-card">
      <h3>與客服對話</h3>
      <ul>
        <li><a href="chat.php">進入聊天視窗</a></li>
      </ul>
    </div>
  </section>
</main>

<footer>
  &copy; 2025 車款平台 - 使用者介面
</footer>

</body>
</html>
