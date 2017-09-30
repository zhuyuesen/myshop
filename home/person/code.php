<?php 
session_start();
include '../../public/common/config.php';

$code=$_GET['code'];

$sql="select indent.price,indent.confirm,indent.num,shop.id,shop.name,shop.img from indent,shop where indent.shop_id=shop.id and indent.code='{$code}'";

$rst=mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类页面</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<?php 
			include '../header.php';
		?>
		<div class="nav"></div>
		<div class="content">
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>个人中心:</span>	
					</div>
				</div>

				<div class="floorFooter2">
					<div class='floorFooter2Left'>
						<ul>
							<li><a href="userlist.php">查看联系方式</a></li>
							<li><a href="useradd.php">添加联系方式</a></li>
							<li><a href="orderlist.php">查看我的订单</a></li>
						</ul>
					</div>

					<div class='floorFooter2Right'>
						<table width='100%'>
							<tr>
								<th>名称</th>
								<th>图片</th>
								<th>价格</th>
								<th>数量</th>
								<th>合计</th>
								<th>评论</th>
							</tr>	
							<?php 
								while($row=mysqli_fetch_assoc($rst)){
									echo "<tr>";
									echo "<td>{$row['name']}</td>";
									echo "<td><img src='../../public/uploads/thumb_{$row['img']}' width='100px'></td>";
									echo "<td>{$row['price']}</td>";
									echo "<td>{$row['num']}</td>";
									echo "<td>".$row['price']*$row['num']."元</td>";
									if($row['confirm']){
										echo "<td><a href='comment.php?shop_id={$row['id']}' class='cartNum'>评论</a></td>";
									}else{
										echo "<td><a href='orderlist.php' class='cartNum' style='background:#888' onclick=\"alert('请您先确认该订单!')\">评论</a></td>";
									}
									echo "</tr>";
								}
							?>
						</table>
					</div>
					<div class='clear'></div>
				</div>
			</div>
		</div>	

		<?php 
			include '../footer.php';
		?>
	</div>	
</body>
</html>