<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改用户表单</title>
    <link rel="stylesheet" href="res/layui/css/layui.css">
    <style>
    .ran{
         width:100%;
         text-align: center;
         font-size:20px;
    }
    </style>
</head>
<body>
<?php
require './common.php';
//查询命令
$sql="select * from users where ID=".$_GET['id'];
$result=mysqli_query($link,$sql);//返回一条记录
$row=mysqli_fetch_row($result);
?>
<form name='f1' action="u_ok.php" method="post">
    <table class="ran">
        <caption>用户信息修改</caption>
        <tr>
          <td >用户名:<input type="text" name="users" value="<?php echo $row[1] ?>" class="layui-btn layui-btn-radius layui-btn-primary" ></td>

        </tr>
        <tr>
            <td>密&nbsp;&nbsp;&nbsp;码:<input type="password" name="psd" class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
        <tr>
            <td>邮&nbsp;&nbsp;&nbsp;箱:<input type="text" name="email" value="<?php echo $row[3] ?>" class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
        <tr>
            <td>地&nbsp;&nbsp;&nbsp;址:<input type="text" name="address" value="<?php echo $row[4] ?>" class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="id"  value="<?php echo $row[0] ?>">
                <input type="submit" name="bt" value="修改" class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
    </table>
</form>



