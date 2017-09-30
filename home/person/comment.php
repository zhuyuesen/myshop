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
						<form action="commentinsert.php" method='post'>
							<p>请发表评论:</p>
							<p>
								<textarea name="content" class='PersonComment'></textarea>
							</p>

							<input type="hidden" name="shop_id" value='<?php echo $_GET['shop_id']?>'>
							<p>
								<input type="submit" value="提交" class='commit'>
							</p>	
						</form>
						
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