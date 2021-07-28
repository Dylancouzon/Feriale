	<?php
	$pseudo=$_GET['password'];
	$connect = connection($DBSite);
				$activation=mysql_query("SELECT * FROM ".$prefixtable."stockage_modif_pass WHERE username ='".$pseudo."'");
				
				$active = mysql_fetch_array($activation);
				$password = $active['password'];
				if (($password == ""))
				{
				echo "ERREUR veuillez recommencer";
				}
				else
				{
//				mysql_query("DELETE FROM ".$prefixtable."stockage_modif_pass WHERE username ='".$pseudo."'");
				mysql_close($connect);
				
	$connect = connection($DBRealmd);
				mysql_query("UPDATE account SET sha_pass_hash = '".$password."' WHERE username = '".$pseudo."'");
				mysql_query("UPDATE account SET s = '' WHERE username = '".$pseudo."'");
				mysql_query("UPDATE account SET v = '' WHERE username = '".$pseudo."'");
				mysql_query("UPDATE account SET sessionkey = '' WHERE username = '".$pseudo."'");
				mysql_query("DELETE FROM elios_stockage_modif_pass WHERE username ='".$pseudo."'");
				mysql_close($connect);
				
				echo "la modification du mot de passe du compte <strong>".$pseudo."</strong> est prise en compte.";
				}
	?>