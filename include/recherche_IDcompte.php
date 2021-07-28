<?php
$connect = connection($DBRealmd);
	if ($_GET['id_compte_rechercher'] != NULL)
		{
			$RcompteA = mysql_query("SELECT * FROM account WHERE id = ".$_GET['id_compte_rechercher']) or die(mysql_error());
		}
	elseif ($_GET['user_compte_rechercher'] != NULL)
		{
			$RcompteA = mysql_query("SELECT * FROM account WHERE username = '".$_GET['user_compte_rechercher']."'") or die(mysql_error());
		}
		
		
					mysql_close($connect);
					while($TcompteA = mysql_fetch_array($RcompteA))
					{
					
					echo "Nom de Compte ".$TcompteA['username']."<br />";
					echo "compte N° ".$TcompteA['id']."<br />";
					echo "email ".$TcompteA['email']."<br />";
					echo "date inscription ".$TcompteA['joindate']."<br /><br />";
					echo "derniere_IP ".$TcompteA['last_ip']."<br />";
					echo "derniere connexion ".$TcompteA['last_login']."<br />";
					$idrecherche = $TcompteA['id'];
					}
					echo "<br />";
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."code_entrer WHERE id_compte = ".$idrecherche);
        $row3 = mysql_fetch_array($req3);
        $CodeT = $row3['nombreT']; 				
					echo "Nombre de paiement : ".$CodeT."<br />";					
		 $moisactuel = date("Y-m");
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."code_entrer WHERE id_compte = ".$idrecherche." AND date LIKE '".$moisactuel."%'");
        $row3 = mysql_fetch_array($req3);
        $CodeM = $row3['nombreT']; 					
					echo "Nombre de paiement de ce mois : ".$CodeM."<br />";
					echo "<br />";
					
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."stockageVOTE WHERE id_compte = ".$idrecherche);
        $row3 = mysql_fetch_array($req3);
        $CodeT = $row3['nombreT']; 				
					echo "Nombre de vote : ".$CodeT."<br />";					
		 $moisactuel = date("Y-m");
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."stockageVOTE WHERE id_compte = ".$idrecherche." AND date LIKE '".$moisactuel."%'");
        $row3 = mysql_fetch_array($req3);
        $CodeM = $row3['nombreT']; 					
					echo "Nombre de vote de ce mois : ".$CodeM."<br />";
					echo "<br />";
mysql_close($connect);
		
?>
