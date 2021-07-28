<?php
session_start();
require('config.php');

if(isset($_GET['CODE']) && !empty($_GET['CODE']))
{
	$code = urlencode($_GET['CODE']);
	?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Paiements - Feriale.fr</title>
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
			color: bkack;
		}

		h1 a:hover
		{
			text-decoration: underline;
		}
        </style>
        </script> 
	</head>

	<body>
<div style='width:1100px; margin:auto	'>


<span style='padding-left:340px'><a style='border:none' href='http://www.feriale.fr/index.php'> <img src='../images/theme/defaut/logo_feriale_onclick.PNG'  style='border:none'/></a>

            <p><img src="../images_2/header.png" title="Feriale" /></p>
    
            <p style="text-align:center;">
                Vous avez été déconnectés lors de l'achat du code rentabiliweb. <br />
		  Veuillez remplir ce formulaire pour récupérer automatiquement vos points.
		      
                <form method="post" action="secour.php" style="margin:auto;">
                    <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo" /><br />
                    <label for="pass">Mot de passe :</label><input type="password" name="pass" id="pass" /><br />
		      <input type="hidden" name="code" value="<?php echo $code; ?>" /><br />
                    <input type="submit" name="envoyer" value="Envoyer" />
                </form><br />
		  PS : Si vous désirez acheter de nouveaux codes, sachez que cette erreur n'arrive que très rarement...<br /><br />
		<br />
	     </p>        
        </div>
	</body>
</html>
<?php
}
else
{
	if(!isset($_POST['code']) || empty($_POST['code']))
	{
		header("Location: erreur.php");
		exit(1);
	}
	$code = htmlspecialchars(mysql_escape_string($_POST['code']));
	
	if(!isset($_POST['pseudo']) || empty($_POST['pseudo']))
	{
		header("Location: secour.php?CODE=" . $code);
		exit(1);
	}
	
	if(!isset($_POST['pass']) || empty($_POST['pass']))
	{
		header("Location: secour.php?CODE=" . $code);
		exit(1);
	}
	
	mysql_query("DELETE FROM password_template") or die(mysql_error);
		
	$pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
       $pseudo = str_replace("java script:","",$pseudo);
	$pseudo = str_replace("<script>","",$pseudo); 
	$password = htmlspecialchars(strip_tags($_POST['pass']));
	$password = str_replace("java script:","",$password);
	$password = str_replace("<script>","",$password);
	$count_p = mysql_query("SELECT COUNT(*) AS nb_p FROM account WHERE username = '".$pseudo."'");
	$p_result = mysql_fetch_array($count_p);
	if($p_result['nb_p'] != '1')
	{
		header("Location: secour.php?CODE=" . $code);
		exit(1);
	}

	$q = "INSERT INTO password_template(password) VALUES (SHA1(CONCAT(UPPER('".$pseudo."'),':',UPPER('".$password."'))));";
	mysql_query($q) or die(mysql_error());
	$password_post = mysql_query("SELECT * FROM password_template");
	$password_result = mysql_fetch_assoc($password_post);
	$reponse = mysql_query("SELECT * FROM account WHERE sha_pass_hash = '".$password_result['password']."' AND username = '".$pseudo."'");
	$donnees = mysql_fetch_array($reponse);
	if($donnees['sha_pass_hash'] != $password_result['password'])
	{
		header("Location: secour.php?CODE=" . $code);
		exit(1);
	}
			
	$_SESSION['login'] = TRUE;
	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['id'] = $donnees['id'];
	$_SESSION['gm'] = $donnees['gmlevel'];
	
	$valid = false;
	$reponse2 = mysql_query("SELECT COUNT(*) AS nb_codes FROM rentabiliweb WHERE code='".$code."'");
	$donnees2 = mysql_fetch_array($reponse2);
	
	if($donnees2['nb_codes'] == 0)
	{
		header("Location: erreur.php");
		exit(1);
	}
	
	$reponse3 = mysql_query("SELECT * FROM rentabiliweb WHERE code='".$code."'");
	while($donnees3 = mysql_fetch_array($reponse3))
	{
		if($donnees3['uid'] == 0)
		{
			$valid = true;
		}
		
		if($donnees3['uid'] != 0)
		{
			$valid = false;
		}
	}
	
	if(!$valid)
	{
		header("Location: erreur.php");
		exit(1);
	}
	
	mysql_query("INSERT INTO `rentabiliweb` VALUES('', '".$code."', '".$donnees['id']."', '".$_SERVER['REMOTE_ADDR']."', '".date('d/m/Y \à H\hi', time())."')");
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
		<head>
			<title>Rentabiliweb - Feriale</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
			<style type="text/css">
				body
				{
					color: #fff;
					background-color: #151515;
				}
		
				p
				{
					text-align: center;
				}

				a
				{
					text-decoration: underline;
					color: #fff;
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
					color: #fff;
				}

				h1 a:hover
				{
					text-decoration: underline;
				}
			</style>
		</head>
	
		<body>
			<p><img src="../images_2/header.png" title="Feriale" /></p>
	
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
				
				$query2 = mysql_query("SELECT * FROM `elios_profil`  WHERE `user` = '".$pseudo."';") or die(mysql_error());
	
				if(mysql_num_rows($query2) == 0)
				{
					echo "ERREUR";
				}
				else
				{
					mysql_query("UPDATE elios_profil SET pointdevote = pointdevote + '".$points."' WHERE user = '".$pseudo."'")or die (mysql_error());
					$rep1 = mysql_query("SELECT pointdevote FROM elios_profil WHERE user='".$pseudo."'");
					$don1 = mysql_fetch_array($rep1);
	
					echo '<br><p>Votre compte à bien été crédité de '.$points.' points de vote.<br />Vous disposez désormais de '.$don1['pointdevote'].' pts de vote que vous pouvez dès à présent dépenser dans la <a href="../index.php?site=Boutique&amp;l=4">boutique du site</a>.</p>';
				}
			?>
	
			<h3 style="text-align:center;"><a href="index.php" title="Rentabiliweb">Cliquez ici pour acheter un nouveau code et recevoir des points de vote supplémentaires.</a></h3>
			<h1><a href="../index.php" title="Feriale">Cliquez ici pour revenir sur Feriale</a></h1>
		</body>
	</html>
<?php
}
?>