<?php
include_once "checkAdmin.php";
include_once "conn.php";
$action = $_GET['action'];
$id = $_GET['id'];
if(!is_numeric($action) || !is_numeric($id))
    echo "<script>alert('参数错误');history.back();</script>";
if($action == 1 || $action == 0) // 设置或取消管理员
    $sql = "update info set admin = $action where id = $id";
else // 不是 0 或 1
{
    echo "<script>alert('参数错误');history.back();</script>";
    exit;
}
$result = mysqli_query($conn,$sql);
if($action) $msg = "设置管理员";
else $msg = "取消管理员";
if($result)
    echo "<script>alert('{$msg}成功');location.href='admin.php';</script>";
else
    echo "<script>alert('{$msg}失败');history.back();</script>";
?>

<!-- **********************
    is_numeric() 判断变量是不是数字
-->