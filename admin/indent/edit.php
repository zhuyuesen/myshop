<?php
include "../lock.php";
include '../../public/common/config.php';

$code=$_GET['code'];

$status_id = $_GET['status_id'];

$sql="select * from status";

$res = mysqli_query($conn,$sql);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改订单信息</title>
</head>
<body>
<div class="main">
    <form action="update.php" method="post">
        <p>订单号：<?php echo $code ?></p>
        <p>
            选择状态：
            <select name="status_id">
                <?php
                while($row = mysqli_fetch_assoc($res)){
                    if($status_id == $row['id']){
                    echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
                    }else{
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                }
                ?>
            </select>
        </p>
        <input type="hidden" name="code" value="<?php echo $code ?>" />
        <input type="submit" value="修改">

    </form>
</div>
<script src="../../public/js/jquery-2.1.1.js"></script>
<script>
    function check(){
        var name = $("input[name='name']").val();
        if(!name ){
            alert('分类名为空');
            return false;
        }
    }
</script>
</body>
</html>
