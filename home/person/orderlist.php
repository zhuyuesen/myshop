<?php 
session_start();
include '../../public/common/config.php';
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
								<th>订单号</th>
								<th>下单时间</th>
								<th>订单状态</th>
								<th>确认收货</th>
							</tr>
							<?php 
							$user_id=$_SESSION['home_userid'];

							$sql="select indent.*,status.name from indent,status where indent.status_id=status.id and indent.user_id={$user_id} group by indent.code";
							$rst=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_assoc($rst)){
								echo "<tr>";
								echo "<td><a href='code.php?code={$row['code']}' class='cartNum'>{$row['code']}</a></td>";
								echo "<td>".date('Y-m-d H:i:s',$row['time'])."</td>";
								echo "<td>{$row['name']}</td>";
								if($row['confirm']){
									echo "<td><a href='code.php?code={$row['code']}' class='cartNum'>评论</a></td>";
								}else{
									echo "<td><a href='confirm.php?code={$row['code']}' class='cartNum'>确认</a></td>";
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