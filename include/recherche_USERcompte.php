<?php
	if ($_GET['user_compte_rechercher'] == NULL)
		{
		echo "id du compte nom trouvé contact Elios" ;
		}
	else{
			$connect = connection($DBRealmd);
						$Rcompte = mysql_query("SELECT * FROM account WHERE username = ".$_GET['user_compte_rechercher']) or die(mysql_error());
					mysql_close($connect);
					while($Tcompte = mysql_fetch_array($Rcompte))
					{
					echo "Nom de Compte ".$Tcompte['username']."<br />";
					echo "compte N° ".$Tcompte['id']."<br />";
					echo "email ".$Tcompte['email']."<br />";
					echo "date inscription ".$Tcompte['joindate']."<br /><br />";
					echo "derniere_IP ".$Tcompte['last_ip']."<br />";
					echo "derniere connexion ".$Tcompte['last_login']."<br />";
					}
					echo "<br />";
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."code_entrer WHERE id_compte = ".$Tcompte['id']);
        $row3 = mysql_fetch_array($req3);
        $CodeT = $row3['nombreT']; 				
					echo "Nombre de paiement : ".$CodeT."<br />";					
		 $moisactuel = date("Y-m");
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."code_entrer WHERE id_compte = ".$Tcompte['id']." AND date LIKE '".$moisactuel."%'");
        $row3 = mysql_fetch_array($req3);
        $CodeM = $row3['nombreT']; 					
					echo "Nombre de paiement de ce mois : ".$CodeM."<br />";
					echo "<br />";
					
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."stockageVOTE WHERE id_compte = ".$Tcompte['id']);
        $row3 = mysql_fetch_array($req3);
        $CodeT = $row3['nombreT']; 				
					echo "Nombre de vote : ".$CodeT."<br />";					
		 $moisactuel = date("Y-m");
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."stockageVOTE WHERE id_compte = ".$Tcompte['id']." AND date LIKE '".$moisactuel."%'");
        $row3 = mysql_fetch_array($req3);
        $CodeM = $row3['nombreT']; 					
					echo "Nombre de vote de ce mois : ".$CodeM."<br />";
					echo "<br />";
mysql_close($connect);
		}
?>
