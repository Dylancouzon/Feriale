<?php
	if ($_GET['ip_rechercher'] == NULL)
		{
		echo "IP non trouvé contact Elios" ;
		}
	else{
			$connect = connection($DBRealmd);
						$Rcompte = mysql_query("SELECT * FROM account WHERE last_ip = '".$_GET['ip_rechercher']."'") or die(mysql_error());
					mysql_close($connect);
					//echo "IP recherché : ".$_GET['ip_rechercher']."<br />";
					while($Tcompte = mysql_fetch_array($Rcompte))
					{
					echo "Nom de compte ayant eu cette IP &agrave; leur derniere connexion : <br />";
					echo " - ".$Tcompte['username'];
					}
}
?>