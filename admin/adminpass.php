<?php
include './lock.php';
//修改管理员密码
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
</head>
<body>
<form method="post" action="adminupdate.php" onsubmit="check()">
    <p>
        原密码:
        <input type="password" name="oldpass" required >
    </p>
    <p>
        新密码:
        <input type="password" name="newpass" required >
    </p>
    <p>
        确认新密码:
        <input type="password" name="surepass" required >
    </p>
    <input type="submit" value="提交">
</form>
<script src="./public/js/jquery.js"></script>
<script>
    function check() {
        var newP = document.getElementsByName('newpass')[0];
        newpv = newP.value;
        snewP = document.getElementsByName('surepass')[0];
        snewPv = snewP.value;
        if(newpv != snewPv){
            alert('新密码不一致')
            return false;
        }
    }
</script>
</body>
</html>