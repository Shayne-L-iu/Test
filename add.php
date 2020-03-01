<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改商品</title>
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
$sql="select * from goods where good_id=".$_GET['id'];
$result=mysqli_query($link,$sql);//返回一条记录
$row=mysqli_fetch_row($result);
if(isset($_POST['bt']))
{
    $name=$_POST['name'];
    $price=$_POST['price'];
    $fl=$_POST['cate'];
    $pic=$_POST['pic'];
    $sql="insert into goods(name,price,cate_id,coverpic) values( '$name', '$price', '$fl','$pic') ";
    $result=mysqli_query($link,$sql);//返回一条记录
    if ($result) {
        echo "<script>alert(\"修改成功\")</script>";
        echo "<script>alert(\"查看结果\");location.href=\"view.php?mod=goods\";</script>";

    } else {
        print_r(mysqli_error($link));
        echo "<script>alert(\"修改成功\")</script>";
        exit;
    }
    mysqli_free_result($result);
    mysqli_close($link);
}

?>
<form name='f1' action="" method="post">
    <table class="ran">
        <caption>商品添加</caption>
        <tr>
            <td >商品名:&nbsp;&nbsp;<input type="text" name="name" value="<?php echo $row[1] ?>" class="layui-btn layui-btn-radius layui-btn-primary" ></td>

        </tr>
        <tr>
            <td>价&nbsp;&nbsp;&nbsp;&nbsp;格:&nbsp;&nbsp;<input type="text" name="price" value="<?php echo $row[2] ?>"class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
        <tr>
            <td>商品分类:<input type="text" name="cate" value="<?php echo $row[3] ?>" class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
        <tr>
            <td>图片地址:<input type="text" name="pic" value="<?php echo $row[4] ?>" class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="id"  value="<?php echo $row[0] ?>">
                <input type="submit" name="bt" value="添加" class="layui-btn layui-btn-radius layui-btn-primary"></td>
        </tr>
    </table>
</form>