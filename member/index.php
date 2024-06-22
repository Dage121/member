<?php 
session_start();
$username = $_SESSION['loggedUsername'] ?? '';
if(empty($username))
{
    echo "<script>alert('您还未登录请前往登录!');location.href='login.php'</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会员管理系统</title>
</head>
<style>
    .main{width: 80%; margin: 0 auto;text-align: center;}
    h2{font-size: 16px;}
    h2 a{color: navy;text-decoration: none;margin-right: 15px;}
    h2 a:last-child{margin-right: 0px;}
    h2 a:hover{color:#00bef8;text-decoration: underline;}
</style>
<body>
    <div class="main">
        <?php include_once "nav.php" ?>
    </div>
    <h1 align="center"><?php echo $_SESSION['loggedUsername'] ?? '';?> 欢迎回来！</h1>
</body>
</html>