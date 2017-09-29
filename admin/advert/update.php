<?php
include "../lock.php";
include '../../public/common/config.php';
include '../../public/common/function.php';

var_dump($_POST);

$pos=$_POST['pos'];
$title=$_POST['title'];
$url=$_POST['url'];
$id=$_POST['id'];
$imgsrc=$_POST['imgsrc'];

$imgerror=$_FILES['img']['error'];

if($imgerror===0){
    //图片上传
    $src=$_FILES['img']['tmp_name'];

    $name=$_FILES['img']['name'];

    if(move_uploaded_file($src,'../../public/uploads/'.$name)){

        //删除原图
        $oldfile="../../public/uploads/{$imgsrc}";

        unlink($oldfile);


        $sql="update advert set pos='{$pos}',title='{$title}',url='{$url}',img='{$name}' where id={$id}";

        if(mysqli_query($conn,$sql)){
            echo '<script>location="index.php"</script>';
        }
    }
}else{
    $sql="update advert set pos='{$pos}',title='{$title}',url='{$url}' where id={$id}";
    if(mysqli_query($conn,$sql)){
        echo '<script>location="index.php"</script>';
    }
}
?>