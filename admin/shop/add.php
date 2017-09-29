<?php
include "../lock.php";
include '../../public/common/config.php';

/*$id=$_GET['id'];

$username = $_GET['username'];*/

//echo $id.$username;

//$sql = "insert into user(username,password) values('{$username}','{$password}')";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/common.css">
    <title>添加用户</title>
</head>
<body>
<div class="main">
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <div class="form_control">
            <span class="label">商品名称:</span>
            <input type="text" name="name">
        </div>
        <div class="form_control">
            <span class="label">价格:</span>
            <input type="text" name="price">
        </div>
        <div class="form_control">
            <span class="label">库存:</span>
            <input type="text" name="stock">
        </div>

        <div class="form_control">
            <span class="label">品牌:</span>
            <select name="brand_id" id="">
                <?php
                $sqlclass = "select * from class";
                $rstclass = mysqli_query($conn, $sqlclass);
                while ($rowClass = mysqli_fetch_assoc($rstclass)) {
                    echo "<option disabled>{$rowClass['name']}</option>";
                    $sqlbrand = "select * from brand where class_id = {$rowClass['id']}";
                    $rstbrand = mysqli_query($conn, $sqlbrand);
                    while ($rowbrand = mysqli_fetch_assoc($rstbrand)) {
                        echo "<option value='{$rowbrand['id']}'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|----{$rowbrand['name']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form_control">
            <span class="label">上下架:</span>
            <label>
                <input type="radio" name="shelf" value="1" checked>上架
            </label>
            <label>
                <input type="radio" name="shelf" value="0">下架
            </label>
        </div>

        <div class="form_control">
            <span class="label">图片:</span>
            <input type="file" name="img" id="">
        </div>

        <p><input type="submit" value="添加" class="btn"></p>
    </form>
</div>
<script src="../../public/js/jquery-2.1.1.js"></script>
<script>
    function check() {
        var name = $("input[name='username']").val();
        var pwd = $("input[name='password']").val();
        if (!name || !pwd) {
            alert('用户名或密码为空');
            return false;
        }
    }
</script>
</body>
</html>
