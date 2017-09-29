<?php
include "../lock.php";
include '../../public/common/config.php';

$sql = "select * from status";
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
    <title>订单状态管理</title>
    <style>
        table{
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }
        td{
            border-top: none;
        }
        .text-center{
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="main">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>编号</th>
            <th>状态</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
        <?php



        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr><td> {$row['id']}</td> " .
                "<td>{$row['name']}</td>" .
                "<td><a href='edit.php?id={$row['id']}&name={$row['name']}'>修改</a></td>" .
                "<td><a href='delete.php?id={$row['id']}'>删除</a></td>" .
                "</tr>";
        }
        ?>
    </table>
    <p class="text-center"><a href="add.php">增加状态</a></p>
</div>
</body>
</html>
