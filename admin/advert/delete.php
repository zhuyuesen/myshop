<?php
include "../lock.php";
include '../../public/common/config.php';

$id = $_GET['id'];

$img = $_GET['img'];

var_dump($img);

$sql = "delete from advert where id = $id";

$res = mysqli_query($conn,$sql);

if(!$res){
    die('无法删除数据'.mysqli_error($conn));
}else{
    unlink('../../public/uploads/'.$img);
    echo '<script>location="index.php"</script>';
}

?>