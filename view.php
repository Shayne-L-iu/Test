<?php
require_once 'common.php';
checkLogin();
if(!$_SESSION['user']['isAdmin']){
    echo "您不是管理员";
    exit;
}
$mod = $_GET['mod'];
if(!in_array($mod,array('users','goods','orders'))) $mod = 'users';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>管理员页面</title>
    <link rel="stylesheet" href="res/layui/css/layui.css">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">管理员页面</div>
        <!-- 头部区域 -->
        <ul class="layui-nav layui-layout-left">

        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    Admin
                </a>
            </li>
            <li class="layui-nav-item"><a href="index.php">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域 -->
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="view.php?mod=users">用户信息</a>
                </li>
                <li class="layui-nav-item">
                    <a href="view.php?mod=goods">商品信息</a>
                </li>
                <li class="layui-nav-item"><a href="view.php?mod=orders">商品订单</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;"><?php require_once('admin_'.$mod.'.php');?></div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © SM shopping mall 2018
    </div>
</div>
<script src="res/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    })
</script>
</body>
</html>