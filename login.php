<?php
require_once 'common.php';

if(isset($_POST['bt']))
{
    if(empty($_POST['user']))
    {
        echo "<script> alert('用户名不能为空');</script>";

    }elseif(empty($_POST['psd']))
    {
        echo "<script> alert('密码不能为空');</script>";
    }elseif(empty($_POST['yzm']))
    {
        echo "<script> alert('验证码不能为空');</script>";
    }else{
        $user=$_POST['user'];
        $psd=$_POST['psd'];
        $yzm=$_POST['yzm'];
        if($_SESSION['yzm']!=$yzm){
            unset($_SESSION['yzm']);
            echo"<script> alert('验证码错误');</script>";
        }else{
            //用户是否存在
            unset($_SESSION['yzm']);
            $sql = "select * from users where name='$user' and psd='$psd'";
            $result = mysqli_query($link,$sql);
            if($row = mysqli_fetch_array($result)){
                $_SESSION['user'] = $row;
                echo "<script>alert('用户名和密码输入正确！登录成功！');location.href=\"index.php\";</script>";
                exit;
            }
            else{
                echo "<script>alert('用户名和密码输入错误！登录失败！')</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SM--登录</title>
    <link rel="stylesheet" href="res/layui/css/layui.css">
    <style>
        .ran{
            width:100%;
            text-align: center;
            font-size:20px;
        }
    </style>
</head>
<body bgcolor="#f2f2f2">
<form method="post" action="">
<a href="index.php"><img src="img/SM1.jpg" width="200" height="100"></a><font size="5px;" face="华文行楷">Welcome to Shopping Mall--SM</font><br><br>

<div class="ran">
    <h1><font color="#0c0c26" face="华文新魏">欢迎登录</font></h1><br><br><br>
    <i class="layui-icon layui-icon-username" style="font-size: 30px; color: #1E9FFF;"></i>  用户名：<input class="layui-btn layui-btn-radius layui-btn-primary" type="text" name="user"><br><br>
   <i class="layui-icon layui-icon-password" style="font-size: 30px; color: #1E9FFF;"></i>  密&nbsp;&nbsp;&nbsp;&nbsp;码：<input class="layui-btn layui-btn-radius layui-btn-primary" type="password" name="psd"><br><br>
    <i class="layui-icon layui-icon-vercode" style="font-size: 30px; color: #1E9FFF;"></i>  验证码：<input class="layui-btn layui-btn-radius layui-btn-primary" type="text" name="yzm"><br><br>
    <img src="yanzhengma.php" onclick="this.src='yanzhengma.php?rand='+Math.random()"><font color="aqua">👈刷新</font><br><br>
    <input class="layui-btn layui-btn-radius layui-btn-primary" type="submit" name="bt" value="提交">
    <a href="registered.php"><input class="layui-btn layui-btn-radius layui-btn-primary" type="button" name="zc" value="注册"></a>
</div>
</form>
<div class="layui-footer" style="left:0px;text-align: center">
    <!-- 底部固定区域 -->
    © SM shopping mall 2018
</div>