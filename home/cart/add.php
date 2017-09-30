<?php 
session_start();

$id=$_GET['id'];

$_SESSION['shops'][$id]['num']++;

if($_SESSION['shops'][$id]['num']>$_SESSION['shops'][$id]['stock']){
	$_SESSION['shops'][$id]['num']=$_SESSION['shops'][$id]['stock'];
}

echo "<script>location='index.php'</script>";
?>