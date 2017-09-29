<?php
include "../lock.php";
include '../../public/common/config.php';

$sql = "select shop.* ,brand.name bname,class.name cname from shop,brand,class where shop.brand_id = brand.id and brand.class_id=class.id";
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
    <title>用户管理</title>
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
            <th>商品名称</th>
            <th>商品图片</th>
            <th>价格</th>
            <th>库存</th>
            <th>品牌</th>
            <th>分类</th>
            <th>上否上架</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php

        /*        echo "<pre>";
                print_r(mysqli_fetch_assoc($res));
                echo "</pre>";*/

        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr><td> {$row['id']}</td> " .
                "<td>{$row['name']}</td>" .
                "<td ><img src='../../public/uploads/{$row['img']}' alt='' width='100px'></td>" .
                "<td>{$row['price']}</td>" .
                "<td>{$row['stock']}</td>" .
                "<td>{$row['bname']}</td>" .
                "<td>{$row['cname']}</td>";
                if ($row['shelf']) {
                    echo "<td>上架</td>";
                } else {
                    echo "<td>下架</td>";
                }
             echo "<td><a href='edit.php?id={$row['id']}'>修改</a></td>" .
                 "<td><a href='delete.php?id={$row['id']}&img={$row['img']}'>删除</a></td>" .
                 "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
