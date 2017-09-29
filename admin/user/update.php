<?php
include "../lock.php";
include '../../public/common/config.php';

$id = $_POST['id'];

$username = $_POST['username'];

$password = md5($_POST['password']);

//$sql="insert into user(username,password) values('{$username}','{$password}')";

$sql = "update user(username,password) values('{$username}','{$password}') where id = '{$id}'";

$sql = "update user set username='{$username}',password='{$password}' where id = {$id}";
/*
INSERT INTO `user` (`username`, `password`) VALUES ( 'wlz', 'asd')

INSERT INTO `user` (`id`, `username`, `password`, `isadmin`) VALUES (NULL, 'zys', MD5('123'), '0');*/




/*echo  $sql;
exit();*/

$res = mysqli_query($conn, $sql);

if (!$res) {
    die('无法更新数据' . mysqli_error($conn));
} else {
    echo '<script>location="index.php"</script>';
}

?>