<?php
require_once 'common.php';
if(isset($_POST['addtocart'])){
    $good_id = intval($_POST['good_id']);
    //校验商品是否存在
    if(in_array($good_id,$_SESSION['cart'])){
        echo "<script>alert(\"已在购物车中\")</script>";
    }else{
        $_SESSION['cart'][] =$good_id;
        echo "<script>alert(\"加入成功\")</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SM--商品分类</title>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/test.js"></script>
    <link rel="stylesheet" type="text/css" href="css/test.css" />
    <link rel="stylesheet" href="res/layui/css/layui.css">
    <script>
        $(document).ready(function function_name() {
            changeImg()
        })
    </script>
    <style>
        .menu {
            list-style-type: none;
            margin: 0;
            padding:0 20px;
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
        .goodslist li{
            float:left;
            width:24.9%;
            text-align:center;
        }
    </style>
</head>
<body bgcolor="#f2f2f2">

<div class="ran">
    <!--导航栏-->
    <?php
    require_once 'header.php';
    $cate = mysqli_fetch_array(mysqli_query($link,"select * from cates where cate_id=".intval($_GET['cate_id'])));
    if(!$cate) header('location:index.php');
    ?>
</div>
<fieldset class="layui-elem-field">
    <legend><h1 style="color:#A9A9A9;font-family:华文新魏 "><?=$cate['name']?></h1></legend>
    <div class="layui-field-box goodslist">
        <ul>
            <?php
            $rs = mysqli_query($link,"select * from goods where cate_id={$cate['cate_id']}");
            while($row=mysqli_fetch_assoc($rs)){
                echo "<li><form method='post'>
                    <input type='hidden' name='good_id' value='{$row['good_id']}' />
                    <img src=\"{$row['coverpic']}\"/>
                    <p>{$row['name']}</p>
                    <p style='color:red'>￥{$row['price']}</p>
                    <button type='submit' class='layui-btn layui-btn-sm' value='true' name='addtocart'>加入购物车</button>
                </form></li>";
            }
            ?>
        </ul>
    </div>
</fieldset>
</body>
<div class="layui-footer" style="left:0px;text-align: center">
    <!-- 底部固定区域 -->
    © SM shopping mall 2018
</div>