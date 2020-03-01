<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改结果</title>
</head>
<body>
<?php
require './common.php';

$name=$_POST['users'];
$email=$_POST['email'];
$psd=$_POST['psd'];
$address=$_POST['address'];
$id=$_POST['id'];
//SQL更新命令
if(!($name and $email and $psd and $address)){
    echo "输入不允许为空。<a href='javascript:onclick=history.go(-1)'>返回</a>";
}else {
    $sql = "update users set name='$name',psd='$psd',email='$email',address='$address' where ID=" . $id;
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo "<script>alert(\"修改成功\")</script>";
        echo "<script>alert(\"查看结果\");location.href=\"view.php\";</script>";

    } else {
        print_r(mysqli_error($link));
        echo "修改失败";
    }
}

?>
