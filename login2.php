<?php
session_start();
include("db.php");

$account = $_POST['account'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE account = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $account);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // 純文字密碼比對
    if ($password === $user['password']) {
        $_SESSION["account"] = $user["account"];
        $_SESSION['name'] = $user['name']; 
        $_SESSION['type'] = $user['type'];
        $_SESSION['id'] = $row['id'];
        // 根據權限導向不同首頁
        if ($user['type'] === 'ad') {
            echo "<script>location.href='index-a.php'</script>"; // 管理員首頁
        } elseif ($user['type'] === 'c') {
            echo "<script>location.href='index-c.php'</script>"; // 客服首頁
        } else {
            echo "<script>location.href='index-u.php'</script>"; // 使用者首頁
        }

    } else {
        echo "<script>alert('密碼錯誤'); location.href='login.php';</script>";
    }
} else {
    echo "<script>alert('帳號不存在'); location.href='login.php';</script>";
}
?>

