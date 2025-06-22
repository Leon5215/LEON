<?php
include("db.php");
$account=$_POST["account"];
$password=$_POST["password"];
$sql="SELECT * FROM `user` WHERE `account`='$account'";
$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)>0){
    $sql="SELECT * FROM `user` WHERE `account`='$account' and `password`='$password'";
    $res=mysqli_query($link,$sql);
    
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $_SESSION["acc"]=$row["account"];
            $_SESSION["name"]=$row["name"];
            $_SESSION["type"]=$row["type"];
           if ($row['type'] === 'ad') {
            echo "<script>location.href='index-a.php'</script>"; // 管理員首頁
        } elseif ($row['type'] === 'c') {
            echo "<script>location.href='index-c.php'</script>"; // 客服首頁
        } else {
            echo "<script>location.href='index-u.php'</script>"; // 使用者首頁
        }
        }
    }else{
        echo "<script>alert('帳號密碼錯誤，請重新登入')</script>";
        echo "<script>location.href='login.php'</script>";

    }
}else{
    echo "<script>alert('帳號密碼錯誤，請重新登入')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>