<?php
/**
 * 检测后台管理员是否登陆 
 */
include '../public/common/config.php';

session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='/admin/login.php'</script>";
    exit;
}