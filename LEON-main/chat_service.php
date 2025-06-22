<?php
include("db.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 檢查 URL 參數
if (!isset($_GET['staff_id']) || !is_numeric($_GET['staff_id']) ||
    !isset($_GET['user_id']) || !is_numeric($_GET['user_id'])) {
    die("缺少客服ID或使用者ID");
}
$staff_id = (int)$_GET['staff_id'];
$user_id = (int)$_GET['user_id'];

// 取得客服名稱
$staff_stmt = $conn->prepare("SELECT name FROM user WHERE id = ?");
if (!$staff_stmt) {
    die("Prepare failed for staff: " . $conn->error);
}
$staff_stmt->bind_param("i", $staff_id);
$staff_stmt->execute();
$staff_result = $staff_stmt->get_result();
$staff = $staff_result->fetch_assoc();
$staff_stmt->close();
if (!$staff) die("找不到客服");

// 取得使用者名稱
$user_stmt = $conn->prepare("SELECT name FROM user WHERE id = ?");
if (!$user_stmt) {
    die("Prepare failed for user: " . $conn->error);
}
$user_stmt->bind_param("i", $user_id);
$user_stmt->execute();
$user_result = $user_stmt->get_result();
$user = $user_result->fetch_assoc();
$user_stmt->close();
if (!$user) die("找不到使用者");

// 新增訊息
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    $message = trim($_POST['message']);

    $insert_stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message, created_at) VALUES (?, ?, ?, NOW())");
    if (!$insert_stmt) {
        die("Prepare failed for insert: " . $conn->error);
    }
    $insert_stmt->bind_param("iis", $staff_id, $user_id, $message);
    $insert_stmt->execute();
    $insert_stmt->close();

    header("Location: chat_service.php?staff_id=$staff_id&user_id=$user_id");
    exit;
}

// 更新「使用者發給客服」且未讀的訊息為已讀
$update_read_stmt = $conn->prepare("
    UPDATE messages SET is_read = 1 
    WHERE sender_id = ? AND receiver_id = ? AND is_read = 0
");
if (!$update_read_stmt) {
    die("Prepare failed for update read: " . $conn->error);
}
$update_read_stmt->bind_param("ii", $user_id, $staff_id);
$update_read_stmt->execute();
$update_read_stmt->close();

// 取得聊天訊息
$msg_stmt = $conn->prepare("
    SELECT sender_id, receiver_id, message, timestamp AS created_at, is_read FROM messages 
    WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)
    ORDER BY timestamp ASC
");
if (!$msg_stmt) {
    die("Prepare failed for messages: " . $conn->error);
}
$msg_stmt->bind_param("iiii", $staff_id, $user_id, $user_id, $staff_id);
$msg_stmt->execute();
$msg_result = $msg_stmt->get_result();

if (!$msg_stmt) {
    die("Prepare failed for messages: " . $conn->error);
}
$msg_stmt->bind_param("iiii", $staff_id, $user_id, $user_id, $staff_id);
$msg_stmt->execute();
$msg_result = $msg_stmt->get_result();
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<meta charset="UTF-8" />
<title>與 <?= htmlspecialchars($user['name']) ?> 的聊天視窗</title>
<link rel="stylesheet" href="chat.css" />
</head>
<body>
<header>
  <h1>客服聊天系統</h1>
</header>

<nav>
  <a href="index-c.php">首頁</a>
  <a href="chatlist.php?staff_id=<?= $staff_id ?>">聊天室</a>
  <a href="logout.php">登出</a>
</nav>

<main>
  <h2>與 <?= htmlspecialchars($user['name']) ?> 的聊天視窗</h2>
  <p><a href="chatlist.php?staff_id=<?= $staff_id ?>">← 回聊天室列表</a></p>

  <div class="chat-box" id="chat-box">
<?php while ($msg = $msg_result->fetch_assoc()):
    $is_sent = $msg['sender_id'] == $staff_id;
    $class = $is_sent ? 'sent' : 'received';
    $sender = $is_sent ? htmlspecialchars($staff['name']) : htmlspecialchars($user['name']);
    $time = date('H:i', strtotime($msg['created_at']));
    $is_read = (int)$msg['is_read'];
?>
  <div class="message <?= $class ?>">
    <div class="bubble">
      <div class="sender"><?= $sender ?></div>
      <div class="text"><?= nl2br(htmlspecialchars($msg['message'])) ?></div>
      <div class="meta">
        <span class="time"><?= $time ?></span>
        <?php if ($is_sent): ?>
          <span class="read-status <?= $is_read ? 'read' : 'unread' ?>">
            <?= $is_read ? "已讀" : "未讀" ?>
          </span>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endwhile; ?>
</div>


  <form method="post">
    <textarea name="message" rows="3" placeholder="輸入訊息..." required></textarea>
    <button type="submit">送出</button>
  </form>
</main>

<script>
  // 自動捲到底部
  var chatBox = document.getElementById('chat-box');
  chatBox.scrollTop = chatBox.scrollHeight;
</script>

<footer>
  <p>客服系統 &copy; 2025</p>
</footer>

</body>
</html>

<?php
$msg_stmt->close();
$conn->close();
?>
