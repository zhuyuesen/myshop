<?php 
session_start();

$id=$_GET['id'];

$_SESSION['shops'][$id]['num']--;

if($_SESSION['shops'][$id]['num']<1){
	$_SESSION['shops'][$id]['num']=1;
}

echo "<script>location='index.php'</script>";
?>