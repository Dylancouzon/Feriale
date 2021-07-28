<?php
if(isset($_SESSION['joueur'])&&isset($_POST['nbrchap'])&&is_numeric($_POST['nbrchap'])&&isset($_POST['royaume_choisi'])&&is_numeric($_POST['royaume_choisi'])){
$connect = connection(false,$sql_royaume,$_POST['royaume_choisi']);
$reponse = mysql_query('select * from characters where guid='.$_POST['personnage_choisi']) or die(mysql_error());

if ($_POST['nbrchap'] == NULL OR $_POST['nbrchap']<1){
	echo "ERREUR";	
}
else
		{
		if (($_POST['royaume_choisi']!= $idpvp)&&($_POST['royaume_choisi']!= $idfun)&&($_POST['royaume_choisi']!= $idblizz)&&($_POST['royaume_choisi']!= $idtwink60)&&($_POST['royaume_choisi']!= $idvachex))
		{
			echo "";
		}
		else{
		
			if ($_POST['acceptation'] != "OK" & $_POST['acceptation'] != "ok" & $_POST['acceptation'] != "oK" & $_POST['acceptation'] != "Ok")
			{
			 echo "vous n'avez pas tap&eacute; OK";
			}
			else{
				$connect = connection(false,$sql_royaume,$_POST['royaume_choisi']);

				$reponse = mysql_query('select * from characters where guid='.$_POST['personnage_choisi']) or die(mysql_error());
				if(mysql_num_rows($reponse)==1){
					$traite = mysql_fetch_array($reponse);
					$account = $traite['account'];
					if($account==$joueur->id){	
						$pointNecessaire = $_POST['nbrchap']*10;	
						if ( $pointNecessaire <0)
						{
						}
						else{
				$connect = connection($DBSite);
						$statutR = mysql_query("SELECT * FROM ".$prefixtable ."profil WHERE id_compte = ".$joueur->id);
						while($statutT = mysql_fetch_array($statutR))
						{
						if($traite['online']==1){
							echo "Votre personnage doit etre d&eacute;connect&eacute;."	;
							}
						else{
							if($statutT['pointdevote'] < $pointNecessaire ){
								echo "Vous ne disposez pas d'assez de point de vote.<br /><a href='index.php'>retour</a>";
							}
							else
							{
				$oldpoints = $statutT['pointdevote'];
				$restepoint = $statutT['pointdevote']-$pointNecessaire;
					echo "<div style='text-align:center'>L'envoi de ".$_POST['nbrchap']." Sceaux de champion est prit en compte.<br /><br /> Il vous reste <strong>".$restepoint."</strong> points.<br /><br /><font color='red'><h3>Les sceaux de champion sont dans l'onglet monnaies de votre personnage</h3> </font>
					
					<div style='text-align:center'><br /><br /><strong><a href='index.php?index.php?age=boutique' onmouseover=\"this.style.color='#FFCC00';\" onmouseout=\"this.style.color='#000000';\">RETOUR A LA BOUTIQUE</a></strong><br /><br /><br /><strong><a href='index.php' onmouseover=\"this.style.color='#FFCC00';\" onmouseout=\"this.style.color='#000000';\">RETOUR AU SITE</a></strong></div>";
					$now = date("\L\e d/m/Y \à H:i"); 					
				$nombre=$_POST['nbrchap'];
				$itemid = rand(1, 600000);
				$iditem = 44990;
				$character = $_POST['personnage_choisi'];
				
					$connect = connection(false,$sql_royaume,$_POST['royaume_choisi']);
				
					$actuel = mysql_fetch_row(mysql_query("SELECT CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 15), ' ', -1) AS UNSIGNED) AS `sceaux` FROM `item_instance` WHERE `owner_guid` = ".$_POST['personnage_choisi']." AND CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 4), ' ', -1) AS UNSIGNED) = $iditem"));
					if($actuel[0] == false){
					mysql_query("REPLACE INTO item_instance (guid,owner_guid,data) VALUES ('".$itemid."','".$character."','".$itemid." 1073741936 3 ".$iditem." 1065353216 0 ".$character." 0 ".$character." 0 0 0 0 0 ".$nombre." 0 4294967295 0 0 0 0 65 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0')");
					mysql_query("REPLACE INTO character_inventory (guid, bag, slot, item, item_template) VALUES ('".$character."', '0', '149', '".$itemid."', '".$iditem."')");
					$old = 0;
					}else{
					$old = $actuel[0];
					$add = $nombre + $actuel[0];
					mysql_query("DELETE FROM `item_instance` WHERE `owner_guid` =".$_POST['personnage_choisi']." AND CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 4), ' ', -1) AS UNSIGNED) = $iditem ");
					mysql_query("REPLACE INTO item_instance (guid,owner_guid,data) VALUES ('".$itemid."','".$character."','".$itemid." 1073741936 3 ".$iditem." 1065353216 0 ".$character." 0 ".$character." 0 0 0 0 0 ".$add." 0 4294967295 0 0 0 0 65 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0')");
					mysql_query("REPLACE INTO character_inventory (guid, bag, slot, item, item_template) VALUES ('".$character."', '0', '149', '".$itemid."', '".$iditem."')");

					}
					$after = mysql_fetch_row(mysql_query("SELECT CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 15), ' ', -1) AS UNSIGNED) AS `sceaux` FROM `item_instance` WHERE `owner_guid` = ".$_POST['personnage_choisi']." AND CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 4), ' ', -1) AS UNSIGNED) = $iditem"));
					$newchap = $after[0];
					$connect = connection($DBSite);
					mysql_query("UPDATE elios_profil SET pointdevote = ".$restepoint." WHERE id_compte = ".$joueur->id);
					$statutR2 = mysql_fetch_array(mysql_query("SELECT * FROM ".$prefixtable ."profil WHERE id_compte = ".$joueur->id));
					$restepoint2 = $statutR2['pointdevote'];
					mysql_query("INSERT INTO transactions VALUES('', ".$joueur->id.", ".$_POST['personnage_choisi'].", 'Sceau', ".$_POST['royaume_choisi'].", ".$_POST['nbrchap'].",".$old.",".$newchap.", ".$oldpoints.",".$restepoint2.",'".$ip."', '".$now."')")or die(mysql_error());					

							}
							}
						}
						}
					}else{
						echo 'Ce personnage ne vous appartient pas';
					}
				}else{
					echo 'Aucun personnage sur le serveur';
				}
			}
		}
		}
}
else{

}
?>