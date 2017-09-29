<?php
include "../lock.php";
include '../../public/common/config.php';
include '../../public/common/function.php';

var_dump($_POST);

$sname=$_POST['name'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$shelf=$_POST['shelf'];
$brand_id=$_POST['brand_id'];
$id=$_POST['id'];
$imgsrc=$_POST['imgsrc'];

$imgerror=$_FILES['img']['error'];

if($imgerror===0){
    //图片上传
    $src=$_FILES['img']['tmp_name'];

    $name=$_FILES['img']['name'];

    $ext=array_pop(explode('.',$name));

    $dst='../../public/uploads/'.time().mt_rand().'.'.$ext;

    if(move_uploaded_file($src,$dst)){


        //删除原图
        $oldfile="../../public/uploads/{$imgsrc}";

        unlink($oldfile);

        $img=basename($dst);

        $sql="update shop set name='{$sname}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}',img='{$img}' where id={$id}";

        if(mysqli_query($conn,$sql)){
//            echo '<script>location="index.php"</script>';
        }
    }
}else{
    $sql="update shop set name='{$sname}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}' where id={$id}";
    if(mysqli_query($conn,$sql)){
        echo '<script>location="index.php"</script>';
    }
}
?>