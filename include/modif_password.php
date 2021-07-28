<?php
	$mdp_actu=$_POST['mdp_actu'];
	$mdp_new1=$_POST['mdp_new1'];
	$mdp_new2=$_POST['mdp_new2'];
	if ($mdp_actu!=NULL & $mdp_new1!=NULL & $mdp_new2!=NULL)
	
	{
		
	$connect = connection($DBRealmd);
							$reponse = mysql_query("SELECT * FROM account WHERE id = ".$joueur->id);
							$accountR = mysql_query("SELECT * FROM elios_profil WHERE id_compte = ".$newsT['auteur']."");
                            mysql_close($connect);
            while($accountT = mysql_fetch_array($reponse))
                {$nomdecompte = $accountT['username'];}
		if ($mdp_new1!=$mdp_new2)
		{
		echo "le mot de passe de confirmation est different du nouveau mot de passe";
		}
		else{
		
		$connect = connection($DBRealmd);
		$reponse = mysql_query("SELECT * FROM account WHERE id = ".$joueur->id);
		$accountT = mysql_fetch_array($reponse);
		$email = $accountT['email'];
		$pseudo = $accountT['username'];
		echo "le mot de passe ser&acirc;t modifi&eacute; une fois le lien sur le mail activ&eacute; cliquez. Envoy&eacute; sur ".$email;
		$connect = connection($DBSite);
		mysql_query("DELETE FROM elios_stockage_modif_pass WHERE username ='".$pseudo."'");
			mysql_query("INSERT INTO ".$prefixtable."stockage_modif_pass 
			VALUES('','".$nomdecompte."','".sha1(strtoupper($pseudo).':'.strtoupper($mdp_new1))."',
			'".date('Y-m-d H:i:s')."')")
			 or die(mysql_error());
			open_url('91.121.221.204', '/elios/password.php?destinataire='.$email.'&pseudo='.$nomdecompte);
			}
	}
	else
{
?>

<form method="post" action='?id_page=50'>
<table>
	<tr>
    	<td>
        	Mot de passe actuel : 
        </td>
        <td>
        	<input name='mdp_actu' type='password'/>
        </td>
   </tr>
   
	<tr>
    	<td>
        	Nouveau mot de passe : 
        </td>
        <td>
        	<input name='mdp_new1' type='password'/>
        </td>
   </tr>
   
	<tr>
    	<td>
        	Retaper le mot de passe : 
        </td>
        <td>
        	<input name='mdp_new2' type='password' />
        </td>
   </tr>
   <tr>
   		<td colspan='2'>
        	<input type="submit" value="modifier" />
        </td>
</table>

<?php
}
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
    //$cont = substr($cont, strpos($cont,"\r\n\r\n")+4);
    return $cont;
}
?>