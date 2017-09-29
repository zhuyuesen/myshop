<?php
include "../lock.php";
include '../../public/common/config.php';

$sql = "select comment.*,user.username,shop.id shopid,shop.name shopname from comment,user,shop where comment.user_id = user.id and comment.shop_id = shop.id";
$res = mysqli_query($conn, $sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/common.css">
    <title>评价管理</title>
    <style>
        table {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }

        td {
            border-top: none;
        }
    </style>
</head>
<body>
<div class="main">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>编号</th>
            <th>用户</th>
            <th>商品</th>
            <th>评论</th>
            <th>时间</th>
            <th>删除</th>
        </tr>
        <?php

        /*        echo "<pre>";
                print_r(mysqli_fetch_assoc($res));
                echo "</pre>";*/

//        var_dump(mysqli_fetch_assoc($res));
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr><td> {$row['id']}</td> " .
                "<td>{$row['username']}</td>" .
                "<td>{$row['shopname']}</td>" .
                "<td max-width='400px'>{$row['content']}</td>" .
                "<td>".date('Y-m-d',$row['time'])."</td>".
                "<td><a href='delete.php?id={$row['id']}'>删除</a></td>" .
                 "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
