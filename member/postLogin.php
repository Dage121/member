<?php
session_start(); // 会话标志 判断登录权限
$username = trim($_POST['username']);
$pw = trim($_POST['pw']);
if(!strlen($username) || !strlen($pw)){
    echo "<script>alert('用户或者密码为空!');history.back();</script>";
    exit;
}else{
    if(!preg_match('/^[a-zA-Z0-9]{3,10}$/',$username)){
        echo "<script>alert('用户名只能为大小写和数字\n且长度未3-10个字');</script>";
        exit;
    }
    if(!preg_match('/^[a-zA-Z0-9_*]{6,10}$/',$pw)){
        echo "<script>alert('密码只能为大小写和数字和_*\n且长度未6-10个字');</script>";
        exit;
    }
}

include_once "conn.php";

$sql = "select * from info where username = '$username' and pw = '".md5($pw)."'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
    $_SESSION['loggedUsername'] = $username;
    // 判断是否为管理员
    $info = mysqli_fetch_array($result);
    $_SESSION['isAdmin'] = $info['admin'];

    echo "<script>alert('登录成功!');location.href='index.php'</script>";
}else{
    unset($_SESSION['isAdmin']);
    unset($_SESSION['loggedUsername']);
    echo "<script>alert('用户名或密码错误!');history.back();</script>";
}
?>