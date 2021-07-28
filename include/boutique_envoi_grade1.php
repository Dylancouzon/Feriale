	<?php
	$royaume_choisi =$_POST['royaume_choisi'];
	$prixgrade1 = $sql_royaume[$royaume_choisi][8];
	if(isset($_SESSION['joueur'])&&isset($_POST['prixgrade1'])&&is_numeric($_POST['prixgrade1'])&&isset($_POST['royaume_choisi'])&&is_numeric($_POST['royaume_choisi'])&&($_POST['prixgrade1'] == $prixgrade1)){
	$prixgrade1 = $_POST['prixgrade1'];
	$royaume_choisi = $_POST['royaume_choisi'];
	
if($royaume_choisi == $idmjint | $royaume_choisi == $idmjpro | $royaume_choisi == $idmjres)
{

	if ($royaume_choisi ==NULL)
	{
	echo "une errreur c'est produit cliquez <a href='index.php'>ICI</a>";
	}
	if ($_POST['acceptation'] != "OK" & $_POST['acceptation'] != "ok" & $_POST['acceptation'] != "oK" & $_POST['acceptation'] != "Ok")
	{
	 echo "vous n'avez pas tap&eacute; OK";
	}
	else{
		$connect = connection($DBSite);
		mysql_query("INSERT INTO elios_historique_chap VALUES (".$joueur->id.", 'Grade1','1',".$_POST['royaume_choisi'].",'0','".$joueur->ip."', '".date('Y-m-d H:i:s')."','')");
			$statutR = mysql_query("SELECT * FROM ".$prefixtable ."profil WHERE id_compte = ".$joueur->id);
			while($statutT = mysql_fetch_array($statutR))
			{
			$pointactu = $statutT['pointdevote'] ;
			}
			if  ($pointactu<$prixgrade1)
			{
				echo "Vous ne poss&egrave;dez pas d'assez de points de vote.";
			}
			else
			{
			$pointrestant= $pointactu-$prixgrade1;
			mysql_close($connect);
			$connect = connection($DBRealmd);	
				$statutR = mysql_query("SELECT * FROM account WHERE id = ".$joueur->id);
				while($statutT = mysql_fetch_array($statutR))
				{
				$username = $statutT['username'];
				}
				
				$statutR = mysql_query("SELECT * FROM account_access WHERE id = ".$joueur->id." AND RealmID = ".$royaume_choisi);	
						if(mysql_num_rows($statutR) == 1)
						{	
							echo "<br />Le compte poss&egrave;de d&eacute;j&agrave; le grade un sur ce royaume.<br />";
						}
						else
						{
							 mysql_query("INSERT INTO account_access VALUES ('".$joueur->id."' , '1',".$royaume_choisi.",'".$username."','".$sql_royaume[$royaume_choisi][6]."')");

							$connect = connection($DBSite);			
							mysql_query("UPDATE ".$prefixtable."profil SET pointdevote = ".$pointrestant." WHERE id_compte =".$joueur->id);
							echo "Votre compte est d&eacute;sormais grade 1 sur le royaume".$sql_royaume[$royaume_choisi][6].". <br />Il vous reste ".$pointrestant." points de vote.";
						
					}
			}
		}
		}
		else{
		
		}
		}
		else
		{
		
		}