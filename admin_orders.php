
<?php
//SQL查询命令
$sql="select * from orders";
//执行查询命令
$result1=mysqli_query($link,$sql);

    echo '<h1><center>商品订单</center></h1>';
    echo '<table class="layui-table">';
    echo<<<TR
<tr>
<th>用户ID</th><th>总计</th><th>收货人姓名</th><th>联系电话</th><th>收货人地址</th><th>创建时间</th>
</tr>

TR;
    while($row=mysqli_fetch_row($result1))
    {
        echo'<tr>';


        echo'<td>'.$row[1].'</td>';
        echo'<td>'.$row[2].'</td>';
        echo'<td>'.$row[3].'</td>';
        echo'<td>'.$row[4].'</td>';
        echo'<td>'.$row[5].'</td>';
        echo'<td>'.$row[6].'</td>';
        echo'</tr>';
    }

echo'</table>';
include_once 'view.php';
mysqli_free_result($result1);
mysqli_close($link);
