<?php

require_once 'config/configuration.php';


if(isset($_POST['pseudo']))
	{

		extract($_POST);
		
		$erreur_vide = false;
		$erreur_pseudo = false;
		$erreur_mdp = false;
		$erreur_email = false;
		$erreur_domaine = false;
		$erreur_nb_email=false;
		$erreur_pseudo_exist=false;
		if(!empty($pseudo)&&!empty($mdp1)&&!empty($mdp2)&&!empty($email))
			{
			$pattern = '/^[a-zA-Z0-9]{3,13}$/';
			if(preg_match($pattern,$pseudo)){
				$pattern = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   				if(preg_match($pattern,$email)){
					$temp = explode('@',$email);
					if(!in_array($temp[1],$domaine)){
						if($mdp1==$mdp2){
							$connect = connection($DBRealmd);
							$reponse = mysql_query("SELECT * FROM account WHERE email = '".$email."'");
							if(mysql_num_rows($reponse)<=LIMIT_COMPTE_EMAIL){
								$reponse = mysql_query("SELECT * FROM account WHERE username = '".$pseudo."'");
								if(mysql_num_rows($reponse)==0){
									mysql_query('INSERT INTO account(username,sha_pass_hash,email, expansion) VALUES("'.$pseudo.'","'.sha1($pseudo.':'.$mdp1).'","'.$email.'","2")') or die(mysql_error());
									echo "Le compte ".$POST['pseudo']." à bien etait créer. Pour l'activer il vous faut cliquer sur le lien de votre email d'authentification. <br /> mail envoyé sur ".$_POST['email'];
								}else{$erreur_pseudo_exist=true;}
							}else{$erreur_nb_email=true;}
							mysql_close($connect);
						}else{$erreur_mdp=true;}
					}else{$erreur_domaine=true;}
				}else{$erreur_email=true;}
			}else{$erreur_pseudo=true;}
		}else{$erreur_vide=true;}
	}

if(isset($erreur_vide)&&$erreur_vide){echo 'Champs vide';}
if(isset($erreur_pseudo)&&$erreur_pseudo){echo 'Champs pseudo mal remplis';}
if(isset($erreur_mdp)&&$erreur_mdp){echo 'Champs mdp ne correspondent pas';}
if(isset($erreur_email)&&$erreur_email){echo 'Champs email mal remplis';}
if(isset($erreur_domaine)&&$erreur_domaine){echo 'fournisseur mail refuser';}
if(isset($erreur_nb_email)&&$erreur_nb_email){echo 'Nombre de compte avec la meme adresse email depasser';}
if(isset($erreur_pseudo_exist)&&$erreur_pseudo_exist){echo 'Le pseudo existe deja';}

?>



<form action="index.php?id_page=6" method="post">
<table>
	<tr>
		<td style='height:50px;'>Nom de compte<br /><span style='color: red; font-size: 11px'>Ne pas mettre de caractères spéciaux ( éèàÿø ) <br />Ni espace</span></td><td><input type="text" name="pseudo" id="pseudo"  /></td>
	</tr>
	<tr>
		<td style='height:50px;'>Mot de passe</td><td><input type="password" name="mdp1" id="mdp1"  /></td>
	</tr>
	<tr>
		<td style='height:50px;'>Confirmation mot de passe</td><td><input type="password" name="mdp2" id="mdp2"  /></td>
	</tr>
	<tr>
		<td style='height:50px;'>E-mail<br /><span style='color:red; font-size:11px'>Les adresses temporaires sont refusés <br />( Yopmail etc )</span></td><td><input type="text" name="email" id="email"  /></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="S'inscrire" /></td>
	</tr>
</table>
</form>