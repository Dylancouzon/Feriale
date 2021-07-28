<?php

	$id_compte=$_GET['id_compte'];
	$pass=$_GET['verif'];
	$connect = connection($DBSite);
				$activation=mysql_query("SELECT * FROM elios_recuperation_motdepasse WHERE id_compte ='".$id_compte."' AND nouveau_mot_de_passe= '".$pass."'");		
				$active = mysql_fetch_array($activation);
				$nouveau_mot_de_passe = $active['nouveau_mot_de_passe'];
				if (($nouveau_mot_de_passe == ""))
				{
				echo "ERREUR veuillez recommencer";
				}
				else
				{
//				mysql_query("DELETE FROM ".$prefixtable."stockage_modif_pass WHERE username ='".$pseudo."'");
				mysql_close($connect);
				
	$connect = connection($DBRealmd);
				mysql_query("UPDATE account SET sha_pass_hash = '".$pass."' WHERE id = '".$id_compte."'");
				mysql_query("UPDATE account SET s = '' WHERE id = '".$id_compte."'");
				mysql_query("UPDATE account SET v = '' WHERE id = '".$id_compte."'");
				mysql_query("UPDATE account SET sessionkey = '' WHERE id = '".$id_compte."'");
				mysql_close($connect);
	$connect = connection($DBSite);
				mysql_query("DELETE FROM elios_recuperation_motdepasse WHERE id_compte ='".$id_compte."'");
				mysql_close($connect);
				
				echo "la modification du mot de passe du compte est prise en compte.";
				}
                
                
                
                ?>