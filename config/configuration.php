<?php
	$CheminSite = '/../';	// chemin par rapport au dossier source du serveur
	$prefixtable = 'elios_';
	$realmlist ='login.feriale.fr';
	$urlindex = 'index.php';
	$urlforum ='http://forum.feriale.net/index.php';
	$urlsite = 'http://188.165.210.191';
	
	///////////////////////////
	//	   	  Lien DB        //
	///////////////////////////
	$DBSite = 'elios_site';
	$DBRealmd = 'realmd2';
	
	//////////////////////////////////////////////////////////
	//	   	              Lien DB                           //
	//                                                      //
	//   IDRoyeCharTypNomX = X odre d'affichage            	//
	//	1 Blizz												//
	//	2 PVP												//
	//	3 FUN												//
	//	4 RP												//
	//	5 TWINK												//
	//	6 MJ                                                //
	//////////////////////////////////////////////////////////
	
	
	$URLLogin ='127.0.0.1';
	$PortLogin ='3724';
	$IDRoyeCharTypNom1 ='39, charpvp, 2, PvP BoeufLand, ';	
	$IDRoyeCharTypNom2 ='38, charfun, 3, Fun 3.3.2, ';
	$IDRoyeCharTypNom3 ='37, charblizz, 1, le royaume du bisous, ';
	$IDRoyeCharTypNom4 ='41, charrp, 4, RP : Vachex 3.3.0, ';
	$IDRoyeCharTypNom5 ='9, charmjint, 5, Twink 19-39, ';
	$IDRoyeCharTypNom6 ='19, charmjint, 5, Twink 60, ';
	$IDRoyeCharTypNom7 ='5, charmjdeb, 6, MJ Débutant, ';
	$IDRoyeCharTypNom8 ='6, charmjint, 6, MJ Intérmédiaire, ';
	$IDRoyeCharTypNom9 ='10, charmjint, 6, MJ Confirmé, ';

			$explodeRoy[1] = explode(', ',$IDRoyeCharTypNom1);
			$explodeRoy[2] = explode(', ',$IDRoyeCharTypNom2);
			$explodeRoy[3] = explode(', ',$IDRoyeCharTypNom3);
			$explodeRoy[4] = explode(', ',$IDRoyeCharTypNom4);
			$explodeRoy[5] = explode(', ',$IDRoyeCharTypNom5);
			$explodeRoy[6] = explode(', ',$IDRoyeCharTypNom6);
			$explodeRoy[7] = explode(', ',$IDRoyeCharTypNom7);
			$explodeRoy[8] = explode(', ',$IDRoyeCharTypNom8);
			$explodeRoy[9] = explode(', ',$IDRoyeCharTypNom9);
			
			$nombrederoyaume=9;
		
	// adresse,login,mdp,affiche,type,nom
	$sql_royaume = array(
		
		39=>array("188.165.210.192","siterecpvp","CN6ve7gmQkKCgyIm","pvp-333-char",true,2,"Boeufland PVP", "icone_boeufland",0,),
		38=>array("188.165.210.193","siterecfun","cNLV1gXXh3mZHKrl","fun333-char",true,3,"Fun", "icone_fun",0,),
		37=>array("193.34.145.59","siterecblizz","74UJWwJy6kyrAy8n","blizz-333-char",true,1,"Blizzlike Valkyrie", "icone_blizzlike",0,),
		19=>array("193.104.56.37","siterectwink60","cMNlynamlHamnVZ5","t60-333-char",true,5,"Twink 60", "icone_twink60",0,),
	//	9=>array("94.23.217.148","site01","dNV6tA05xDmspFsq","characterstwink39",false,5,"Twink 19-39", "icone_boeufland"),
		59=>array("193.104.56.35","siterecrp","ZZD4WfrTwyDTTrYU","rp-333-char",true,4,"RP : Vachex", "icone_vachex",0,),
		5=>array("79.143.179.66","sitelectmj2","coCHe7CBJiCR3CHa","mjdeb-char",true,6,"MJ d&eacute;butant", "icone_mjdeb",0,),
		6=>array("193.104.56.36","sitelectmj1","2PWEh36xaD3WL80e","mjint-char",true,6,"MJ interm&eacute;diaire", "icone_mjint",300,),
		10=>array("193.104.56.36","sitelectmj1","2PWEh36xaD3WL80e","mjpro-char",true,6,"MJ pro", "icone_mjpro",400,),
		7=>array("79.143.179.66","sitelectmj2","coCHe7CBJiCR3CHa","mjconst-char",true,6,"MJ Construction", "icone_mjres",600,)
	);
	$idpvp = "39";
	$idfun = "38";
	$idblizz ="37";
	$idtwink60 ="19";
	$idvachex ="59";
	$idmjdeb ="5";
	$idmjint ="6";
	$idmjpro ="10";
	$idmjres ="7";
			
	$grade6 = "300";
	$grade10 = "400";
	$grade7 = "600";
			
	$newsaffiche ='002.JPG';
	define(db_adr,"localhost");
	define(db_user,"siteecriture");
	define(db_mdp,"5jVSO44xdyYeQaMx");
	define(db_site,$DBSite);
	define(db_realmd,$DBRealmd);	
	define(LIMIT_COMPTE_EMAIL,1);
	require_once (dirname(__FILE__).$CheminSite.'/fonction/sql.php');
	
	$domaine = array('yopmail.com','yopmail.fr','jetable.fr','jetable.com','jetable.org','jetable.net','yopmail.fr','yopmail.net','cool.fr.nf','jetable.fr.nf','nospam.ze.tc','nomail.xl.cx','mega.zik.dj','speed.1s.fr','courriel.fr.nf','moncourrier.fr.nf','monemail.fr.nf','monmail.fr.nf','123-m.com'.'nice-4u.com','youpymail.com','trashmail.net','ephemail.com','web.de','gawab.com','cashette.com','mail.ru','inbox.ru','bk.ru'.'yandex.ru','nightmail.ru'
	);
	$rang_support = 2;
	$lienmail="http://91.121.221.204/elios/";
	$valeurpointdevote="2";
?>