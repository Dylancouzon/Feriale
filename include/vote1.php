<?php
require_once ("../config/configuration.php");
require_once ("../class/joueur.php");
$idtopvote = $_GET['vote'];
session_start();
if($idtopvote == '1' | $idtopvote =='2'| $idtopvote == '3')
{
if(isset($_SESSION['joueur'])&&isset($_GET['vote'])&&is_numeric($_GET['vote'])){

	$joueur = unserialize($_SESSION['joueur']);
	if($joueur->connecter){
		if(time() > $joueur->vote[$_GET['vote']] + 7200){
			$connect = connection('elios_site');
			mysql_query('INSERT INTO elios_stockageVOTE VALUES('.$joueur->id.','.$_GET['vote'].',now(),"'.$joueur->ip.'")') or die(mysql_error());
			$reponse = mysql_query('SELECT now() as date FROM DUAL');
			$traite = mysql_fetch_array($reponse);
			$joueur->vote[$_GET['vote']] = $joueur->convert_date($traite['date']);
			
			
			$connect = connection($DBSite);	
				$statutR = mysql_query("SELECT * FROM elios_profil WHERE id = ".$joueur->id);
				while($statutT = mysql_fetch_array($statutR))
				{
					$valeurpoint="2";
					$pointdevote = $statutT['pointdevote'];
				}
				$nouvopoint= $pointdevote+$valeurpoint;
				
			
			
			mysql_query("UPDATE elios_profil SET pointdevote = pointdevote + ".$valeurpointdevote." WHERE id_compte = ".$joueur->id);
			
			
			
			$_SESSION['joueur'] = serialize($joueur);
		}
	}
}
}
else
{
echo " tentative de cheat ";
}
?>