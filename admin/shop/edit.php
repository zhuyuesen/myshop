<?php
include '../../public/common/config.php';

$id = $_GET['id'];

$sql = "select * from shop where id=" . $id;

$res = mysqli_query($conn, $sql);

$rowshop = mysqli_fetch_assoc($res);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改用户信息</title>
    <style>
        .brand-option {
            padding-left: 30px;
        }
    </style>
</head>
<body>
<div class="main">
    <form action="update.php" method="post" enctype="multipart/form-data">
        <p>商品名称: <input type="text" name="name" value="<?php echo $rowshop['name'] ?>"></p>
        <p>商品库存: <input type="text" name="stock" value="<?php echo $rowshop['stock'] ?>"></p>
        <p>商品价格: <input type="text" name="price" value="<?php echo $rowshop['price'] ?>"></p>
        <p>是否上架:
            <?php
            if ($rowshop['shelf']) {
                echo "<label><input type=\"radio\" name=\"shelf\" value=\"1\" checked>上架</label>
            <label><input type=\"radio\" name=\"shelf\" value=\"\">下架</label>";
            } else {
                echo "<label ><input type=\"radio\" name=\"shelf\" value=\"1\">上架</label>
            <label ><input type=\"radio\" name=\"shelf\" value=\"\" checked>下架</label>";
            }
            ?>
        </p>
        <p>分类：
            <select name="brand_id" id="">
                <?php
                $sqlClass = "select * from class";
                $resClass = mysqli_query($conn, $sqlClass);
                while ($rowClass = mysqli_fetch_assoc($resClass)) {
                    echo "<option id='{$rowClass['id']}' disabled>{$rowClass['name']}</option>";

                    $sqlBrand = "select * from brand where class_id={$rowClass['id']}";
                    $resBrand = mysqli_query($conn, $sqlBrand);
                    while ($rowBrand = mysqli_fetch_assoc($resBrand)) {
                        if ($rowshop['brand_id'] == $rowBrand['id']) {
                            echo "<option class='brand-option' value='{$rowBrand['id']}' selected>    |---{$rowBrand['name']}</option>";
                        } else {
                            echo "<option class='brand-option' value='{$rowBrand['id']}'>    |---{$rowBrand['name']}</option>";
                        }
                        echo "<option class='brand-option' value='{$rowBrand['id']}'>    |---{$rowBrand['name']}</option>";
                    }
                }

                ?>
            </select>
        </p>
        <div>
            <p>原图：</p>
            <img src="../../public/uploads/<?php echo $rowshop['img']; ?>" alt="" width="200px">
        </div>
        <p>选择图片：<input type="file" name="img"></p>

        <input type="hidden" name="id" value='<?php echo $rowshop['id']?>'>
        <input type="hidden" name="imgsrc" value='<?php echo $rowshop['img']?>'>


        <p><input type="submit" value="提交"></p>
    </form>

</div>
<script src="../../public/js/jquery-2.1.1.js"></script>
<script>

</script>
</body>
</html>
