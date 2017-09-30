<?php 
session_start();
include '../../public/common/config.php';    	

$code=time().mt_rand();
$user_id=$_SESSION['home_userid'];
$time=time();
$touch_id=$_POST['touch_id'];

foreach($_SESSION['shops'] as $shop){
	$sql="insert into indent(code,user_id,time,touch_id,shop_id,price,num) values('{$code}','{$user_id}','{$time}','{$touch_id}','{$shop['id']}','{$shop['price']}','{$shop['num']}')";

	mysqli_query($conn,$sql);

	//减库存
	$st=$shop['stock']-$shop['num'];
	$sqlStock="update shop set stock='{$st}' where id={$shop['id']}";	
	mysqli_query($conn,$sqlStock);
}


//清空购物车
$_SESSION['shops']=array();

echo "<script>alert('您的订单号为:{$code}')</script>";
echo "<script>location='../person/orderlist.php'</script>";
?>
