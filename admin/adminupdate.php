<?php
include '../public/common/config.php';
session_start();

$oldpass = md5($_POST['oldpass']);

$newpass = md5($_POST['newpass']);

$id = $_SESSION['admin_userid'];

$sql = "select * from user where id ={$id} and password='{$oldpass}' and isadmin=1";
var_dump($sql);
$res = mysqli_query($conn,$sql);
var_dump($res);
//exit();

if($res = mysqli_query($conn,$sql)){
    $sql1 = "update user set password='{$newpass}' where id={$id}";

    if($res1 = mysqli_query($conn,$sql1)){
        echo "<script>top.location = './login';</script>";
    }else{
        echo "弄啥嘞";
    }
}else{
    echo '原密码不正确';
}