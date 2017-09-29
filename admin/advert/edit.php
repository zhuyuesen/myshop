<?php
include "../lock.php";
include '../../public/common/config.php';

$id = $_GET['id'];

$sql = "select * from advert where id=" . $id;

$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改广告信息</title>
    <style>
        .brand-option {
            padding-left: 30px;
        }
    </style>
</head>
<body>
<div class="main">
    <form action="update.php" method="post" enctype="multipart/form-data">


        <p>排序: <input type="text" name='pos' value="<?php echo $row['pos'] ?>"></p>
        <p>标题: <input type='text' name='title' value="<?php echo $row['title'] ?>"></p>
        <p>url: <input type='text' name='url' value="<?php echo $row['url'] ?>"></p>
        <div>
            <p>原图：</p>
            <img src="../../public/uploads/<?php echo $row['img'] ?>" alt="" width="200px">
        </div>

        <p>选择图片：<input type="file" name="img"></p>

        <input type="hidden" name="id" value='<?php echo $row['id'] ?>'>
        <input type="hidden" name="imgsrc" value='<?php echo $row['img'] ?>'>


        <p><input type="submit" value="提交"></p>
    </form>

</div>
<script src="../../public/js/jquery-2.1.1.js"></script>
<script>

</script>
</body>
</html>
