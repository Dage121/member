<?php include_once "checkAdmin.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .main{width: 80%; margin: 0 auto;text-align: center;}
    h2{font-size: 16px;}
    h2 a{color: navy;text-decoration: none;margin-right: 15px;}
    h2 a:last-child{margin-right: 0px;}
    h2 a:hover{color:#00bef8;text-decoration: underline;}
    .current{color: burlywood;}
    .logged{ font-size: 16px; color: #06b8ffd3;}
    .logout{margin-left: 20px;}
    .logout a{color: chartreuse;text-decoration: none;}
    .logout a:hover{ text-decoration: underline; }
    .trClick1{background-color: rgba(0, 255, 255, 0.3);}
    .trClick2{background-color: rgb(39, 39, 39);}
    td a{  color: rgb(51, 255, 0); }
</style>
<body>
    <div class="main">
        <?php 
            include_once "nav.php"; 
            include_once "conn.php";
            $sql = "select * from info order by id desc";
            $result = mysqli_query($conn,$sql);
            $i = 1;
        ?>
        <table border="1" cellspacing="0" cellpadding="10" style="border-collapse: collapse" align="center">
            <tr>
                <td>序号</td>
                <td>用户名</td>
                <td>性别</td>
                <td>邮箱</td>
                <td>爱好</td>
                <td>是否管理员</td>
                <td>操作</td>
            </tr>
            <?php while($info = mysqli_fetch_array($result)){ ?>
            <tr onclick="if(this.className=='trClick1'){this.className='trClick2';}else {this.className='trClick1'; }">
                <td><?php echo $i; ?></td>
                <td><?php echo $info['username'] ; ?></td>
                <td><?php echo $info['sex'] ? '男' : '女' ; ?></td>
                <td><?php echo $info['email'] ; ?></td>
                <td><?php echo $info['fav'] ; ?></td>
                <td><?php echo $info['admin'] ? '是' : '否' ; ?></td>
                <td>
                    <a href="modify.php?id=4&username=<?php echo $info['username'] ; ?>">修改资料</a>
                    <?php if($info['username'] <> "admin") { ?><a href="javascript:del(<?php echo $info['id']; ?>,'<?php echo $info['username']; ?>');">删除会员</a> <?php } ?>
                    <?php      
                        if($info['username'] <> "admin")
                        {
                            if($info['admin'])
                                echo "<a href='setAdmin.php?action=0&id=".$info['id']."'>取消管理员</a>";
                            else
                                echo "<a href='setAdmin.php?action=1&id=".$info['id']."'>设置管理员</a>";
                            
                        }
                        else echo "<span style='color:red;'>超级管理员</span>";
                    ?>
                </td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</body>
<script>
    function del(id,name)
    {
        console.log(111);
        if(confirm('确定要删除会员 ' + name + ' ?'))
            location.href = 'del.php?id=' + id + '&username=' + name;
    }
</script>
</html>

<!-- *****************************
    "select count(id) from info"; 统计 id 有多少个
    $page = $_GET['page'] ?? 1; 判断 $_GET['page'] 是否存在 是就返回 $_GET['page'] 否返回 1
-->