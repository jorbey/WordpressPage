<?php
header("Content-type: text/html; charset=UTF8");

$ip = $_SERVER["REMOTE_ADDR"];
echo "当前访问者IP: ";
echo $ip;

$data = file_get_contents('myworkpostdata.txt'); // 要发送的文件
//$data=http_build_query($data);

$opts = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'content-type:application/x-www-form-urlencoded',
        'content' => $data
    )
);

$context = stream_context_create($opts);

$url = 'http://www.chenxxi.com/mywork.php'; // 接收的url
 
$result=file_get_contents($url, false, $context);
echo $result;
?>