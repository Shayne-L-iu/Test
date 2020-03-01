<ul class="menu">
    <li><a href="index.php">中国</a></li>
    <?php
    //登陆之后
    if(isset($_SESSION['user'])){
        echo '<li><a href="javascript:;">'.$_SESSION['user']['name'].'，欢迎光临</a></li>';
        if($_SESSION['user']['isAdmin']){
            echo ' <li><a href="view.php">管理员入口</a></li>';
        }
        echo '<li><a href="logout.php">退出</a></li>';
    }else{
        echo '<li><a href="login.php">请登录</a></li>';
        echo '<li><a href="registered.php">免费注册</a></li>';
    }
    ?>

    <li style="float:right"><a  href="gwc.php"  >🛒购物车(<?=count($_SESSION['cart'])?>)</a></li>
    <li style="float:right"><a  href="orders.php"  >我的订单</a></li>
    <li style="float:right"><a  href="index.php"  >首页</a></li>

</ul>

