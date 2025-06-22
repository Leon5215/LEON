<?php
include("db.php");  // 假設 $conn 是你的 mysqli 連線物件

$account = $_POST["account"];
$password = $_POST["password"];
$pa = $_POST["pa"];  // 確認密碼欄位
$name = $_POST["name"];

// 1. 檢查密碼與確認密碼是否相符
if ($password !== $pa) {
    echo "<script>alert('密碼與確認密碼不一致'); location.href='adduser.php';</script>";
    exit;
}

// 2. 檢查帳號是否已存在 (使用 prepare 防注入)
$sql_check = "SELECT * FROM user WHERE account = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $account);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    echo "<script>alert('已有此帳號'); location.href='adduser.php';</script>";
    exit;
}

// 3. 帳號不存在，插入純文字密碼的帳號
$sql_insert = "INSERT INTO user (account, password, name, type) VALUES (?, ?, ?, 'u')";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("sss", $account, $password, $name);
$stmt_insert->execute();

if ($stmt_insert->affected_rows > 0) {
    echo "<script>alert('註冊成功，請重新登入'); location.href='login.php';</script>";
} else {
    echo "<script>alert('註冊失敗，請重試'); location.href='adduser.php';</script>";
}
?>
