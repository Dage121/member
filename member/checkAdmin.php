<?php
    session_start();
    if(!$_SESSION['isAdmin'] || !isset($_SESSION['isAdmin'])) 
    {
        echo "<script>alert('您不是管理员!');history.back();</script>";
        exit;
    }
?>