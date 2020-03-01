<?php
require_once 'common.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>SM--任您选购！！</title>
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

    <div class="ran">
        <!--导航栏-->
        <?php
        require_once 'header.php';
        ?>
        <form name="f1" method="get" action="">
            <a href="index.php"><img src="img/SM1.jpg" width="200" height="100"></a>
            <input class="layui-btn layui-btn-radius layui-btn-primary" type="text" size="65" name="search" value="美味糕点">
            <input class="layui-btn layui-btn-radius layui-btn-primary" type="submit" name="bt" value="🔍搜索">
            <!--只能搜索  美味糕点、坚果食品、服装类-->
        </form>
        <div id="ad" style="width:1000px;margin:0 auto">
            <!--轮播图片-->
            <ul id="ad_img" >
                <li><img src="img/g1.png" width="245" height="245" /></li>
                <li><img src="img/y4.png" width="245" height="245" /></li>
                <li><img src="img/y1.png" width="245" height="245" /></li>
                <li><img src="img/y6.png" width="245" height="245" /></li>
                <li><img src="img/j2.png" width="245" height="245" /></li>
            </ul>
            <ul id="ad_num">
                <li>1</li><li>2</li><li>3</li><li>4</li><li>5</li>
            </ul>
        </div>

    </div>

    <?php
    $result = mysqli_query($link,"SELECT * FROM cates");
    while($row=mysqli_fetch_assoc($result)){
        echo "<fieldset class=\"layui-elem-field\">";
        echo "<legend><h1><a href=\"list.php?cate_id=".$row['cate_id']."\"><span style=\"color:#A9A9A9;font-family:华文新魏 \">".$row['name']."</span></a></h1></legend>";
        echo "<div class=\"layui-field-box\"><table align=\"center\">";
        $rs = mysqli_query($link,"SELECT * FROM goods where cate_id=".$row['cate_id']." limit 0,4");
        while($r=mysqli_fetch_assoc($rs)){
            echo "<td><a href='list.php?cate_id=".$r['cate_id']."'><img src='".$r['coverpic']."'></a></td>";
        }
        echo "<td><a href=\"list.php?cate_id=".$row['cate_id']."\" class=\"layui-btn layui-btn-radius layui-btn-primary\">更多</a></td>";
        echo "</table></div>";
        echo "</fieldset>";
    }
    ?>

    </body>

    </html>
<?php
//if($_GET)
if(isset($_GET['bt']))
{
    $search=$_GET['search'];
    if($search==="美味糕点")
    {
        echo "<script language='javascript' type='text/javascript'>window.location.href='list.php?cate_id=1'; </script>";

    }
    elseif($search==="坚果食品")
    {
        echo "<script language='javascript' type='text/javascript'>window.location.href='list.php?cate_id=2'; </script>";
    }
    elseif($search==="服装类")
    {
        echo "<script language='javascript' type='text/javascript'>window.location.href='list.php?cate_id=3'; </script>";
    }
    else{
        echo" <script> alert('词条不存在，请输入 美味糕点或者坚果食品或者服装类');</script>";
    }
}
?>
<div class="layui-footer" style="left:0px;text-align: center">
    <!-- 底部固定区域 -->
    © SM shopping mall 2018
</div>
