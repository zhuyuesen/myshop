<?php
include '../../public/common/config.php';

$name = $_POST['name'];


//$sql="insert into user(username,password) values('{$username}','{$password}')";

$sql = "insert into status(name) values('{$name}')";
/*
INSERT INTO `user` (`username`, `password`) VALUES ( 'wlz', 'asd')

INSERT INTO `user` (`id`, `username`, `password`, `isadmin`) VALUES (NULL, 'zys', MD5('123'), '0');*/




/*echo  $sql;
exit();*/

$res = mysqli_query($conn, $sql);

if (!$res) {
    die('无法插入数据' . mysqli_error($conn));
} else {
    echo '<script>location="index.php"</script>';
}

?>