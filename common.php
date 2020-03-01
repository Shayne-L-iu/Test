<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(0);
session_start();
$link=@mysqli_connect('localhost','root','123456','mydatabase') or die('没有找到数据库');
//选择数据库
mysqli_select_db($link,'mydatabase')or die('没有找到数据库');
//设置字符编码
mysqli_query($link,"set names utf8");

/**
 * 判断是否登录
 */
function checkLogin() {
    if (!$_SESSION['user']) {
        echo "<script>alert('请先登录');location.href='login.php'</script>";
        exit;
    }
}