<?php
// 移除 session 驗證
// session_start();
// include("db.php");

// 模擬使用者（預設 ID 為 2，名字：訪客）
$sender_id = 2; // 可改為任意測試帳號 ID
$receiver_id = 1; // 假設客服帳號 ID 為 1
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>與客服聊天</title>
  <link rel="stylesheet" href="admin.css">
  <style>
    .chat-box { background:#222; color:white; height:300px; overflow-y:scroll; padding:10px; border:1px solid #555; margin-bottom:10px;}
    .chat-input { width:100%; padding:10px; }
    .chat-send { padding:8px 16px; background:#c00; color:white; border:none; cursor:pointer; }
  </style>
</head>
<body>

<header><h1>與客服對話</h1></header>
<nav><a href="index-u.php">返回首頁</a></nav>

<main>
  <div class="chat-box" id="chat-box"></div>

  <form id="chat-form">
    <input type="hidden" name="sender_id" value="<?= $sender_id ?>">
    <input type="hidden" name="receiver_id" value="<?= $receiver_id ?>">
    <input type="text" name="message" class="chat-input" placeholder="輸入訊息..." required>
    <button type="submit" class="chat-send">送出</button>
  </form>
</main>

<script>
function fetchChat() {
  fetch('chat_fetch.php?sender=<?= $sender_id ?>&receiver=<?= $receiver_id ?>')
    .then(res => res.text())
    .then(data => {
      document.getElementById("chat-box").innerHTML = data;
      document.getElementById("chat-box").scrollTop = 9999;
    });
}
document.getElementById("chat-form").addEventListener("submit", function(e){
  e.preventDefault();
  fetch('chat_send.php', {
    method: 'POST',
    body: new FormData(this)
  }).then(() => {
    this.message.value = "";
    fetchChat();
  });
});
setInterval(fetchChat, 2000);
fetchChat();
</script>
</body>
</html>
