<?php
include '../../public/common/config.php';

$id=$_GET['id'];

$name = $_GET['name'];

$sql="select * from brand where id = $id";

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
    <title>修改品牌信息</title>
</head>
<body>
<div class="main">
    <form action="update.php" method="post" onsubmit="return check()">

        <div class="form_control">
            <span class="label">品牌名称:</span>
            <input type="text" name="name" "<?php echo $name ?>">
        </div>
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
