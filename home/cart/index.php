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
						<span>我的购物车:</span>	
					</div>
					
				</div>

				<div class="floorFooter2">
					<table width='100%'>
						<tr>
							<th>商品</th>
							<th>图片</th>
							<th>价格</th>
							<th>库存</th>
							<th>数量</th>
							<th>合计</th>
							<th>删除</th>
						</tr>	
						<?php 
						$tot=0;
						if(!@$_SESSION['shops']){
							echo "<div class='goods'>您还未购买任何商品，请先购物，<a href='../index.php' class='cartNum'>购物</a></div>";	
						}else{
							foreach($_SESSION['shops'] as $shop){
								$tot+=$shop['price']*$shop['num'];
						?>

						<tr>
							<td><?php echo $shop['name']?></td>
							<td>
								<img src="../../public/uploads/thumb_<?php echo $shop['img']?>" width='100px'>
							</td>
							<td><?php echo $shop['price']?>元</td>
							<td><?php echo $shop['stock']?></td>
							<td>
								<a href="cut.php?id=<?php echo $shop['id']?>" class='cartNum'>-</a>
								<span> <?php echo $shop['num']?> </span>
								<a href="add.php?id=<?php echo $shop['id']?>" class='cartNum'>+</a>
							</td>
							<td><?php echo $shop['price']*$shop['num']?>元</td>
							<td>
								<a href="delete.php?id=<?php echo $shop['id']?>" class='cartDel'>删除</a>
							</td>
						</tr>
	

						<?php
						}
						?>
						
						<tr class='cartTot'>
							<td colspan='2'><a href="../index.php" class='cartNum'>继续购物</a></td>
							<td colspan='2'><a href="clear.php" class='cartNum'>清空购物车</a></td>
							<td>&nbsp;</td>
							<td>总合计:</td>
							<td><?php echo $tot?>元</td>
						</tr>	
					</table>
					<?php 
					}
					?>
				</div>
			</div>


			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>我的联系方式:</span>	
					</div>
					
				</div>

				<div class="floorFooter2">
					<?php 
						if($_SESSION['home_userid']){
					?>
							<form action="commit.php" method='post'>
								<table width='100%' class='touch'>
									<tr>
										<th>选择</th>
										<th>姓名</th>
										<th>地址</th>
										<th>电话</th>
										<th>邮箱</th>
									</tr>	
									<?php 
									$user_id=$_SESSION['home_userid'];
									$sql="select * from touch where user_id={$user_id}";
									$rst=mysqli_query($conn,$sql);
									$i=0;
									while($row=mysqli_fetch_assoc($rst)){
										if($i==0){
											echo "<tr>
												<td>
													<input type='radio' checked name='touch_id' value='{$row['id']}'>
												</td>
												<td>{$row['name']}</td>
												<td>{$row['addr']}</td>
												<td>{$row['tel']}</td>
												<td>{$row['email']}</td>
											</tr>";
										}else{
											echo "<tr>
												<td>
													<input type='radio' name='touch_id' value='{$row['id']}'>
												</td>
												<td>{$row['name']}</td>
												<td>{$row['addr']}</td>
												<td>{$row['tel']}</td>
												<td>{$row['email']}</td>
											</tr>";
										}
										
										$i++;
									}
									?>
									
								</table>
					<?php
						}else{
							echo "您还未登录，请先登录，<a href='../login.php' class='cartNum'>登录</a>";
						}
					?>
				</div>
			</div>
				

			<div class="floor">
				<div class="floorHeader">
					<div class="left">
						<span>提交我的订单:</span>	
					</div>
					
				</div>

				<div class="floorFooter2">
					<p><input type="submit" value="提交订单" class='commit'></p>
				</div>
			</div>
			</form>
		</div>	

		<?php 
			include '../footer.php';
		?>
	</div>	
</body>
</html>