<?php
function get_ip(){ 
if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
elseif(isset($_SERVER['HTTP_CLIENT_IP'])){ 
$ip = $_SERVER['HTTP_CLIENT_IP'];} 
else{ $ip = $_SERVER['REMOTE_ADDR'];} 
return $ip;}$ip = get_ip();


if(isset($_SESSION['joueur'])&&isset($_POST['nbrchap'])&&is_numeric($_POST['nbrchap'])&&isset($_POST['royaume_choisi'])&&is_numeric($_POST['royaume_choisi'])){
$connect = connection(false,$sql_royaume,$_POST['royaume_choisi']);
$reponse = mysql_query('select * from characters where guid='.$_POST['personnage_choisi']) or die(mysql_error());

if ($_POST['nbrchap'] == NULL){
	echo "ERREUR";	
}

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
					echo "<div style='text-align:center'>L'envoi de ".$_POST['nbrchap']." chapeluisants est pris en compte.<br /><br /> Il vous reste <strong>".$restepoint."</strong> points. <br /><br />
					<div style='text-align:center'><br /><br /><strong><a href='index.php?index.php?id_page=12' onmouseover=\"this.style.color='#FFCC00';\" onmouseout=\"this.style.color='#000000';\">RETOUR A LA BOUTIQUE</a></strong><br /><br /><br /><strong><a href='index.php' onmouseover=\"this.style.color='#FFCC00';\" onmouseout=\"this.style.color='#000000';\">RETOUR AU SITE</a></strong></div>";
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
					$add = $nombre;
					}else{
					$old = $actuel[0];
					$add = $nombre + $actuel[0];
					mysql_query("UPDATE `item_instance` SET `data`=CONCAT(CAST(SUBSTRING_INDEX(`data`, ' ', 14) AS CHAR), ' ', ".$add.", ' ', CAST(SUBSTRING_INDEX(`data`, ' ', -50)AS CHAR)) WHERE `owner_guid` =".$_POST['personnage_choisi']." AND CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 4), ' ', -1) AS UNSIGNED) = $iditem");
					}
					$connect = connection($DBSite);
					mysql_query("INSERT INTO transactions VALUES('', ".$joueur->id.", ".$_POST['personnage_choisi'].", 'Sceau', ".$_POST['royaume_choisi'].", ".$_POST['nbrchap'].",".$old.",".$add.", ".$oldpoints.",".$restepoint.",'".$ip."', '".$now."')")or die(mysql_error());					
					mysql_query("UPDATE elios_profil SET pointdevote = ".$restepoint." WHERE id_compte = ".$joueur->id);
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
else{

}
?>