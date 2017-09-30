<?php 
session_start();
include '../public/common/config.php';
$sqlAdvert="select * from advert";
$rstAdvert=mysqli_query($conn,$sqlAdvert);
while($rowAdvert=mysqli_fetch_assoc($rstAdvert)){
	$rowAds[$rowAdvert['pos']]=$rowAdvert;
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Myshop15商场</title>
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<div class="main">
		
		<?php 
			include 'header.php';
		?>

		<div class="nav"></div>
		<div class="ads">
			<img src="../public/uploads/<?php echo $rowAds[0]['img']?>" alt="">
		</div>
		<div class="nav"></div>
		<div class="content">
			<?php 
				$sqlClass="select * from class";
				$rstClass=mysqli_query($conn,$sqlClass);
				$f=1;
				while($rowClass=mysqli_fetch_assoc($rstClass)){
			?>
			
			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span><?php echo $f?>F <?php echo $rowClass['name']?></span>	
					</div>
					<div class="right">
						<span>热销产品</span>
						<span>
							<a href="class.php?class_id=<?php echo $rowClass['id']?>">更多</a>
						</span>
					</div>
				</div>

				<div class="floorFooter">
					<?php 
						$sqlShop="select shop.* from shop,brand,class where shop.brand_id=brand.id and brand.class_id=class.id and class.id={$rowClass['id']} and shop.shelf=1 order by rand() limit 4";
						$rstShop=mysqli_query($conn,$sqlShop);
						while($rowShop=mysqli_fetch_assoc($rstShop)){
					?>
					
					<a href="shop.php?shop_id=<?php echo $rowShop['id']?>">
						<div class='shop'>
							<div class="shopImg">
								<img src="../public/uploads/thumb_<?php echo $rowShop['img']?>" alt="">
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
					
				</div>
			</div>

			<?php
				$f++;
				}
			?>
			
		</div>
		<div class="nav"></div>
		<div class="ads">
			<img src="../public/uploads/<?php echo $rowAds[1]['img']?>" alt="">
		</div>
		<div class="nav"></div>
		
		<?php 
			include 'footer.php';
		?>
	</div>	
</body>
</html>