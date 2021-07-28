<?php
session_start();
include('config.php');

// PHP5 avec register_long_arrays désactivé?
if (!isset($HTTP_GET_VARS)) {
    $HTTP_SESSION_VARS    = $_SESSION;
    $HTTP_SERVER_VARS     = $_SERVER;
    $HTTP_GET_VARS        = $_GET;
}
$code = $HTTP_GET_VARS['code'];

if(isset($_POST['pseudo']) && !empty($_POST['pseudo']))
{
	$pseudo = htmlspecialchars(mysql_escape_string($_POST['pseudo']));

	$reponse = mysql_query("SELECT * FROM account WHERE username='".$pseudo."'");
	$donnees = mysql_fetch_array($reponse);

	$uid = $donnees['id'];
}
else
{
	$pseudo = $_SESSION['pseudo'];
	$uid = $_SESSION['id'];
}

if(trim($code) == "")
{
	header("Location: erreur.php");
	exit(1);
}

// Identifiants de votre document
$docId      = 89200;
$siteId      = 362983;

// Construction de la requête pour vérifier le code

$query      = 'http://payment.rentabiliweb.com/checkcode.php?';
$query     .= 'docId='.$docId;
$query     .= '&siteId='.$siteId;
$query     .= '&code='.$HTTP_GET_VARS['code'];
$query     .= "&REMOTE_ADDR=".$HTTP_SERVER_VARS['REMOTE_ADDR'];
$result     = @file($query);


if(trim($result[0]) !== "OK") {
    header('Location: erreur.php');
    exit();
}


// Accès à votre page protégée

$reponse = mysql_query("SELECT COUNT(*) AS nb_codes FROM `rentabiliweb` WHERE code='".$code."' AND uid > 0");
$donnees = mysql_fetch_array($reponse);
if($donnees['nb_codes'] > 0)
{
	header( "Location: erreur.php" );
	exit(1);
}
else
{
	mysql_query("INSERT INTO `rentabiliweb` VALUES('', '".$code."', '".$uid."', '".$_SERVER['REMOTE_ADDR']."', '".date('d/m/Y \à H\hi', time())."')");

	/*$reponse2 = mysql_query("SELECT * FROM `rentabiliweb` ORDER BY id");
	$donnees2 = mysql_fetch_array($reponse2);
	
	mysql_query("DELETE FROM rentabiliweb WHERE id='".$donnees2['id']."'");*/
}

if(!empty($pseudo))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Rentabiliweb - Feriale</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

				<style type="text/css">
		body
		{
		font-family:Verdana, Arial, Helvetica, sans-serif;
		background-image:url(../images/theme/defaut/fond/fond_top2.JPG);
		background-position:center;
		color:black;}	
		
		p
		{
			text-align: center;
		}

		a
		{
			text-decoration: underline;
			color: black;
		}

		a:hover
		{
			text-decoration: none;
		}

		h1
		{
			text-align: center;
		}

		h1 a
		{
			text-decoration: none;
			color: black;
		}

		h1 a:hover
		{
			text-decoration: underline;
		}
        </style>
        </script> 
	</head>

	<body>
<div style='width:1100px; margin:auto; align-center:center;'>


<span style='padding-left:340px'><a style='border:none' href='http://www.feriale.fr/index.php'> <img src='../images/theme/defaut/logo_feriale_onclick.PNG'  style='border:none'/></a>
		<?php
			$req_paiements = mysql_query("SELECT * FROM `regulation_paiements` WHERE `uid` = '".$_SESSION['id']."'");
			if(mysql_num_rows($req_paiements) == 0)
			{
				mysql_query("INSERT INTO `regulation_paiements` ( `uid`, `paiements`, `mois`, `total` ) VALUES ('".$_SESSION['id']."', '1', '".date('F', time())."', '1')");
			}
			else
			{
				$rep_paiements = mysql_fetch_array($req_paiements);
				if($rep_paiements['mois'] == date('F', time()))
				{
					mysql_query("UPDATE regulation_paiements SET paiements=paiements+1, total=total+1 WHERE uid = '".$_SESSION['id']."'");
				}
				else
				{
					mysql_query("UPDATE regulation_paiements SET paiements=1, total=total+1, mois='".date('F', time())."' WHERE uid = '".$_SESSION['id']."'");
				}
			}

			$rep_paiements = mysql_fetch_array(mysql_query("SELECT * FROM `regulation_paiements` WHERE `uid` = '".$_SESSION['id']."'"));
			switch($rep_paiements['paiements'])
			{
				case 1:
				case 2:
				case 3:
				case 4:
					$points = 100;
					break;
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
					$points = 110;
					break;
				case 10:
				case 11:
				case 12:
				case 13:
				case 14:
					$points = 130;
					break;
				case 15:
				case 16:
				case 17:
				case 18:
				case 19:
					$points = 150;
					break;
				case 20:
				case 21:
				case 22:
				case 23:
				case 24:
					$points = 200;
					break;
				case 25:
				case 26:
				case 27:
				case 28:
				case 29:
					$points = 250;
					break;
				case 30:
					$points = 500;
					break;
				default:
					$points = 100;
					break;
			}

			$query2 = mysql_query("SELECT * FROM `elios_profil`  WHERE `user` = '".$pseudo."'") or die(mysql_error());
			if(mysql_num_rows($query2) == 0)
			{
				echo "erreur";
			}
			else
			{
				mysql_query("UPDATE elios_profil SET pointdevote = pointdevote + ".$points." WHERE user = '".$pseudo."'")or die (mysql_error());
				$rep1 = mysql_query("SELECT pointdevote  FROM elios_profil WHERE user='".$pseudo."'");
				$don1 = mysql_fetch_array($rep1);

				echo '<br><p>Votre compte à bien été crédité de '.$points.' points de vote.<br />Vous disposez désormais de '.$don1['pointdevote'].' pts de vote que vous pouvez dès à présent dépenser dans la <a href="../index.php?site=Boutique&amp;l=4">boutique du site</a>.</p>';
			}
		?>
<br><br>
		<h3 style="text-align:center;"><a href="index.php" title="Rentabiliweb">Cliquez ici pour acheter un nouveau code et recevoir des points de vote supplémentaires.</a></h3>
<br><br>
		<h1><a href="../index.php" title="Feriale">Cliquez ici pour revenir sur Feriale</a></h1>
<br><br><br><br>
	</body>
</html>
<?php
}
else
{
header('Location: secour.php?CODE=' . $HTTP_GET_VARS['code']);
}
?>
