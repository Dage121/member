<style>
    .current{color: burlywood;}
    .logged{ font-size: 16px; color: #06b8ffd3;}
    .logout{margin-left: 20px;}
    .logout a{color: chartreuse;text-decoration: none;}
    .logout a:hover{ text-decoration: underline; }
    h2 a{ color: rgb(51, 255, 0);}
    body{
        background-color: rgb(39, 39, 39);
        color: rgb(0, 255, 255);
    }
</style>
<h1>会员注册管理系统</h1>
        <?php  if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){ ?>
        <div class='logged' style="font-size: 12px;">当前登录者: <?php echo $_SESSION['loggedUsername']; ?> 
            <span style="color: red;"><?php if($_SESSION['isAdmin']) echo "管理员"; ?></span> <span class='logout'><a href='logout.php'>注销登陆</a></span>
        </div>
        <?php } 
            $id = isset($_GET['id']) ? $_GET['id'] : 1;
        ?>
        
        <h2>
            <a href="index.php?id=1" <?php if($id == 1) { ?>class="current"<?php } ?>>首页</a>
            <a href="sigup.php?id=2" <?php if($id == 2) { ?>class="current"<?php } ?>>会员注册</a>
            <a href="login.php?id=3" <?php if($id == 3) { ?>class="current"<?php } ?>>会员登陆</a>
            <a href="modify.php?id=4" <?php if($id == 4) { ?>class="current"<?php } ?>>个人资料修改</a>
            <a href="admin.php?id=5" <?php if($id == 5) { ?>class="current"<?php } ?>>后台管理</a>
        </h2>