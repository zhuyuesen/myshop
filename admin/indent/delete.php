<?php
include "../lock.php";
include '../../public/common/config.php';

$code = $_GET['code'];

$sql = "delete from indent where code = $code";

/*echo $sql;

exit();*/

$res = mysqli_query($conn,$sql);

if(!$res){
    die('无法删除数据'.mysqli_error($conn));
}else{
    echo '<script>location="index.php"</script>';
}

?>