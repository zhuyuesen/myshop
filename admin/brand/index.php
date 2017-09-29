<?php
include "../lock.php";
include '../../public/common/config.php';

$sql="select brand.*,class.name cname from brand,class where brand.class_id=class.id";
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
            <th>编号</th>
            <th>品牌名称</th>
            <th>分类名称</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php

    /*   echo "<pre>";
        print_r(mysqli_fetch_assoc($res));
        print_r($res);
        echo "</pre>";*/


        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr><td> {$row['id']}</td> " .
                "<td>{$row['name']}</td>" .
                "<td>{$row['cname']}</td>" .
                "<td><a href='edit.php?id={$row['id']}'>修改</a></td>" .
                "<td><a href='delete.php?id={$row['id']}'>删除</a></td>" .
                "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
