<?php
include '../../public/common/config.php';

$id = $_GET['id'];

$sql = "delete from comment where id = $id";

$res = mysqli_query($conn,$sql);

if(!$res){
    die('无法删除数据'.mysqli_error($conn));
}else{
    echo '<script>location="index.php"</script>';
}

?>