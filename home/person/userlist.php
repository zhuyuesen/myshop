<?php 
session_start();

include '../../public/common/config.php';

$user_id=$_SESSION['home_userid'];
$sql="select * from touch where user_id={$user_id}";
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
								<th>姓名</th>
								<th>地址</th>
								<th>电话</th>
								<th>邮箱</th>
								<th>修改</th>
								<th>删除</th>
							</tr>
							<?php 
							while($row=mysqli_fetch_assoc($rst)){
							echo "<tr>
								<td>{$row['name']}</td>
								<td>{$row['addr']}</td>
								<td>{$row['tel']}</td>
								<td>{$row['email']}</td>
								<td><a href='useredit.php?id={$row['id']}'>修改</a></td>
								<td><a href='userdel.php?id={$row['id']}'>删除</a></td>
							</tr>";
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