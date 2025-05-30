<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("db.php"); ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>新增使用者</title>
</head>
<body>

  <!-- 導覽列 -->
  <div class="header">
    <a href="index.php">首頁</a>
    
    <a href="login.php">登入</a>
  </div>

  <!-- 新增使用者卡片 -->
  <form action="adduser2.php" method="post">
    <div class="login-card">
      <h2>新增使用者</h2>

      <div class="input-group">
        <label for="account">帳號</label>
        <input type="text" name="account" id="account" required autocomplete="off">
      </div>

      <div class="input-group">
        <label for="password">密碼</label>
        <input type="text" name="password" id="password" required autocomplete="off">
      </div>

      <div class="input-group">
        <label for="password">確認密碼</label>
        <input type="text" name="pa" id="pa" required autocomplete="off">
      </div>

      <div class="input-group">
        <label for="name">你的名字</label>
        <input type="text" name="name" id="name" required autocomplete="off">
      </div>

      <button class="login-button" type="submit">送出</button>
    </div>
  </form>

</body>
</html>
