<?php
include "../lock.php";
include '../../public/common/config.php';

$title = $_POST['title'];
$pos = $_POST['pos'];
$url = $_POST['url'];

$imgerr = $_FILES['img']['error'];

if($imgerr == 0){
    $src = $_FILES['img']['tmp_name'];

    $name = $_FILES['img']['name'];

//    var_dump($_FILES);
//    exit();

    if(move_uploaded_file($src,'../../public/uploads/'.$name)){
        $sql="insert advert set pos='{$pos}',title='{$title}',url='{$url}',img='{$name}'";

        if(mysqli_query($conn,$sql)){
            echo '<script>location="index.php"</script>';
        }
    }else{
        echo "保存图片出错";
    }

}else{
    echo "请上传图片";
}



?>