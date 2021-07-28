<?php
$fichier_ip = fopen('compteur/ip.txt', 'a+');
$ip = $_SERVER['REMOTE_ADDR'];
$ip_libre = true;
while($ip_existante = fgets($fichier_ip))
{
	if(($ip.PHP_EOL) == $ip_existante)
	{
		$ip_libre = false;
	}
}

$fichier = fopen('compteur/compteur.txt', 'r+');
 
$visiteur = fgets($fichier);

if($ip_libre)
{
	$visiteur++;
	fputs($fichier_ip, $ip);
	fputs($fichier_ip, PHP_EOL);
	fseek($fichier, 0);
	fputs($fichier, $visiteur);
}
 
fclose($fichier);
fclose($fichier_ip);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Presentation de Feriale</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta http-equiv="refresh" content="10;url=http://www.feriale.fr/index.php">
        <script language="JavaScript">
        <!--
        	setTimeout("http://www.feriale.fr/index.php", 4000);
        -->
        </script>
        <style type="text/css">
        body
        {
			color: #FFF;
        }
		
	p
	{
		text-align: center;
	}
        </style>
    </head>
    <body style="background-color: #000;">
    	<p><img src="image-portail/banniere.jpg" title="Bannière" /></p>
        <p>
        	Vous êtes le <?php echo $visiteur; ?>ème visiteur...<br />
			Vous allez être redirigé automatiquement. Si vous ne voulez pas attendre, <a href="http://www.feriale.fr/index.php" title="Accueil - Feriale">cliquez ici</a>.
		</p>
        <p><img src="image-portail/background.jpg" title="Fond" /></p>
    </body>
</html>
