<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改结果</title>
</head>
<body>
<?php
require './common.php';

$name=$_POST['name'];
$price=$_POST['price'];
$cate=$_POST['cate'];
$pic=$_POST['pic'];
$id=$_POST['id'];
//SQL更新命令
if(!($name and $price and $cate and $pic)){
    echo "输入不允许为空。<a href='javascript:onclick=history.go(-1)'>返回</a>";
}else {
    $sql = "update goods set name='$name',cate_id='$cate',price='$price',coverpic='$pic' where good_id=" . $id;
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo "<script>alert(\"修改成功\")</script>";
        echo "<script>alert(\"查看结果\");location.href=\"view.php?mod=goods\";</script>";

    } else {
        print_r(mysqli_error($link));
        echo "修改失败";
    }
}

?>
