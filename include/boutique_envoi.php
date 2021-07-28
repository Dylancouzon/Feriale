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
							$restepoint = $statutT['pointdevote']-$pointNecessaire;
								echo "<div style='text-align:center'>L'envoi de ".$_POST['nbrchap']." chapeluisants est pris en compte.<br /><br /> Il vous reste <strong>".$restepoint."</strong> points. <br /><br />
								<div style='text-align:center'><br /><br /><strong><a href='index.php?index.php?id_page=12' onmouseover=\"this.style.color='#FFCC00';\" onmouseout=\"this.style.color='#000000';\">RETOUR A LA BOUTIQUE</a></strong><br /><br /><br /><strong><a href='index.php' onmouseover=\"this.style.color='#FFCC00';\" onmouseout=\"this.style.color='#000000';\">RETOUR AU SITE</a></strong></div>";
								
								$sR = mysql_query("UPDATE elios_profil SET pointdevote = ".$restepoint." WHERE id_compte = ".$joueur->id); 	
								mysql_query("INSERT INTO elios_historique_chap VALUES (".$joueur->id.", 'chapeluisant',".$_POST['nbrchap'].",".$_POST['royaume_choisi'].",".$_POST['personnage_choisi'].",'".$_SERVER["REMOTE_ADDR"]."', '".date('Y-m-d H:i:s')."','')");					
							$nombre=$_POST['nbrchap'];
							$itemid = rand(1, 600000);
							$iditem = 24245;
							$character = $_POST['personnage_choisi'];
							
								$connect = connection(false,$sql_royaume,$_POST['royaume_choisi']);
						
								mysql_query("REPLACE INTO item_instance (guid,owner_guid,data) VALUES ('".$itemid."','".$character."','".$itemid." 1073741936 3 ".$iditem." 1065353216 0 ".$character." 0 ".$character." 0 0 0 0 0 ".$nombre." 0 4294967295 0 0 0 0 65 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0')");
								
								$req_mid = mysql_query('SELECT MAX(id) FROM mail');
								$res_mid = mysql_fetch_row($req_mid);
								$mid = $res_mid[0] + 1;
															$expire_time = time() + (30 * DAY);
								$time = time();
									mysql_query("INSERT INTO mail_items (mail_id,item_guid,item_template,receiver) VALUES ('".$mid."','".$itemid."','".$iditem."','".$character."')") or die(mysql_error());
								
									mysql_query("INSERT INTO mail (id,messageType,stationery,mailTemplateId,sender,receiver,subject,body,has_items,expire_time,deliver_time,money,cod,checked) VALUES('".$mid."','0','61','0','".$character."','".$character."','Félicitation: Objet acheté Avec Succès','Félicitation pour votre achat !','1','".$expire_time."','".$time."','0','0','0')") or die(mysql_error());
									
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