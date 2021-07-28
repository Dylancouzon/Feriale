<div id='news' style='align-text: center; background-image: url("images/NEWS/<?php echo $newsaffiche; ?>"); background-repeat: no-repeat; background-position: center; margin-left:5px;'>
	<img src='images/theme/defaut/cadre_news.PNG' width='590px;'/>
</div>
            
        <table style='margin-bottom:30px;margin-left:5px; width:590px;'>
                <tr>
                    <td>
                        <img style='margin-left: 69px; margin-bottom: 15px; margin-top:5px	' src='images/theme/defaut/separateur.PNG' />
                        <?php include ("fonction/Npage.php"); ?>
                    </td>
                </tr>
            <?php
            $articledebut1 = $joueur->Npage*5;
            $articledebut = $articledebut1-5;
            $articlefin1 = $joueur->Npage*5;
            $articlefin = $articlefin1+1;
            $connect = connection($DBSite);
            $newsR = mysql_query("SELECT * FROM ".$prefixtable."article WHERE id_referantpage = ".$joueur->id_page." AND visible = 1 AND acce <= ".$joueur->rang." AND ordre > ".$articledebut." AND ORDRE < ".$articlefin." ORDER by ordre ASC");
			           mysql_close($connect);
			if (!mysql_fetch_row($newsR)) {
echo "<strong><div style='text-align: center;font-size:1.6em'><br /><br /><br />Vous devez &ecirc;tre connect&eacute; <br />pour consulter cette page.<br /><br /><br /><br /></div></strong>";

}else
{ 
 			$articledebut1 = $joueur->Npage*5;
            $articledebut = $articledebut1-5;
            $articlefin1 = $joueur->Npage*5;
            $articlefin = $articlefin1+1;
            $connect = connection($DBSite);
			$newsR = mysql_query("SELECT * FROM ".$prefixtable."article WHERE id_referantpage = ".$joueur->id_page." AND visible = 1 AND acce <= ".$joueur->rang." AND ordre > ".$articledebut." AND ORDRE < ".$articlefin." ORDER by ordre ASC");
			           mysql_close($connect);
            while($newsT = mysql_fetch_array($newsR))
                {
            ?>
                <tr>
                    <td class='middle_top'>
                        <div style='float: left; margin-top: -10px; margin-left:30px;'>
                            <img src='images/theme/defaut/logo/<?php echo $newsT['type']; ?>.PNG' />
                        </div>
                        <div style='width: 300px; height:20px; margin-left:5px; margin-top:0px; float: left;	'>
                            <?php echo ($newsT['titre']); ?>
                        </div>
                        <div style='width: 100px; height:20px; margin-right:90px; margin-top:9px; float: right; font-size: 14px;'>
                            <?php 
                            $connect = connection($DBSite);
                            $accountR = mysql_query("SELECT * FROM elios_profil WHERE id_compte = ".$newsT['auteur']."");
                            mysql_close($connect);
            while($accountT = mysql_fetch_array($accountR))
                {
                            
                            
                            echo $accountT['user'];
                            } ?>
                        </div>
                        <div style='margin-right: 20px; float:right; position:relative; left: 200px; top:-10px'>    	
                                                    <?php 
                                                    
                                                    if($newsT['ordre'] ==5)
                                                    { ?>
                                                    <div style='margin-top:0px; margin-right:1px; float: right;'>
                                     <div id='hnews<?php echo $newsT['ordre']; ?>' style='display:none' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display='none'; 
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='none';">
                                        <img src='images/theme/defaut/fleche_haut.JPG' />
                                    </div>
                                    <div id='bnews<?php echo $newsT['ordre']; ?>' style='' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display=''; 
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-1; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-2; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-2; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-3; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-3; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-4; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-4; ?>').style.display='';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-3; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-4; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+3; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+4; ?>').style.display='none';
                                                    ">
                                        <img src='images/theme/defaut/fleche_bas.JPG' />
                                    </div>
                                </div>
                        </div>
                    </td>
                </tr>
                <tr id='news<?php echo $newsT['ordre']; ?>' style='display: none'>
                    <td class='middle_middle'>
                        <?php
                        if($newsT['format']== 'HTM')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'TXT')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'PHP')
                        {
                            include ($newsT['contenu']);
                        }
                        ?>
                    </td>
                </tr>
                                                    <?php }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    elseif($newsT['ordre'] ==4)
                                                    { ?>
                                                    <div style='margin-top:0px; margin-right:1px; float: right;'>
                                     <div id='hnews<?php echo $newsT['ordre']; ?>' style='display:none' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display='none'; 
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='none';">
                                        <img src='images/theme/defaut/fleche_haut.JPG' />
                                    </div>
                                    <div id='bnews<?php echo $newsT['ordre']; ?>' style='' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display=''; 
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-1; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-2; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-2; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-3; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-3; ?>').style.display='';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-3; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+3; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+4; ?>').style.display='none';
                                                    ">
                                        <img src='images/theme/defaut/fleche_bas.JPG' />
                                    </div>
                                </div>
                        </div>
                    </td>
                </tr>
                <tr id='news<?php echo $newsT['ordre']; ?>' style='display: none'>
                    <td class='middle_middle'>
                        <?php
                        if($newsT['format']== 'HTM')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'TXT')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'PHP')
                        {
                            include ($newsT['contenu']);
                        }
                        ?>
                    </td>
                </tr>
                                                    <?php }
                                                    
                                                    
                                                    elseif($newsT['ordre'] ==3)
                                                    { ?>
                                                    <div style='margin-top:0px; margin-right:1px; float: right;'>
                                     <div id='hnews<?php echo $newsT['ordre']; ?>' style='display:none' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display='none'; 
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='none';">
                                        <img src='images/theme/defaut/fleche_haut.JPG' />
                                    </div>
                                    <div id='bnews<?php echo $newsT['ordre']; ?>' style='' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display=''; 
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-1; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-2; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-2; ?>').style.display='';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+3; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+4; ?>').style.display='none';
                                                    ">
                                        <img src='images/theme/defaut/fleche_bas.JPG' />
                                    </div>
                                </div>
                        </div>
                    </td>
                </tr>
                <tr id='news<?php echo $newsT['ordre']; ?>' style='display: none'>
                    <td class='middle_middle'>
                        <?php
                        if($newsT['format']== 'HTM')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'TXT')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'PHP')
                        {
                            include ($newsT['contenu']);
                        }
                        ?>			</td>
                </tr>
                                                    <?php }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    elseif($newsT['ordre'] ==2)
                                                    { ?>
                                                    <div style='margin-top:0px; margin-right:1px; float: right;'>
                                     <div id='hnews<?php echo $newsT['ordre']; ?>' style='display:' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display='none'; 
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='none';">
                                        <img src='images/theme/defaut/fleche_haut.JPG' />
                                    </div>
                                    <div id='bnews<?php echo $newsT['ordre']; ?>' style='display:none' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display=''; 
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']-1; ?>').style.display='';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']-1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+3; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+4; ?>').style.display='none';
                                                    ">
                                        <img src='images/theme/defaut/fleche_bas.JPG' />
                                    </div>
                                </div>
                        </div>
                    </td>
                </tr>
                <tr id='news<?php echo $newsT['ordre']; ?>' style='display: '>
                    <td class='middle_middle'>
                        <?php
                        if($newsT['format']== 'HTM')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'TXT')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'PHP')
                        {
                            include ($newsT['contenu']);
                        }
                        ?>
                    </td>
                </tr>
                                                    <?php }
                                                    
                                                    
                                                    
                                                    else
                                                    { ?>
                                                    <div style='margin-top:0px; margin-right:1px; float: right;'>
                                     <div id='hnews<?php echo $newsT['ordre']; ?>' style=''
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display='none'; 
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='none';">
                                        <img src='images/theme/defaut/fleche_haut.JPG' />
                                    </div>
                                    <div id='bnews<?php echo $newsT['ordre']; ?>' style='display:none ' 
                                            onclick="document.getElementById('news<?php echo $newsT['ordre']; ?>').style.display=''; 
                                                    document.getElementById('hnews<?php echo $newsT['ordre']; ?>').style.display='';
                                                    document.getElementById('bnews<?php echo $newsT['ordre']; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+1; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+2; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+3; ?>').style.display='none';
                                                    document.getElementById('news<?php echo $newsT['ordre']+4; ?>').style.display='none';
                                                    ">
                                        <img src='images/theme/defaut/fleche_bas.JPG' />
                                    </div>
                                </div>
                        </div>
                    </td>
                </tr>
                <tr id='news<?php echo $newsT['ordre']; ?>'>
                    <td class='middle_middle'>
                        <?php
                        if($newsT['format']== 'HTM')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'TXT')
                        {
                            echo $newsT['contenu'];
                        }
                        elseif($newsT['format']== 'PHP')
                        {
                            include ($newsT['contenu']);
                        }
                        ?>
                    </td>
                </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                <tr>
                    <td>
                        <img style='margin-left: 69px; margin-bottom: 5px; margin-top:2px	' src='images/theme/defaut/separateur.PNG' />
                    </td>
                </tr>
            <?php 
                }}
            ?>
        </table>