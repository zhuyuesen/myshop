<?php
include "../lock.php";
include '../../public/common/config.php';

$id = $_GET['id'];
$img = $_GET['img'];
$file = "../../public/uploads/$img";

$sql = "delete from shop where id = $id";

/*echo $sql;

exit();*/

$res = mysqli_query($conn,$sql);

if(!$res){
    die('无法删除数据'.mysqli_error($conn));
}else{
    unlink($file);
    echo '<script>location="index.php"</script>';
}

?>