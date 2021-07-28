<?php
	require_once ("config/configuration.php");
	require_once ("class/joueur.php");
	session_start();
	
	if(isset($_POST['compte'])){
		$joueur = new joueur($_POST['compte'],$_POST['password']);
		if(!$joueur->error){
			$joueur->set_ip($_SERVER["REMOTE_ADDR"]);
			$_SESSION['joueur'] = serialize($joueur);
			$_SESSION['pseudo'] = $joueur->pseudo;
			$_SESSION['id'] = $joueur->id;
			$_SESSION['login'] = true;
		}
	}elseif(isset($_POST['logout'])){
		$joueur = new joueur();
		$_SESSION['joueur'] = serialize($joueur);
	}elseif(isset($_SESSION['joueur'])){
		$joueur = unserialize($_SESSION['joueur']);
	}else{
		$joueur = new joueur();
		$_SESSION['joueur'] = serialize($joueur);
	}if(isset($_GET['id_page'])&&is_numeric($_GET['id_page'])){
                $joueur->id_page = $_GET['id_page'];
        }
        
        if(isset($_GET['Npage'])&&is_numeric($_GET['Npage'])){
                $joueur->Npage = $_GET['Npage'];
        }
	
?>