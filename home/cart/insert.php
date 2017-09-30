<?php 
session_start();

include '../../public/common/config.php';

$id=$_GET['id'];
$sql="select * from shop where id={$id}";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);

if($row['stock']>0){
	//把商品放入购物车
	$_SESSION['shops'][$id]=$row;
	$_SESSION['shops'][$id]['num']=1;

	echo "<script>location='index.php'</script>";
}else{
	echo "<script>alert('您购买的商品库存量不足!')</script>";
	echo "<script>location='../index.php'</script>";
}


?>