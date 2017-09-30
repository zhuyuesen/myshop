<?php 
session_start();
include '../../public/common/config.php';

$id=$_GET['id'];
$sql="select * from touch where id={$id}";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);

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
						<div class="personUseraddLeft">
							<img src="../public/img/useradd.jpg" alt="">
						</div>
						<div class='personUseradd'>
							<form action='userupdate.php' method='post'>
								<p>姓名:</p>
								<p><input type="text" name='name' placeholder='姓名' value='<?php echo $row['name']?>'></p>
								<p>地址:</p>
								<p><input type="text" name='addr' placeholder='地址' value='<?php echo $row['addr']?>'></p>
								<p>电话:</p>
								<p><input type="text" placeholder='电话' name='tel' value='<?php echo $row['tel']?>'></p>
								<p>邮箱:</p>
								<p><input type="text" placeholder='邮箱' name='email' value='<?php echo $row['email']?>'></p>
								<input type="hidden" name="id" value='<?php echo $row['id']?>'>
								<p><input type="submit" value="提交"></p>
							<form>
						</div>
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