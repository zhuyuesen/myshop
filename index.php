<?php 
echo "hello world";
if(!@$_SESSION['home_userid']){
    echo "没有session";
}else{
    echo "有session";
}
 ?>