<?php
header("Content-Type:text/html;charset=utf-8");
$username = trim($_POST['username']);
$pw = trim($_POST['pw']);
$cpw = trim($_POST['cpw']);
$sex = $_POST['sex'];
$email = $_POST['email'];
$fav = $_POST['fav'];
$sexex = $sex ? '女' : '男';
if(empty($fav)) $fav = '无';
else $fav = implode(",",$fav);

// history.back() 浏览器返回上一步
// 链接数据库
include_once "conn.php";
// 进行验证
if(!strlen($username) || !strlen($pw)){
    echo "<script>alert('用户或者密码为空!');history.back();</script>";
    exit;
}else{
    if(!preg_match('/^[a-zA-Z0-9]{3,10}$/',$username)){
        echo "<script>alert('用户名只能为大小写和数字\n且长度未3-10个字');</script>";
        exit;
    }
}

if($pw <> $cpw){
    echo "<script>alert('两次密码必须相同!');history.back();</script>";
    exit;
}else{
    if(!preg_match('/^[a-zA-Z0-9_*]{6,10}$/',$pw)){
        echo "<script>alert('密码只能为大小写和数字和_*\n且长度未6-10个字');</script>";
        exit;
    }
}
if(!empty($email)) {
    if(!preg_match('/^[a-zA-Z0-9_\-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/',$email)){
        echo "<script>alert('邮箱格式不正确!');</script>";
        exit;
    }
}
$sql = "select * from info where username = '$username'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)) 
{
    echo "<script>alert('用户名已被使用!');history.back();</script>";
    exit;
}
// sql 操作
$sql = "insert into info(username,pw,sex,email,fav,createTime) values('$username','".md5($pw)."','$sex','$email','$fav','".time()."')";
$result = mysqli_query($conn,$sql);
if($result) echo "<script>alert('数据插入成功');location.href='login.php';</script>";
else echo "<script>alert('数据插入失败');history.back();</script>";


?>