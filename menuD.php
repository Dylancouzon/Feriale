<div id='statut'>
	<table>
		<tr>
			<td class='statut_top'>
			</td>
		</tr>
		<tr>
			<td class='statut_middle'>
            <div id='serveur'>
            	<?php
				@$fp = fsockopen($URLLogin, $PortLogin, $errno, $errstr, 1);
				if(!$fp)
				{
				 $statut="off";
				} else {
				 $statut="on";
				}
				?>
                <span class='nom_royaume'>Set realmlist login.feriale.net </span><br />
               	<img class='statut_serveur' src='images/theme/defaut/<?php echo $statut; ?>.PNG' />
				</div>
				<br /><br />						
	
				<?php
                $nta2 =0 ;
				$nth2 =0 ;
				$ntj =0 ;
				$IDRoyaumeSite= 1;
				foreach($sql_royaume as $key=>$value){
					if($value[4]){
				
	$connect = connection($DBRealmd);
		$statutR = mysql_query("SELECT * FROM realmlist WHERE id = ".$key." AND color = 0 ORDER by name ASC");
		mysql_close($connect);
		$statutT = mysql_fetch_array($statutR);
				?>
				
				
				<div id='serveur'>
                <img class='type_royaume' src='images/theme/defaut/logo_type_<?php echo $value[5]; ?>.PNG' />
                <span class='nom_royaume'><?php echo utf8_decode($value[6]); ?></span>
                
                <?php
				@$fp = fsockopen($statutT['address'], $statutT['port'], $errno, $errstr, 1);
				if(!$fp)
				{
				 $statut="off";
				} else {
				 $statut="on";
				}
				?>
                <div style='margin-top:0px'>
               	<img class='statut_serveur' src='images/theme/defaut/<?php echo $statut; ?>.PNG' />
                <table width='160px' style='position:relative; left:70px; top:-18px;'>
                <tr><td width='25%'>
                <img class='logo_faction' src='images/theme/defaut/logo_alliance.PNG ' />
                 
         <?php
		 if($statut=="on")
		 {
		$connect = connection(false,$sql_royaume,$key);   
        $req3 = mysql_query("SELECT COUNT(*) as nombrea2 FROM characters WHERE race = 1 AND online = 1 OR race = 3 AND online = 1  OR race = 4 AND online = 1  OR race = 7 AND online = 1  OR race = 11 AND online = 1 ");
        $row3 = mysql_fetch_array($req3);
        $na2 = $row3['nombrea2']; 
		}
		else{
		$na2=0;
		}
		?>
                 <span style='font-size: 9px; position: relative; top:-4px; left:-3px'><?php echo $na2; ?></span>
                 </td><td width='30%'>
                 <img class='logo_faction' src='images/theme/defaut/logo_horde.PNG ' />
                 
         <?php
		 if($statut=="on")
		 {
		$connect = connection(false,$sql_royaume,$key);
        $req3 = mysql_query("SELECT COUNT(*) as nombreh2 FROM characters WHERE race = 2 AND online = 1 OR race = 5 AND online = 1  OR race = 6 AND online = 1  OR race = 8 AND online = 1  OR race = 10 AND online = 1 ");
        $row3 = mysql_fetch_array($req3);
        $nh2 = $row3['nombreh2'];
		}
		$nt=0;
		$nt = $na2+$nh2;
		?>
                 <span style='font-size: 9px; position: relative; top:-4px; left:-3px'><?php echo $nh2; ?></span>
                 </td><td width='40%'>
                 <span class='test' style='position:relative;'>
                 <img class='logo_faction' src='images/theme/defaut/logo_total.PNG' />
                 <span style='font-size: 11px; position: relative; top:-4px; left:-3px'><strong><?php echo $nt; ?></strong></span>
                 </span>
                 </td>
                 </tr>
                 </table>
				</div>
                </div>
				<br />
				<?php 
				$nta2=$nta2+$na2;
				$nth2=$nth2+$nh2;
				$IDRoyaumeSite++;
				}
				} ?>
			</td>
		</tr>
		<tr>
			<td class='statut_footer'>
            <?php 
			$ntj= $nta2+$nth2;
			
                 echo"<span class='login_royaume'>$ntj"; ?></span>
		</td>
	</tr>
</table>
<div style='margin-bottom:0px; margin-top:15px'><a href='index.php?id_page=12'>
<img src="images/theme/defaut/boutique_offclick.PNG" onmouseover="this.src='images/theme/defaut/boutique_onclick.PNG';" onmouseout="this.src='images/theme/defaut/boutique_offclick.PNG';" name="Boutique" /></a>
</div>
</div>