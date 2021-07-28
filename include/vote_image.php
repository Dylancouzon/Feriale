<?php

function open_url($url,$page)
{
	$host = 'test';
    $port = 80;
    $cont = '';

    $fp = fsockopen($url, $port);
    if (!$fp)    {return false;}
    fputs($fp, "GET $page HTTP/1.1\r\nHost: $url\r\n\r\n");
    while(!feof($fp)) {$cont .= fread($fp,4096);}
    fclose($fp);
    $cont = substr($cont, strpos($cont,"\r\n\r\n")+4);
    return $cont;
}

$url = $_GET['url'];
$page = $_GET['page'];

$temp = open_url($url,$page);
header('Content-type: image/PNG');
echo $temp;

?>