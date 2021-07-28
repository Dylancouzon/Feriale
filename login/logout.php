<?php
	require_once ("../config/configuration.php");
	require_once ("../class/joueur.php");

	session_start();
	if(isset($_SESSION['joueur'])){
		$joueur = new joueur();
		$_SESSION['joueur'] = unserialize($joueur);
	}
	header('location:/index.php');
?>