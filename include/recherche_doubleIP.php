<?php
	$connect = connection($DBRealmd);
		$Rcompte = mysql_query("		
			select count(last_ip) nombre_compte, last_ip, username
			 from account 		
			 WHERE last_login >= '2010-04-17 14:09:05'
			 group by last_ip	   
			 having count(last_ip)>= 2 
			 ORDER BY nombre_compte DESC
			 limit 1, 30") or die(mysql_error());
		mysql_close($connect);
		while($Tcompte = mysql_fetch_array($Rcompte))
			{	
				echo "l'ip ".$Tcompte['last_ip']." est relier au compte <br />";
					$connect = connection($DBRealmd);
					$Rcompte2 = mysql_query("		
						select * FROM account WHERE last_ip = '".$Tcompte['last_ip']."'") or die(mysql_error());
					mysql_close($connect);
					while($Tcompte2 = mysql_fetch_array($Rcompte2))
						{
							echo "- ".$Tcompte2['username']."";
						}
				echo "<br /><br />";
			}
?>