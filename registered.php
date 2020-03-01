<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SM--欢迎注册</title>
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
    <h1><font color="#0c0c26" face="华文新魏">欢迎注册</font></h1><br><br><br>
<i class="layui-icon layui-icon-username" style="font-size: 30px; color: #1E9FFF;"></i>  用户名：<input class="layui-btn layui-btn-radius layui-btn-primary" type="text" name="user" placeholder="数字,字母,下划线（4-10）"><br><br>
<i class="layui-icon layui-icon-password" style="font-size: 30px; color: #1E9FFF;"></i>  密&nbsp;&nbsp;&nbsp;&nbsp;码：<input class="layui-btn layui-btn-radius layui-btn-primary" type="password" name="psd"><br><br>
<i class="layui-icon layui-icon-password" style="font-size: 30px; color: #1E9FFF;"></i> 再次确认:<input class="layui-btn layui-btn-radius layui-btn-primary" type="password" name="psd2"><br><br>
<i class="layui-icon layui-icon-auz" style="font-size: 30px; color: #1E9FFF;"></i>  邮&nbsp;&nbsp;&nbsp;&nbsp;箱：<input class="layui-btn layui-btn-radius layui-btn-primary" type="text" name="email" placeholder="123456@163.com"><br><br>
<i class="layui-icon layui-icon-home" style="font-size: 30px; color: #1E9FFF;"></i>  地&nbsp;&nbsp;&nbsp;&nbsp;址：<input class="layui-btn layui-btn-radius layui-btn-primary" type="text" name="address" placeholder="xx省xx市xx区"><br><br>
<i class="layui-icon layui-icon-vercode" style="font-size: 30px; color: #1E9FFF;"></i>  验证码：<input class="layui-btn layui-btn-radius layui-btn-primary" type="text" name="yzm"><br><br>
    <img src="yanzhengma.php" onclick="this.src='yanzhengma.php?rand='+Math.random()"><font color="aqua">👈刷新</font><br><br>
    <input class="layui-btn layui-btn-radius layui-btn-primary" type="submit" name="bt" value="提交">
</div>
</form>
<?php
if(isset($_POST['bt']))
{
    if(empty($_POST['user']))
    {
        echo"<script> alert('用户名不能为空');</script>";
        exit;
    }
    if(empty($_POST['psd']))
    {
        echo"<script> alert('密码不能为空');</script>";
        exit;
    }
    if(empty($_POST['psd2']))
    {
        echo"<script> alert('再次确认不能为空');</script>";
        exit;
    }
    if(empty($_POST['email']))
    {
        echo"<script> alert('邮箱不能为空');</script>";
        exit;
    }
    if(empty($_POST['address']))
    {
        echo"<script> alert('地址不能为空');</script>";
        exit;
    }
    if(empty($_POST['yzm']))
    {
        echo"<script> alert('验证码不能为空');</script>";
        exit;
    }
    $user=$_POST['user'];
    $psd=$_POST['psd'];
    $psd2=$_POST['psd2'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $yzm=$_POST['yzm'];

    $checkUser=preg_match('/^\w{4,10}$/',$user);//检查用户名是否有效
    $checkEmail=preg_match('/^[a-zA-Z0-9_\-]+@[a-zA-Z0-9_\-]+\.[a-zA-Z0-9_\-]+$/',$email);//检查邮箱合法性

    if(!$checkUser)
    {
        echo"<script> alert('用户名格式不正确，请重新填写');</script>";
    }
    elseif(!$checkEmail)
    {
        echo"<script> alert('邮箱格式不正确，请重新填写');</script>";
    }
    elseif($psd!=$psd2)
    {
        echo"<script> alert('两次密码不一致，请重新填写');</script>";
    }
    else
    {
        session_start();
        if($_SESSION['yzm']==$yzm)
        {

        require './common.php';
            $sql ="insert into users(name,psd,email,address,date) values( '$user', '$psd', '$email','$address', now()) ";
            $result=mysqli_query($link,$sql);
            $sql2="select * from users where name='$user' and psd='$psd'";
            $result2=mysqli_query($link,$sql2);
            if($row = mysqli_fetch_array($result2)){
                $_SESSION['user'] = $row;
                echo "<script>alert('用户名和密码输入正确！登录成功！');location.href=\"index.php\";</script>";
                exit;
            }
            else{
                echo "<script>alert('用户名和密码输入错误！登录失败！')</script>";
            }
           // echo "<script language='javascript' type='text/javascript'>window.location.href='index.php'; </script>";
        }
        else
            echo"<script> alert('验证码错误');</script>";
        session_destroy();
    }

}
?>
<div class="layui-footer" style="left:0px;text-align: center">
    <!-- 底部固定区域 -->
    © SM shopping mall 2018
</div>
