<?php
include("db.php");
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>編輯使用者</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

<main>
  <form action="edituser_process.php" method="post" class="login-card">
    <h2>編輯使用者</h2>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <div class="input-group">
      <label>帳號</label>
      <input type="text" name="account" value="<?= htmlspecialchars($row['account']) ?>" required>
    </div>

    <div class="input-group">
      <label>密碼（留空代表不變更）</label>
      <input type="password" name="password">
    </div>

    <div class="input-group">
      <label>姓名</label>
      <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
    </div>

    <div class="input-group">
      <label>權限</label>
      <select name="type">
        <option value="admin" <?= $row['type'] === 'admin' ? 'selected' : '' ?>>管理員</option>
        <option value="user" <?= $row['type'] === 'user' ? 'selected' : '' ?>>一般使用者</option>
      </select>
    </div>

    <button type="submit" class="login-button">更新</button>
  </form>
</main>

</body>
</html>
