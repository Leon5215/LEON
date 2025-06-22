<?php

include("db.php");
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>客服首頁</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
  <h1>車款平台 - 客服介面</h1>
</header>

<nav>
  <a href="index-c.php">首頁</a>
  <a href="chatlist.php">使用者聊天室列表</a>
  <a href="logout.php">登出</a>
</nav>

<main>
  <div class="admin-welcome">
    <h2>歡迎，<?php echo htmlspecialchars($_SESSION['name']); ?> 客服</h2>
    <p>請選擇與使用者對話或進入多人聊天室。</p>
  </div>

  <section class="admin-functions">
    <div class="admin-card">
      <h3>聊天管理</h3>
      <ul>
        <li><a href="chatlist.php">一對一聊天室</a></li>
      </ul>
    </div>
  </section>
</main>

<footer>
  &copy; 2025 車款平台 - 客服介面
</footer>

</body>
</html>
