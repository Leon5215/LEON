<?php
session_start();
include("db.php");

// 取得所有使用者
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>使用者管理</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
  <h1>使用者管理</h1>
</header>

<nav>
  <a href="index-a.php">管理首頁</a>
  <a href="adduser.php">新增使用者</a>
  <a href="carlist.php">車輛管理</a>
  <a href="logout.php">登出</a>
</nav>

<main>
  <div class="card">
    <h2>使用者列表</h2>
    <table class="car-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>帳號</th>
          <th>名稱</th>
          <th>權限</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['account']) ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['type']) ?></td>
              <td>
                <a href="edituser.php?id=<?= $row['id'] ?>">編輯</a> |
                <a href="deleteuser.php?id=<?= $row['id'] ?>" onclick="return confirm('確定刪除使用者？');">刪除</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="5">無使用者資料</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>

<footer>&copy; 2025 管理系統平台</footer>

</body>
</html>
