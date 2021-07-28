<?php
$connect = connection($DBRealmd);
			$RcompteA = mysql_query("SELECT * FROM account WHERE id = ".$joueur->id) or die(mysql_error());
					mysql_close($connect);
					while($TcompteA = mysql_fetch_array($RcompteA))
					{
						$connect = connection($DBSite);
						$moisactuel = date("Y-m");
						$renta = mysql_query("SELECT * FROM regulation_paiements WHERE uid = ".$joueur->id) or die(mysql_error());
						mysql_close($connect);
						while($Trenta = mysql_fetch_array($renta))
						{
						$coderenta = $Trenta['paiements'];
						}
						
						
						echo "<strong>Nom de Compte </strong>".$TcompteA['username']."<br />";
						echo "<strong>Compte N&deg; </strong>".$TcompteA['id']."<br />";
						echo "<strong>Email </strong>".$TcompteA['email']."<br />";
						echo "<strong>Date d'inscription </strong>".$TcompteA['joindate']."<br /><br />";
						echo "<strong>Derniere IP </strong>".$TcompteA['last_ip']."<br />";
						echo "<strong>Derniere connexion </strong>".$TcompteA['last_login']."<br /><br />";
						echo "<strong>Nombre de code rentabiliweb de ce mois : </strong>".$coderenta." / 30<br />";		
						$idrecherche = $TcompteA['id'];
					}
					echo "<br /><br />";
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."code_entrer WHERE id_compte = ".$idrecherche);
        $row3 = mysql_fetch_array($req3);			
		$moisactuel = date("Y-m");
					
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT * FROM ".$prefixtable."profil WHERE id_compte = ".$idrecherche);
        $row3 = mysql_fetch_array($req3);
        $CodeT = $row3['pointdevote']; 				
					echo "<strong>Points de vote : </strong>".$row3['pointdevote']."<br />";					
		 $moisactuel = date("Y-m");
		$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombreT FROM ".$prefixtable."stockageVOTE WHERE id_compte = ".$idrecherche." AND date LIKE '".$moisactuel."%'");
        $row3 = mysql_fetch_array($req3);
        $CodeM = $row3['nombreT']; 					
					echo "<strong>Nombre de vote de ce mois : </strong>".$CodeM."<br />";
					echo "<br /><br /><a href='index.php?id_page=50' style='color:orange'><strong>Modifier le mot de passe</strong></a>";
mysql_close($connect);
		
?>
