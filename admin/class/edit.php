<?php
include "../lock.php";
include '../../public/common/config.php';

$id=$_GET['id'];

$name = $_GET['name'];

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
    <title>修改分类信息</title>
</head>
<body>
<div class="main">
    <form action="update.php" method="post" onsubmit="return check()">
        <p>分类名：<input type="text" name="name" value="<?php echo $name ?>"></p>
        <input type="hidden" name="id" value="<?php echo $id ?>">
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
