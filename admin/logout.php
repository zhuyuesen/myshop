<?php 

session_start();

$_SESSION=array();

session_destroy();

setcookie('PHPSESSID','',time()-3600,'/');

echo '<script>location="login.php"</script>';
?>