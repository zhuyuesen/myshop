<?php
include '../../public/common/config.php';

$id=$_GET['id'];

$username = $_GET['username'];

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
    <title>修改用户信息</title>
</head>
<body>
<div class="main">
    <form action="update.php" method="post" onsubmit="return check()">
        <p>用户名：<input type="text" name="username" value="<?php echo $username ?>"></p>
        <p>密码：<input type="text" name="password"></p>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" value="修改">
    </form>
</div>
<script src="../../public/js/jquery-2.1.1.js"></script>
<script>
    function check(){
        var name = $("input[name='username']").val();
        var pwd = $("input[name='password']").val();
        if(!name || !pwd){
            alert('用户名或密码为空');
            return false;
        }
    }
</script>
</body>
</html>
