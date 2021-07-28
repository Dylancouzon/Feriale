    <a href='index.php?id_page=<?php 
	if ($joueur->rang>=1){ $inscriptionetat=1;}
	else { $inscriptionetat=6;}
	echo $inscriptionetat?>'><div id='inscription' style='margin-left:-5px;'  <?php if($joueur->rang>=1){echo "onclick=\"alert('Vous devez &ecirc;tre deconnect&eacute; pour vous inscrire.')\" ";}?>><img src="images/theme/defaut/inscription_offclick.PNG" onmouseover="this.src='images/theme/defaut/inscription_onclick.PNG';" onmouseout="this.src='images/theme/defaut/inscription_offclick.PNG';">
    </div></a>	
    <div style='width:250px; background-image: url("images/theme/defaut/menuG/menuG_bottom.JPG"); background-position: bottom left;'>
        <img style='margin-right:5px; width:248px'src='images/theme/defaut/menuG/menuG_top.JPG' />
        
        <?php 
		if (  $joueur->rang==0 )
		{ ?>
					<div id='login1'>
			   <img style=' margin-left:10px; margin-top:3px; margin-bottom:0px;' onclick="document.getElementById('login1').style.display='none';document.getElementById('login2').style.display='';" src='images/theme/defaut/menuG/connexion.PNG'  onmouseover="this.src='images/theme/defaut/menuG/onclick_connexion.PNG';" onmouseout="this.src='images/theme/defaut/menuG/connexion.PNG';"/>
			</div> 
				<div id='login2' style='display:none; margin-bottom:5px; width:245px; font-size:11px'>
				<div id='login3'>
					<img style=' margin-left:10px; margin-top:3px; margin-bottom:0px;' onclick="document.getElementById('login1').style.display='';document.getElementById('login2').style.display='none';" src='images/theme/defaut/menuG/connexion.PNG' onmouseover="this.src='images/theme/defaut/menuG/onclick_connexion.PNG';" onmouseout="this.src='images/theme/defaut/menuG/connexion.PNG';"/>
				</div> 
				<div style='text-align:center'>
					<br />    <br />
					<strong>Nom de Compte :</strong>
                    <form action="index.php" method="post">
					<input type="text" name="compte" style='background: none; width:100px; height:12px;'/>
				</div>
				<br />
				<div style='text-align:center; margin-top: 10px;'>
					<strong>Mot de passe :</strong> 
					<input type="password" name="password" style='background: none; height:12px; width:100px;' />
				</div>	
				<div style='text-align:center; margin-top: 10px;'><input type="image" src="images/theme/defaut/menuG/ok_offclick.PNG" onmouseover="this.src='images/theme/defaut/menuG/ok_onclick.PNG';" onmouseout="this.src='images/theme/defaut/menuG/ok_offclick.PNG'"; value="Ce connecter" />
                	</form>
				</div>
                <span style='margin-left: 30px'><strong><a href='index.php?id_page=74'>Mot de passe oubli&eacute; ?</a></strong></span>
			</div>  
        <?php
		}
            $connect = connection($DBSite);
            $reponse = mysql_query("SELECT * FROM ".$prefixtable."menu WHERE block = 1 AND id_referant = 0 AND acce <= ".$joueur->rang." AND visible = 1 ORDER by ordre ASC") or die(mysql_error());
            
        while($traitement = mysql_fetch_array($reponse))
        {
            echo "
			<img id='".$traitement['id_menu']."".$traitement['nom']."' style=' margin-left:10px; margin-top:3px; margin-bottom:0px;' onclick=\"document.getElementById('".$traitement['id_menu']."".$traitement['nom']."').style.display='none';document.getElementById('".$traitement['id_menu']."').style.display='';\" src='images/theme/defaut/menuG/".$traitement['img']."' onmouseover=\"this.src='images/theme/defaut/menuG/onclick_".$traitement['img']."';\" onmouseout=\"this.src='images/theme/defaut/menuG/".$traitement['img']."';\"
			
			
			 />
                <div style='display:none; width:200px; position: relative; left:20px; top:-3px; font-size: 0.75em' id='".$traitement['id_menu']."'>
                <img style=' margin-left:-10px; margin-top:8px; margin-bottom:0px;'  onclick=\"document.getElementById('".$traitement['id_menu']."').style.display='none';document.getElementById('".$traitement['id_menu']."".$traitement['nom']."').style.display='';\" src='images/theme/defaut/menuG/".$traitement['img']."' onmouseover=\"this.src='images/theme/defaut/menuG/onclick_".$traitement['img']."';\" onmouseout=\"this.src='images/theme/defaut/menuG/".$traitement['img']."';\"/>
				";
            $reponse2 = mysql_query("SELECT * FROM elios_page WHERE id_menu = ".$traitement['id_menu']." AND idpage_referant = 0 AND acce <= ".$joueur->rang." AND visible  = 1 ORDER by ordre ASC") or die(mysql_error());
                while($traitement2 = mysql_fetch_array($reponse2))
                { 
                    echo "<a href='index.php?id_page=".$traitement2['id_page']."' title='".$traitement2["contenu"]."'><span onmouseover=\"this.style.color='#FFCC00';\" onmouseout=\"this.style.color='#000000';\">- ".$traitement2['nom']."</a></span><br />";
                };
                
            echo "</div>";
        }
        mysql_close($connect);
        ?>
        <br /><br /><br /><br />
    </div>