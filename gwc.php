<?php
require_once 'common.php';
checkLogin();
if (isset($_GET['delete'])) {
    unset($_SESSION['cart'][$_GET['delete']]);
    echo "<script>alert(\"删除成功\");location.href=\"gwc.php\"</script>";
}
if(isset($_POST['bt']))
{

    $name=$_POST['name'];
    $tel=$_POST['tel'];
    $address=$_POST['address'];
    $num=0;
    foreach ($_SESSION['cart'] as $key=>$value) {
    $good_id = $value;
    $good = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM goods where good_id=" . $good_id));
    $num+=$good['price'];
    }
    $sql ="insert into orders(user_id,num,name,tel,city,create_time,detail) values( {$_SESSION['user']['ID']},'$num','$name', '$tel', '$address', now(),'".serialize($_SESSION['cart'])."') ";

    $result=mysqli_query($link,$sql);
    unset($_SESSION['cart']);
    $order_id = mysqli_fetch_row(mysqli_query($link,"select last_insert_id()"));
    header('location:buy.php?order_id='.$order_id['0']);
    exit;

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的购物车</title>
    <link rel="stylesheet" href="res/layui/css/layui.css">
    <style>
        .menu {
            list-style-type: none;
            padding:0 20px;
            margin: 0;
            overflow: hidden;
            background-color: #A9A9A9;
        }
        .menu li {
            float: left;
        }
        .menu li a {
            display: block;
            color: white;
            text-align: center;
            padding: 12px 14px;
            text-decoration: none;
        }
        /*鼠标移动到选项上修改背景颜色 */
        .menu li a:hover {
            background-color: #3a6c7e;
        }
        .ran{
            width:100%;
            text-align: center;
        }
    </style>
</head>
<body bgcolor="#f2f2f2">



<?php
require_once 'header.php';
if (count($_SESSION['cart']) == 0) {
    echo "<h1 style='text-align: center'>空空如也！快去添加商品吧！</h1>";
} else {
    echo"<div class='ran'>";
    echo "<form class=\"layui-form\" action=\"\" method=\"post\">  <div class=\"layui-row\" style=\"border-bottom: 1px solid #efefef;padding-bottom:10px\">
";
    echo "收货人姓名：<input class=\"layui-btn layui-btn-radius layui-btn-primary\" type=\"text\" name=\"name\" ><br>";
    echo "联系电话：  &nbsp;&nbsp;<input class=\"layui-btn layui-btn-radius layui-btn-primary\" type=\"text\" name=\"tel\" ><br>";
    echo "收货人地址：<input class=\"layui-btn layui-btn-radius layui-btn-primary\" type=\"text\" name=\"address\" ><br>";
    echo" <input  class=\"layui-btn layui-btn-radius layui-btn-primary\" type=\"submit\" name=\"bt\" value=\"立即购买\"><br>";
    echo "<br>";
    echo "<br>";
    foreach ($_SESSION['cart'] as $key=>$value) {
        $good_id = $value;
        $good = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM goods where good_id=" . $good_id));
        ?>
            <div class="layui-col-md3">
            <div style="float: left" class="ran">

                <img src="<?= $good['coverpic'] ?>" height="220px" style="float: left">

                <h3 ><?= $good['name'] ?></h3><br>
                <span style="color:red">￥<?= number_format($good['price'], 2) ?></span><br>
                <a href="gwc.php?delete=<?= $key ?>" class="layui-btn">删除</a>

            </div>

        </div>

        <?php
    }
echo"</div>";
}
?>
<?php

?>

<div class="layui-footer" style="left:0px;text-align: center">
    <!-- 底部固定区域 -->
    © SM shopping mall 2018
</div>