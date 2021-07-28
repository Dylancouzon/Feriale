<?php

	$connect = connection($DBRealmd);
		$statutR = mysql_query("SELECT * FROM realmlist WHERE color = 0 ORDER by id ASC");
		mysql_close($connect);
		while($statutT = mysql_fetch_array($statutR))
?>