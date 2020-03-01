<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SM--任您选购！！</title>
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
require_once 'common.php';
require_once 'header.php';
checkLogin();
$title = "我的订单";

$orderQ = mysqli_query($link, "SELECT * FROM orders WHERE user_id={$_SESSION['user']['ID']} ORDER BY create_time DESC");
while ($order = mysqli_fetch_assoc($orderQ)) {
    $detail = unserialize($order['detail']);
?>

<fieldset class="layui-elem-field">
    <legend><a href="buy.php?order_id=<?=$order['order_id']?>">总金额：￥<?=number_format($order['num'], 2)?> 时间：<?=$order['create_time']?></a></legend>
    <div class="layui-field-box">
        <div class="layui-row">
            <?php
            foreach ($detail as $key => $value) {
                $good = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM goods WHERE good_id=" . $value));
                echo '<div class="layui-col-md3" style="text-align:center">
        <img src="' . $good['coverpic'] . '"/>
        <p>' . $good['name'] . '</p>
        <p>￥' . number_format($good['price'], 2).'</p>
      </div>';
            }
            ?>
        </div>
    </div>
</fieldset>
    <?php
}