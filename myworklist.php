<?php
// 连接数据库  
$conn=@mysql_connect("localhost","jorbey","JORBEY@163.com")  or die(mysql_error());  
@mysql_select_db('jorbey',$conn) or die(mysql_error());  
?>
<!在网页上显示数据表>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>MyWorkList</title>
 </head>
  
 <body>
  
 <?php
    $sqlstr = "select * from mywork order by mywork_num";
    $query = mysql_query($sqlstr) or die(mysql_error());
    $result = array();
    while($thread=mysql_fetch_assoc($query)){
        $result[] = $thread;
    }
  
    if($result){
        echo '<table>';
        echo '<th>NO.</th><th>序列号SN</th><th>激活日期</th><th>程序版本</th><th>IP地址</th><th>备注</th>';
        foreach($result as $row){
            echo '<tr>';
            echo '<td>'.$row['mywork_num'].'</td>';
            echo '<td>'.$row['mywork_sn'].'</td>';
            echo '<td>'.$row['mywork_data'].'</td>';
            echo '<td>'.$row['mywork_version'].'</td>';
            echo '<td>'.$row['mywork_ip'].'</td>';
			echo '<td>'.$row['mywork_remark'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
  
 ?>
    
 </body>
</html>
