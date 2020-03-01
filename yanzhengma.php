<?php
//起动session
session_start();
//创建验证码图片
$im = imagecreate(100, 30);
//设置背景颜色
$bgcolor = imagecolorallocate($im,255,255,255);
imagefill($im, 0, 0, $bgcolor);
//设置变量
$str = "";
//设置随机取的值,去掉容易出错的值如0和o
$data ='abcdefghigkmnpqrstuvwxy3456789';
//设置字体大小
$fontsize = 8;
//生成随机的字母和数字
for($i=0;$i<4;$i++){
    //设置字体颜色，随机颜色
    $fontcolor = imagecolorallocate($im, rand(0,120),rand(0,120), rand(0,120));
    //取出值，字符串截取方法  strlen获取字符串长度
    $fontcontent = substr($data, rand(0,strlen($data)),1);
    //连续定义变量
    $str .= $fontcontent;
    //设置坐标
    $x = ($i*100/4)+rand(5,10);
    $y = rand(5,10);
    imagestring($im,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
//存入session
$_SESSION['yzm'] = $str;
//增加干扰元素，设置雪花点
for($i=0;$i<200;$i++){
    //设置点的颜色，50-200颜色比数字浅，不干扰阅读
    $pointcolor = imagecolorallocate($im,rand(50,200), rand(50,200), rand(50,200));
    //imagesetpixel — 画一个单一像素
    imagesetpixel($im, rand(1,99), rand(1,29), $pointcolor);
}
//增加干扰元素，设置横线
for($i=0;$i<4;$i++){
    //设置线的颜色
    $linecolor = imagecolorallocate($im,rand(80,220), rand(80,220),rand(80,220));
    //设置线，两点一线
    imageline($im,rand(1,99), rand(1,29),rand(1,99), rand(1,29),$linecolor);
}

//输出图像
header('Content-Type: image/png');

imagepng($im);
// 销毁$image
imagedestroy($im);
?>

