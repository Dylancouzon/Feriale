<?php
	foreach($sql_royaume as $key=>$value){
		if($value[4]){	
				echo "<span style='font-size:11px'><strong>Personnages sur le royaume :<span style='color:#FFDDDD'>".$value[6]."</span></strong><br />";					
				$connect = connection(false,$sql_royaume,$key); 
						$Rcompte = mysql_query("SELECT * FROM characters WHERE account = ".$joueur->id." ORDER by guid ASC") or die(mysql_error());
					mysql_close($connect);
					while($Tcompte = mysql_fetch_array($Rcompte))
					{
					echo "- ".$Tcompte['name'];
					}
					echo "<br /></span>";
			$IDRoyaumeSite++;
			}
			}
?>