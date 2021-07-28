<?php
	if ($_GET['id_compte_rechercher'] == NULL)
		{
		$_GET['id_compte_rechercher'] = 0 ;
		}
		$IDRoyaumeSite=1;
		while ($IDRoyaumeSite <= $nombrederoyaume)
			{		
				echo "<span style='font-size:11px'><strong>Personnage sur le royaume :<span style='color:#FFDDDD'>".$explodeRoy[$IDRoyaumeSite][3]."</span></strong><br />";					
				$connect = connection($explodeRoy[$IDRoyaumeSite][1]);
						$Rcompte = mysql_query("SELECT * FROM characters WHERE account = ".$_GET['id_compte_rechercher']." ORDER by guid ASC") or die(mysql_error());
					mysql_close($connect);
					while($Tcompte = mysql_fetch_array($Rcompte))
					{
					echo "- ".$Tcompte['name'];
					}
					echo "<br /></span>";
			$IDRoyaumeSite++;
			}
?>