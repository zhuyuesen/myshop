<?php
include "../lock.php";
include '../../public/common/config.php';

$status_id = $_POST['status_id'];

$code = $_POST['code'];


//$sql="insert into user(username,password) values('{$username}','{$password}')";


$sql = "update indent set status_id='{$status_id}'where code = {$code}";
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