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

$url = 'www.rpg-paradize.com';
$page = '/?page=vote&vote=6570';

$temp = open_url($url,$page);

/*$temp = explode('<script',$temp);

$temp_final='';
for($i=0;$i<sizeof($temp);$i++){
	$t = explode('</script>',$temp[$i]);
	if(sizeof($t)>1){
		$temp_final .= $t[1];
	}else{
		$temp_final .= $t[0];
	}
}*/

$temp = explode('top.location = self.location.href',$temp);

$temp_final='';
for($i=0;$i<sizeof($temp);$i++){
	$temp_final .= $temp[$i];
}


$temp_final = explode('action="',$temp_final);

$temp_final_action = $temp_final[0];
for($i=1;$i<sizeof($temp_final);$i++){
	$t = explode('"',$temp_final[$i],2);
	if(sizeof($t)>1){
		$temp_final_action .= 'action="http://'.$url.'/'.$t[0].'"'.$t[1];
	}else{
		$temp_final_action .= $t[0];
	}
}


$temp_final_action = explode('src="',$temp_final_action);

$temp_final_source = $temp_final_action[0];
for($i=1;$i<sizeof($temp_final_action);$i++){
	$t = explode('"',$temp_final_action[$i],2);
	if(sizeof($t)>1){
		if(substr($t[0],0,9)=='./captcha'){
			$temp_final_source .= 'src="include/vote_image.php?url='.$url.'&page='.str_replace('.','',$t[0]).'"'.$t[1];
		}else{
			$temp_final_source .= 'src="http://'.$url.'/'.$t[0].'"'.$t[1];
		}
	}else{
		$temp_final_source .= $t[0];
	}
}

$temp_final_action = explode('href="',$temp_final_source);

$final = $temp_final_action[0];
for($i=1;$i<sizeof($temp_final_action);$i++){
	$t = explode('"',$temp_final_action[$i],2);
	if(sizeof($t)>1){
		$final .= 'href="http://'.$url.'/'.$t[0].'"'.$t[1];
	}else{
		$final .= $t[0];
	}
}


echo $final;

?>