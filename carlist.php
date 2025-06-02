<?php
session_start();
include("db.php");

// 取得資料
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <title>車輛列表</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
<div id="lightbox" class="lightbox-overlay" onclick="hideLightbox()">
  <img id="lightbox-img" src="" alt="放大圖片">
</div>

<script>
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const links = document.querySelectorAll('.lightbox-link');

  links.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const imgSrc = this.href;
      lightboxImg.src = imgSrc;
      lightbox.classList.add('active');
    });
  });

  function hideLightbox() {
    lightbox.classList.remove('active');
    lightboxImg.src = '';
  }
</script>

  <header>
    <h1>車輛管理系統</h1>
  </header>

  <nav>
    <a href="index-a.php">管理首頁</a>
    <a href="addcar.php">新增車輛</a>
    <a href="userlist.php">使用者管理</a>
    <a href="logout.php">登出</a>
  </nav>

  <main>
    <div class="card">
      <h2>目前車輛列表</h2>
      <table class="car-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>車名</th>
            <th>圖片</th>
            <th>介紹</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                <a href="uploads/<?= htmlspecialchars($row['image']) ?>" class="lightbox-link" target="_blank">
                <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="車圖" class="thumb">
                </a>
                </td>
                <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
                <td>
                  <a href="editcar.php?id=<?= $row['id'] ?>">編輯</a> |
                  <a href="deletecar.php?id=<?= $row['id'] ?>" onclick="return confirm('確定要刪除嗎？');">刪除</a>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr><td colspan="5">目前無資料</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

  <footer>
    &copy; 2025 管理系統平台
  </footer>

</body>
</html>
