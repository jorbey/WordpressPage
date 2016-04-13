<?php
//设置当前时区
date_default_timezone_set('prc');
// 连接数据库  
$conn=@mysql_connect("localhost","jorbey","JORBEY@163.com")  or die(mysql_error());  
@mysql_select_db('jorbey',$conn) or die(mysql_error());  
//接收POST报文，并写入数据库jorbey的mywork报表中
$ip = $_SERVER["REMOTE_ADDR"];//获取post报文IP；
$timenow=time();//获取post报文时间；
$tmpfile = 'tmp.txt'; // 临时文件，用于保存接收到的文件流

$content = $GLOBALS['HTTP_RAW_POST_DATA'];
if(empty($content)){  
    $content = file_get_contents('php://input');
}

file_put_contents($tmpfile, $content, true);  

$file = file_get_contents($tmpfile);
$data = explode(chr(10), $file); // 分解成数组 10为换行字符ascii值
$mywork_sn = mysql_escape_string($data[0]);
$mywork_version = mysql_escape_string($data[1]);
$mywork_remark = mysql_escape_string($data[2]);
$mywork_data = date("y-m-d H:i:s",$timenow);
$mywork_ip = $ip;


$sqlstr = "insert into mywork(mywork_sn,mywork_data,mywork_version,mywork_remark,mywork_ip) values('".$mywork_sn."','".$mywork_data."','".$mywork_version."','".$mywork_remark."','".$mywork_ip."')";
    mysql_query($sqlstr) or die(mysql_error());

header('location:list.php');
mysql_close($con)//
?>
