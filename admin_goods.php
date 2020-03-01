<?php
//SQL查询命令
$sql="select * from goods";
//执行查询命令
$result=mysqli_query($link,$sql);

echo '<h1><center>商品信息</center></h1>';
echo '<table class="layui-table">';
echo<<<TR
<tr>
        <th>序号</th><th>商品名称</th><th>价格</th><th>商品类别</th><th>商品图片</th><th>添加</th><th>操作</th><th>删除</th>
    </tr>


TR;
while($row=mysqli_fetch_row($result))
{
    echo'<tr>';
    echo'<td>'.$row[0].'</td>';
    echo'<td>'.$row[1].'</td>';
    echo'<td>'.$row[2].'</td>';
    echo'<td>'.$row[3].'</td>';
    echo'<td><img src="'.$row[4].'"></td>';

    echo"<td><a href='add.php?id=$row[0]'>添加</a></td>";
    echo"<td><a href='g_form.php?id=$row[0]'>修改</a></td>";
    echo"<td><a href='del.php?id=$row[0]'>删除</a></td>";
    echo'</tr>';
}

echo'</table>';
include_once 'view.php';
mysqli_free_result($result);
mysqli_close($link);