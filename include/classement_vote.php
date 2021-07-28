<table style='width: 300px; height: 200px; margin:auto; overflow:scroll '>
	<tr>
    	<td colspan='2' style='text-align:center; font-size:1.2em'>
        <strong>Les 60 Meilleurs votants</strong>
        </td>
    </tr>
  	<tr>
    	<td colspan='2' style='height: 25px'>
        </td>
  	</tr>
    <tr>
    	<td style='text-align:center;'>
        	<strong>Pseudo</strong>
        </td>
        <td style='text-align:center; vertical-align:middle; height:50px'>
        	<strong>Nombre de vote ce mois-ci</strong>
        </td>
   	</tr>
<?php
		$connect = connection($DBSite);
			$RcompteA = mysql_query("SELECT COUNT(id_compte) as nbrvote, id_compte FROM elios_stockageVOTE WHERE date LIKE '".date('Y-m')."%' GROUP BY id_compte ORDER BY nbrvote DESC LIMIT 0,60") or die(mysql_error());
			mysql_close($connect);
			while($TcompteA = mysql_fetch_array($RcompteA))
				{
				$connect = connection($DBSite);
					$RcompteB = mysql_query("SELECT * FROM ".$prefixtable."profil WHERE id_compte ='".$TcompteA['id_compte']."'") or die(mysql_error());
					mysql_close($connect);
					$TcompteB = mysql_fetch_array($RcompteB);		
				echo "
				<tr>
					<td style='text-align:center'>
					".$TcompteB['user']."
					</td>
					<td style='text-align:center'>".$TcompteA['nbrvote']."
					</td>
				</tr>";
				};
?>
</table>