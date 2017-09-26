<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/common.css">
    <title>添加订单状态</title>
</head>
<body>
<div class="main">
    <form action="insert.php" method="post">
       <p>
            <span class="label">订单状态名称:</span>
            <input type="text" name="name">
       </p>

        <p><input type="submit" value="添加" class=""></p>
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
