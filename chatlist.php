<?php
session_start();
include("db.php");

// 模擬客服登入
$staff_id = isset($_SESSION['id']) ? $_SESSION['id'] : 1; // 若未登入則預設為 1

// 查詢與客服互動過的所有使用者 ID
$stmt = $conn->prepare("
    SELECT DISTINCT 
      CASE 
        WHEN sender_id = ? THEN receiver_id 
        ELSE sender_id 
      END AS user_id
    FROM messages 
    WHERE sender_id = ? OR receiver_id = ?
");
$stmt->bind_param("iii", $staff_id, $staff_id, $staff_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8" />
  <title>客服聊天室列表</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
  <h1>客服聊天室列表</h1>
</header>

<nav>
  <a href="index-c.php">客服首頁</a>
  <a href="logout.php">登出</a>
</nav>

<main>
  <div class="admin-card">
    <h3>與使用者的聊天室</h3>
    <ul>
      <?php
      while ($row = $result->fetch_assoc()) {
          $uid = $row['user_id'];

          // 查詢使用者名稱
          $user_stmt = $conn->prepare("SELECT name FROM user WHERE id = ?");
          $user_stmt->bind_param("i", $uid);
          $user_stmt->execute();
          $user_result = $user_stmt->get_result();
          $user = $user_result->fetch_assoc();
          if (!$user) continue;

          $name = htmlspecialchars($user['name']);
          echo "<li><a href='chat_service.php?staff_id=$staff_id&user_id=$uid'>$name 的聊天室</a></li>";

          $user_stmt->close();
      }
      $stmt->close();
      $conn->close();
      ?>
    </ul>
  </div>
</main>

<footer>
  &copy; 2025 客服系統平台
</footer>

</body>
</html>
