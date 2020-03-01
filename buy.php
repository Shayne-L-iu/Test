<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>即刻购买</title>
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
$order_id = $_GET['order_id'];
$order = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM orders WHERE user_id={$_SESSION['user']['ID']} AND order_id='{$order_id}'"));
if (!$order) {
    echo "<script>alert('订单不存在');location.href='gwc.php'</script>";
}

?>
<fieldset class="layui-elem-field">
    <legend><?=$order['order_id']?> 总金额：￥<?=number_format($order['num'], 2)?> 时间：<?=$order['create_time']?></legend>
    <div class="layui-field-box">
        <div class="layui-row">

            <?php
            $detail = unserialize($order['detail']);
            foreach ($detail as $key => $value) {
                $good = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM goods WHERE good_id=" . $value));
                echo '<div class="layui-col-md3" style="text-align:center">
        <img src="' . $good['coverpic'] . '"/>
        <p>' . $good['name'] . '</p>
        <p>￥' . number_format($good['price'], 2) . '</p>
      </div>';
            }
            ?>
        </div>
        <p>收货人：<?=$order['name']?></p>
        <p>联系电话：<?=$order['tel']?></p>
        <p>收货地址：<?=$order['city']?></p>
    </div>
</fieldset>