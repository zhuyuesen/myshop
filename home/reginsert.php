<?php 
session_start();

include '../public/common/config.php';

$username=$_POST['username'];
$password=md5($_POST['password']);
$repassword=md5($_POST['repassword']);
$fcode=strtolower($_POST['fcode']);
$vcode=strtolower($_SESSION['vcode']);

if($fcode==$vcode){
	if($password==$repassword){
		$sql="insert into user(username,password) values('{$username}','{$password}')";
		if(mysqli_query($sql)){
			$_SESSION['home_username']=$username;
			$_SESSION['home_userid']=mysqli_insert_id();
			echo "<script>location='person/index.php'</script>";
		}
	}else{
		echo "<script>location='register.php'</script>";
	}
}else{
	echo "<script>location='register.php'</script>";
}
?>