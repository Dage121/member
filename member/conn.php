<?php
// 链接数据库
// 1、链接数据库服务器
$conn = mysqli_connect("localhost","root","root","member");
if(!$conn) die("链接数据库服务器失败!");
// 2、设置数据库字符集
mysqli_query($conn,"set names utf8");
?>