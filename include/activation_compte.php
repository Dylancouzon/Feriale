<?php
	$verif=$_GET['verif'];
	$pseudo=$_GET['activation'];
	$connect = connection($DBSite);
			$activation=mysql_query("SELECT * FROM ".$prefixtable."compte_activation WHERE username ='".$pseudo."' AND password = '".$verif."'");
			
			$active = mysql_fetch_array($activation);
			$password = $active['password'];
			if (($password == ""))
			{
			echo "le compte est d&eacute;j&agrave; actif";
			}
			else
			{
			mysql_query("DELETE FROM ".$prefixtable."compte_activation WHERE username ='".$pseudo."'");
			mysql_close($connect);
			
	$connect = connection($DBRealmd);
			mysql_query("UPDATE account SET sha_pass_hash = '".$password."' WHERE username = '".$pseudo."'");
			mysql_query("DELETE FROM ".$prefixtable."compte_activation WHERE username ='".$pseudo."'");
			mysql_close($connect);
			
			echo "le compte <strong>".$pseudo."</strong>est d&eacute;sormais actif.";
			}
?>