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
            <span class="label">分类名称:</span>
            <input type="text" name="name">
        </div>

        <p><input type="submit" value="添加" class="btn"></p>
    </form>
</div>
<script src="../../public/js/jquery-2.1.1.js"></script>
<script>
    function check(){
        var name = $("input[name='name']").val();
        if(!name){
            alert('分类名称为空');
            return false;
        }
    }
</script>
</body>
</html>
