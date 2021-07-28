<?php
						function Genere_Password($size)
				{
					// Initialisation des caractères utilisables
					$characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
				
					for($i=0;$i<$size;$i++)
					{
						$password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
					}
						
					return $password;
				}
if(isset($_POST['email']) && ($_POST['username']))
	{
		$connect = connection($DBRealmd);
		$statutR = mysql_query('SELECT * FROM account WHERE email = "'.$_POST['email'].'" AND username="'.$_POST['username'].'"');				
			while($statutT = mysql_fetch_array($statutR))
				{
					$username=$statutT['username'];
					$id_compte=$statutT['id'];
				}
				if($_POST['username']!= $statutT['username'] || $_POST['email']!= $statutT['email'] )
				{
					echo "Le compte n'a pas &eacute;t&eacute; trouv&eacute;.";
				}
				else
				{
		mysql_close($connect);
		echo "Le compte ".$username	." &agrave; etait retrouv&eacute; <br />Un mail est envoy&eacute; sur ".$_POST['email']." pour v&eacute;rifier qu'il que vous &ecirc;tes bien le propri&eacute;taire du compte.<br />Un nouveau mot de passe vous est envoy&eacute; par email. Pour l'activer veuillez cliquer sur le lien.<br /><br />";
				
				// Petit exemple
				
				$mon_mot_de_passe = Genere_Password(6);
				
						$connect = connection($DBSite);
			mysql_query("DELETE FROM elios_recuperation_motdepasse WHERE id_compte ='".$id_compte."'");
			mysql_query("INSERT INTO ".$prefixtable."recuperation_motdepasse
			VALUES('".$id_compte."','".sha1(strtoupper($username).':'.strtoupper($mon_mot_de_passe	))."',
			'".date('Y-m-d H:i:s')."')") or die(mysql_error());
			mysql_close($connect);




		open_url('91.121.221.204', '/elios/recuperation_password.php?destinataire='.$_POST['email'].'&pseudo='.$pseudo.'&id='.$id_compte.'&pass='.$mon_mot_de_passe.'&verif='.sha1(strtoupper($username).':'.strtoupper($mon_mot_de_passe	)));								
	

}
		
	}
else
	{
?>
	Entrer l'adresse email du compte F&eacute;riale.
	<form action="index.php?id_page=74" method="post" />
    	<input type="text" name="email" id="email"  /><br />Entrer le nom de compte du F&eacute;riale.<br />
        <input type="text" name="username" id="username"  />
        <input type="submit" value="Valider" />
    </form>
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