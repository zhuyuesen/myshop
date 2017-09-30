<?php 
session_start();
include '../public/common/config.php';
$id=$_GET['class_id'];
$sqlClass="select * from class where id={$id}";
$rstClass=mysqli_query($sqlClass);
$rowClass=mysqli_fetch_assoc($rstClass);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类页面</title>
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<div class="main">
		<?php 
			include 'header.php';
		?>
		<div class="nav"></div>
		<div class="content">
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span><a href='index.php'>首页</a> &raquo; <?php echo $rowClass['name'] ?></span>	
					</div>
					<div class="right">
						<?php 
						$sqlBrand="select * from brand where class_id={$id}";
						$rstBrand=mysqli_query($sqlBrand);
						$firstBrand='';
						$i=0;
						while($rowBrand=mysqli_fetch_assoc($rstBrand)){
							if($i==0){
								$firstBrand=$rowBrand['id'];
							}
							echo "
							<span>
								<a href='class.php?class_id={$id}&brand_id={$rowBrand['id']}'>{$rowBrand['name']}</a>
							</span>";
							$i++;
						}
						?>
						
					</div>
				</div>

				<div class="floorFooter2">
					<?php 
					$brand_id=$_GET['brand_id']?$_GET['brand_id']:$firstBrand;
					$sqlShop="select * from shop where brand_id={$brand_id}";
					$rstShop=mysqli_query($sqlShop);
					while($rowShop=mysqli_fetch_assoc($rstShop)){
					?>
					
					<a href="shop.php?shop_id=<?php echo $rowShop['id']?>">
						<div class='shop'>
							<div class="shopImg">
								<img src="../public/uploads/thumb_<?php echo $rowShop['img'] ?>" alt="">
							</div>
							<div class="nav"></div>
							<div class="shopInfo">
								<span class='shopName'><?php echo $rowShop['name']?></span>	
								<span class='shopPrice'><?php echo $rowShop['price']?>元</span>
							</div>
						</div>
					</a>

					<?php
					}
					?>
					
					<div class='clear'></div>
				</div>
			</div>
		</div>	

		<?php 
			include 'footer.php';
		?>
	</div>	
</body>
</html>