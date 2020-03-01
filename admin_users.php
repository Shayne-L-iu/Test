<?php
//SQL查询命令
$sql="select * from users";
//执行查询命令
$result=mysqli_query($link,$sql);
//定义每页显示的记录数
$pagesize=3;
$totalNum = mysqli_num_rows($result);  //总记录数
$pagecount = ceil($totalNum/$pagesize); //总页数
(!isset($_GET['page']))?($page = 1):$page = $_GET['page']; //当前显示页
//当前页数大于总页数，把当前页定义为总页数
($page <= $pagecount)?$page:($page = $pagecount);
//当前页的第一条记录
$f_pageNum = $pagesize * ($page-1);

//通过limit控制查询数量
$sqlstr1 = $sql." limit ".$f_pageNum.",".$pagesize;

$result = mysqli_query($link,$sqlstr1) or die("");
if ($totalNum > 0) {
    echo '<h1><center>查看用户</center></h1>';
    echo '<table class="layui-table">';
    echo <<<TR
<tr>
<th>序号</th><th>用户名</th><th>邮箱</th><th>地址</th><th>注册日期</th><th>操作</th><th>删除</th>
</tr>

TR;
    while ($row = mysqli_fetch_row($result)) {
        echo '<tr>';


        echo '<td>' . $row[0] . '</td>';
        echo '<td>' . $row[1] . '</td>';
        echo '<td>' . $row[3] . '</td>';
        echo '<td>' . $row[4] . '</td>';
        echo '<td>' . $row[5] . '</td>';
        echo"<td><a href='u_form.php?id=$row[0]'>修改</a></td>";
        echo"<td><a href='del.php?id=$row[0]'>删除</a></td>";
        echo '</tr>';
    }
}
else {
    echo '<p class="error">当前还没有用户信息。</p>';
}
echo '<tr style="text-align: center"><td colspan=8 ><span class=ct>';
echo"共".$totalNum."条记录&nbsp;&nbsp;&nbsp;&nbsp;";
echo"第".$page."页/共".$pagecount."页&nbsp;&nbsp;&nbsp;&nbsp;";
if($page!=1){  //如果当前页不是第1页,则输出有链接的首页与上一页
    echo "<a href='?page=1'>首页</a>&nbsp;";
    echo "<a href= '?page=".($page-1)."'>上一页</a>&nbsp;&nbsp;";
}else{//否则输出无链接的首页、上一页
    echo"首页&nbsp;上一页&nbsp;&nbsp;";
}
if($page!=$pagecount){//如果当前页不是最后一页，则输出有链接的下一页和尾页
    echo "<a href='?page=".($page+1)."'>下一页</a>&nbsp;";
    echo "<a href='?page=".$pagecount."'>尾页</a>&nbsp;";
}else{//否则输出无链接的下一页、尾页
    echo "下一页&nbsp;尾页&nbsp;&nbsp;";
}
echo'</tr></table>';
include_once 'view.php';
mysqli_free_result($result);
mysqli_close($link);