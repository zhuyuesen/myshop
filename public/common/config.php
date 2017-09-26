<?php
header ( "Content-type:text/html;charset=utf-8" );  //统一输出编码为utf-8
$conn = mysqli_connect('localhost','root','','myshop15');
mysqli_query($conn,'set names utf8'); //设置读取数据后的编码
?>