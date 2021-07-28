<?php

if(isset($_POST['compte'])){

	require_once '../class/joueur.php';


	$joueur = new joueur($_POST['compte'],$_POST['password']);
	if(!$joueur->error){
		$joueur->set_ip($_SERVER["REMOTE_ADDR"]);
		
		session_start();
		$_SESSION['joueur'] = serialize($joueur);
	}
	header('location:../index.php');
}



?>