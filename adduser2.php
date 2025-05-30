<?php
include("db.php");
$account=$_POST["account"];
$password=$_POST["password"];
$pa=$_POST["pa"];
$name=$_POST["name"];
$p=0;
$check="SELECT * FROM `user` WHERE `account`=$account";
$check_res=mysqli_query($link,$check);
if(mysqli_num_rows($check_res)>0){
    echo "<script>alert('已有此帳號')</script>";
    echo "<script>location.href='adduser.php'</script>";
}else{
    if($password==$pa){
    $sql="INSERT INTO `user`(`id`, `account`, `password`, `name`, `type`) VALUES (null,'$account','$password','$name','u')";
    mysqli_query($link,$sql);
    echo "<script>alert('註冊成功，請重新登入')</script>";
    echo "<script>location.href='login.php'</script>";
    }else{
    echo "<script>alert('密碼錯誤')</script>";
    echo "<script>location.href='adduser.php'</script>";
    }
}

?>