<?php
include "../lock.php";
include '../../public/common/config.php';

$sql="select indent.*,user.username uname,status.name sname from indent,user,status where indent.user_id = user.id and indent.status_id = status.id group by indent.code";
var_dump($sql);
//exit();

$res = mysqli_query($conn, $sql);
var_dump($res);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/common.css">
    <title>品牌管理</title>
    <style>
        table{
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }
        td{
            border-top: none;
        }
    </style>
</head>
<body>
<div class="main">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>订单号</th>
            <th>用户</th>
            <th>下单时间</th>
            <th>订单状态</th>
            <th>联系方式</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php


        while ($row = mysqli_fetch_assoc($res)) {
            echo "<pre>";
            var_dump($row);
            echo "<tr><td> {$row['code']}</td> " .
                "<td>{$row['uname']}</td>" .
                "<td>".date('Y-m-d',$row['time'])."</td>" .
                "<td>{$row['sname']}</td>" .
                "<td><a href='javascript:;'>联系方式</a></td>" .
                "<td><a href='edit.php?code={$row['code']}'>修改</a></td>" .
                "<td><a href='delete.php?id={$row['id']}'>删除</a></td>" .
                "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
