<?php
include "../lock.php";
include '../../public/common/config.php';

$sql = "select * from advert";
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
    <title>广告</title>
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
            <th>图片</th>
            <th>排序</th>
            <th>标题</th>
            <th>url</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php

     /*   echo "<pre>";
        print_r(mysqli_fetch_assoc($res));
        echo "</pre>";*/


        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr><td> {$row['id']}</td> " .
                "<td><img src='../../public/uploads/".$row['img']."' alt='' width='200px'></td>" .
                "<td> {$row['pos']}</td> ".
                "<td> {$row['title']}</td> ".
                "<td> {$row['url']}</td> ".
                "<td><a href='edit.php?id={$row['id']}'>修改</a></td>" .
                "<td><a href='delete.php?id={$row['id']}&img={$row['img']}'>删除</a></td>" .
                "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
