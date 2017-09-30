<?php 
session_start();

//用户登录
include '../public/common/config.php';

$username=$_POST['username'];
$password=md5($_POST['password']);

$sql="select * from user where username='{$username}' and password='{$password}'";

$rst=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($rst);

if($row){
	$_SESSION['home_username']=$username;
	$_SESSION['home_userid']=$row['id'];

	echo "<script>location='person/index.php'</script>";
}else{
	echo "<script>alert('用户名或密码有误!')</script>";
	echo "<script>location='login.php'</script>";
}
?>