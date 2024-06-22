<?php session_start() ?>
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
    .current{color: burlywood;}
    .red{color: red;}
</style>
<body>
    <div class="main">
        <?php 
            include_once "nav.php" ;
            include_once "conn.php";
            $username = $_GET['username'] ?? '';
            if($username) $sql = "select * from info where username = '".$username."'";
            else $sql = "select * from info where username = '".$_SESSION['loggedUsername']."'";
            //$sql = "select * from info where username = '".$_SESSION['loggedUsername']."'";
            $result = mysqli_query($conn,$sql);
            if(!mysqli_num_rows($result)) die("未找到用户");
            $info = mysqli_fetch_array($result);
            $fav = explode(',',$info['fav']); // 将字符串 用 ， 分割 为数组
        ?>
    </div>
    <form action="postModify.php" method="post" onsubmit="return check()">
        <table align="center" border="1" style="border-collapse: collapse ;" cellpadding="10" cellspacing="0">
            <tr>
                <td align="right">用户名</td>
                <td align="left"><input name="username" value="<?php echo $info['username']; ?>" readonly></td>
            </tr>
            <tr>
                <td align="right">密码</td>
                <td align="left"><input name="pw"  type="password" placeholder="不修改密码请留空"></td>
            </tr>
            <tr>
                <td align="right">确认密码</td>
                <td align="left"><input name="cpw" type="password" placeholder="不修改密码请留空"></td>
            </tr>
            <tr>
                <td align="right">性别</td>
                <td align="left">
                    <input name="sex" type="radio" <?php if($info['sex'])  { echo "checked"; } ?> value="1">男
                    <input name="sex" type="radio" <?php if(!$info['sex']) { echo "checked"; } ?> value="0">女
                </td>
            </tr>
            <tr>
                <td align="right">邮箱</td>
                <td align="left"><input name="email" type="email" value="<?php echo $info['email']; ?>" ></td>
            </tr>
            <tr>
                <td align="right">爱好</td>
                <td align="left">
                    <input name="fav[]" type="checkbox" value="听音乐" <?php if(in_array('听音乐',$fav)) echo 'checked'; ?> >听音乐
                    <input name="fav[]" type="checkbox" value="玩游戏" <?php if(in_array('玩游戏',$fav)) echo 'checked'; ?> >玩游戏
                    <input name="fav[]" type="checkbox" value="踢足球" <?php if(in_array('踢足球',$fav)) echo 'checked'; ?> >踢足球
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="提交" style="width: 80px; height: 25px;">
                    <input type="reset"  value="重置" style="width: 80px; height: 25px;margin-left: 30px;">
                </td>
                <!-- <td><input type="reset"  value="重置"></td> -->
            </tr>
        </table>
    </form>
</body>
<script>
    function check()
    {
        let pw = document.getElementsByName("pw")[0].value.trim();
        let cpw = document.getElementsByName("cpw")[0].value.trim();
        let email = document.getElementsByName("email")[0].value.trim();
        if($pw.length > 0)
        {
            let pwreg = /^[a-zA-Z0-9_*]{6,10}$/;
            if(!pwreg.test(pw))
            {
                alert('密码只能为大小写和数字和_*\n且长度未6-10个字');
                return false;
            }
            if(pw != cpw)
            {
                alert('两次密码必须相同');
                return false;
            }
        }

        if(email.length > 0)
        {
            let emailReg = /^[a-zA-Z0-9_\-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/;
            if(!emailReg.test(email))
            {
                alert('邮箱格式不正确!');
                return false;
            }
        }
        return true;
    }
</script>
</html>






<!-- **************************************** 
    $fav = explode(',',$info['fav']); // 将字符串 用 ， 分割 为数组
    in_array("要查找数组里面的内容",目标数组) 找到 return true ，没找到 return false;





 -->