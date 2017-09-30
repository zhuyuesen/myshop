<?php 
session_start();
include '../public/common/config.php';

$id=$_GET['shop_id'];
$sqlShop="select * from shop where id={$id}";
$rstShop=mysqli_query($conn,$sqlShop);
$rowShop=mysqli_fetch_assoc($rstShop);

$sqlBrand="select brand.* from brand,shop where shop.brand_id=brand.id and shop.id=$id";
$rstBrand=mysqli_query($conn,$sqlBrand);
$rowBrand=mysqli_fetch_assoc($rstBrand);

$class_id=$rowBrand['class_id'];
$brand_id=$rowBrand['id'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
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
						<span><a href='class.php?class_id=<?php echo $class_id?>&brand_id=<?php echo $brand_id?>'>品牌</a> &raquo; <?php echo $rowShop['name']?></span>	
					</div>
					
				</div>

				<div class="floorFooter2">
					<table width='100%'>
						<tr>
							<th>图片</th>
							<th>价格</th>
							<th>库存</th>
							<th>购物车</th>
						</tr>	
						<tr>
							<td>
								<img src="../public/uploads/thumb_<?php echo $rowShop['img'] ?>" alt="">
							</td>
							<td><?php echo $rowShop['price']?>元</td>
							<td><?php echo $rowShop['stock']?></td>
							<td>
								<a href="cart/insert.php?id=<?php echo $rowShop['id']?>">
									<img src="public/img/cart.jpg" alt="">
								</a>
							</td>
						</tr>
					</table>
				</div>
			</div>


			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>商品评论:</span>	
					</div>
					
				</div>

				<div class="floorFooter2">
					<?php 
					$sqlComment="select comment.*,user.username from comment,user where comment.user_id=user.id and comment.shop_id={$id}";
					$rstComment=mysqli_query($conn,$sqlComment);
					while($rowComment=mysqli_fetch_assoc($rstComment)){
					?>
					
					<div class="comment">
						<div class='left'>
							<div class="logo">
								<img src="public/img/logo2.png" alt="">
							</div>
							<div class="name"><?php echo $rowComment['username']?></div>
						</div>
						<div class="right">
							<?php echo $rowComment['content']?>
						</div>
					</div>	

					<?php
					}
					?>
					
				</div>
			</div>
		</div>	

		<?php 
			include 'footer.php';
		?>
	</div>	
</body>
</html>