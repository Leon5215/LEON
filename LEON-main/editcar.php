<?php
include("db.php");

// 驗證 GET id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("錯誤：缺少車輛 ID");
}

$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("找不到此車輛資料！");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>編輯車輛</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <main>
        <div class="card">
            <h2>目前資料預覽</h2>
            <p><strong>車名：</strong><?= htmlspecialchars($row['name']) ?></p>
            <p><strong>介紹：</strong><br><?= nl2br(htmlspecialchars($row['description'])) ?></p>
            <p><strong>圖片：</strong><br>
                <img src="uploads/<?= htmlspecialchars($row['image']) ?>" class="thumb" style="width: 200px; border-radius: 8px;">
            </p>
        </div>

        <form action="editcar2.php" method="post" enctype="multipart/form-data" class="login-card">
            <h2>編輯車輛</h2>
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="current_image" value="<?= htmlspecialchars($row['image']) ?>">

            <div class="input-group">
                <label>車名</label>
                <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
            </div>

            <div class="input-group">
                <label>車輛介紹</label>
                <textarea name="description" required><?= htmlspecialchars($row['description']) ?></textarea>
            </div>

            <div class="input-group">
                <label>更換圖片（可選）</label>
                <input type="file" name="image">
            </div>

            <button type="submit" class="login-button">更新</button>
        </form>
    </main>
</body>
</html>
