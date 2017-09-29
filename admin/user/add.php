<?php
include "../lock.php";
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
    <form action="insert.php" method="post" onsubmit="return check()">
        <div class="form_control">
            <span class="label">用户名:</span>
            <input type="text" name="username">
        </div>

        <div class="form_control">
            <span class="label">密码:</span>
            <input type="text" name="password">
        </div>

        <p><input type="submit" value="添加" class="btn"></p>
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
