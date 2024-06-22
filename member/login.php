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
        <?php include_once "nav.php" ?>
    </div>
    <form action="postLogin.php" method="post" onsubmit="return check()">
        <table align="center" border="1" style="border-collapse: collapse ;" cellpadding="10" cellspacing="0">
            <tr>
                <td align="right">用户名<span class="red">*</span></td>
                <td align="left"><input name="username"></td>
            </tr>
            <tr>
                <td align="right">密码<span class="red">*</span></td>
                <td align="left"><input name="pw"  type="password"></td>
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
        let username = document.getElementsByName("username")[0].value.trim();
        let pw = document.getElementsByName("pw")[0].value.trim();
        // 用户名 验证
        let usernameReg = /^[a-zA-Z0-9]{3,10}$/;
        if(!usernameReg.test(username))
        {
            alert('用户名只能为大小写和数字\n且长度未3-10个字');
            return false;
        }
        let pwreg = /^[a-zA-Z0-9_*]{6,10}$/;
        if(!pwreg.test(pw))
        {
            alert('密码只能为大小写和数字和_*\n且长度未6-10个字');
            return false;
        }
        return true;
    }
</script>
</html>