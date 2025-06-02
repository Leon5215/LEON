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
        echo "<script>location.href='index-a.php'</script>";
    } else {
        echo "<script>alert('密碼錯誤')</script>";
        echo "<script>location.href='login.php'</script>";
    }
} else {
    echo "<script>alert('帳號不存在')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>
