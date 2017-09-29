<?php
session_start();
 include '../public/common/config.php';

 $username = $_POST['username'];
 $password = md5($_POST['password']);

 var_dump($password);


$sql="select * from user where username='{$username}' and password='{$password}' and isadmin=1";

$res = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($res);
var_dump($row);
var_dump($row['id']);
//exit();
if($row){
    $_SESSION['admin_username']=$username;
    $_SESSION['admin_userid']=$row['id'];
var_dump($_SESSION);
    echo "<script>location='./index.php'</script>";
}else{
    echo "<script>alert('用户名或密码有误!')</script>";
    echo "<script>location='login.php'</script>";
}



