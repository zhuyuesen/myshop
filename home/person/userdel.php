<?php 

include '../../public/common/config.php';

$id=$_GET['id'];

$sql="delete from touch where id={$id}";

if(mysqli_query($conn,$sql)){
	echo "<script>location='userlist.php'</script>";
}

?>