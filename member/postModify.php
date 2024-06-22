<?php
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
if(!empty($pw))
{
    if($pw <> $cpw){
        echo "<script>alert('两次密码必须相同!');history.back();</script>";
        exit;
    }else{
        if(!preg_match('/^[a-zA-Z0-9_*]{6,10}$/',$pw)){
            echo "<script>alert('密码只能为大小写和数字和_*\n且长度未6-10个字');</script>";
            exit;
        }
    }
}
if(!empty($email)) {
    if(!preg_match('/^[a-zA-Z0-9_\-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/',$email)){
        echo "<script>alert('邮箱格式不正确!');</script>";
        exit;
    }
}
include_once "conn.php";
if($pw){
    $sql = "update info set pw = '".md5($pw)."',email = '$email',sex = '$sex',fav = '$fav' where username = '$username'";
    $url = "logout.php";
}
else {
    $sql = "update info set email = '$email',sex = '$sex',fav = '$fav' where username = '$username'";
    $url = "index.php";
}
    
$result = mysqli_query($conn,$sql);
if($result)
    echo "<script>alert('个人资料修改成功!');location.href='$url';</script>";
else 
    echo "<script>alert('个人资料修改失败!');history.back();</script>";
?>