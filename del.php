<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>删除信息</title>
</head>
<body>
<?php
require './common.php';
echo
$id=$_GET['id'];
$id2=$_GET['id'];
$id3=$_GET['id'];
//SQL删除命令
$sql="delete from users where ID=".$id;
$result=mysqli_query($link,$sql);
$sql2="delete from goods where good_id=".$id2;
$result2=mysqli_query($link,$sql2);
$sql3="delete from orders where order_id=".$id3;
$result3=mysqli_query($link,$sql3);
if($result)
{
    echo"<script>alert('删除成功');location='view.php?mod=users';</script>";
}

elseif($result2)
{
    echo"<script>alert('删除成功');location='view.php?mod=goods';</script>";
}

elseif($result2)
{
    echo"<script>alert('删除成功');location='view.php?mod=orders';</script>";
}