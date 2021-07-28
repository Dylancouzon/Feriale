<?php
	if(isset($_SESSION['joueur'])&&isset($_POST['nbrchap'])&&is_numeric($_POST['nbrchap'])&&isset($_POST['royaume'])&&is_numeric($_POST['royaume'])&&isset($_POST['boutiqueP'])&&is_numeric($_POST['boutiqueP'])){
	$nbrchap=$_POST['nbrchap'];
$royaume_choisi=$_POST['royaume'];
$personnage_choisi=$_POST['boutiqueP'];
if ( $nbrchap==NULL | $royaume_choisi==NULL | $personnage_choisi == NULL)
{  echo "Un problème est survenu veillez recommencer l'opération";}
else
{
	if($nbrchap<='0' | $nbrchap>='101')
	{
	echo "tentative de cheat !!!!";	
	}
	else
	{
	$connect = connection(false,$sql_royaume,$royaume_choisi);
		$statutR = mysql_query("SELECT * FROM characters WHERE account = '".$joueur->id."' AND guid = '".$personnage_choisi."' ORDER BY name ASC");
		mysql_close($connect);
		while($statutT = mysql_fetch_array($statutR))
				{
				?>
                <table width='520px'>
                	<tr>
                    	<td colspan='2'>
                        	<strong><span style='font-size: 1.2em; text-align:center'>R&eacute;capitulatif d'achat</span></strong>
                        </td>
                   	</tr>
                	<tr>
                    	<td colspan='2' height='25px'>
                      
                        </td>
                   	</tr>                    
                	<tr>
                    	<td>
                        	<strong><span style='font-size: 1em; text-align:center'>Royaume S&eacute;lectionn&eacute; :</span></strong>
                        </td>
                        <td style='text-align: center'>
                        <img src='images/theme/defaut/icone/<?php echo $sql_royaume[$royaume_choisi][7];?>.PNG' />
                        </td>
                   	</tr>
                                    
                	<tr>
                    	<td>
                        	<strong><span style='font-size: 1em; text-align:center'>Personnage S&eacute;lectionn&eacute; :</span></strong>
                        </td>
                        <td width='380px'>
                        		<table>
									<tr style='cursor: pointer' onClick="window.location.replace('index.php?id_page=14&boutiqueP=<?php echo $statutT['guid']; ?>&psn=<?php echo $statutT['name'];?>&royaume=<?php echo $boutiqueR; ?>')"> 
                                        <td style='background-image: url("images/portrait/<?php echo $statutT['gender'];?>-<?php echo $statutT['race'];?>-<?php echo $statutT['class'];?>.gif"); width:81px; height:90px; background-position:center; background-repeat:no-repeat'>
                                            <img src='images/theme/defaut/selection_perso1.PNG'  />
                                        </td>
                                        <td style='background-image: url("images/theme/defaut/selection_perso2.PNG"); width:293px; height:90px; background-position:center' valign="middle">
                                            <span style='font-size: 1.3em; position: relative; left: 70px' class='class<?php echo $statutT['class'];?>'><strong><?php echo $statutT['name'];?></span></strong>		
                                        </td>
                                	</tr>
                          		</table>
                        </td>
                   	</tr>
					                
                	<tr>
                    	<td>
                        	<strong><span style='font-size: 1em; text-align:center'>Nombre de chapeluisant envoy&eacute;s :</span></strong>
                        </td>
                        <td style='height:140px; background-repeat: no-repeat; background-position: right; text-align: center; font-size:3em; background-image: url("images/chapeluisant.PNG")'><span valign='bottom'><strong>
                        	<?php echo $nbrchap; ?>
                     	</td>
                   	</tr>
                    <tr>
                    	<td height='30px'>
                        </td>
                   	</tr>
                    <tr>
                    	<td style='text-align:center;' colspan='2'>
                                <span><strong>Pour valider l'envoi, veuillez &eacute;crire <strong><span style='color:#FF9900'>OK</span></strong> dans le cadre ci-dessous</strong></span><br /><br />
                            <form action="index.php?id_page=113" method="post">
                            	<span style='display:none'><select name='nbrchap'>
                                	<option value="<?php echo $nbrchap; ?>"><?php echo $nbrchap; ?></option>
                               	</select>
                            	<select name='royaume_choisi'>
                                	<option value="<?php echo $royaume_choisi; ?>"><?php echo $royaume_choisi; ?></option>
                               	</select>
                            	<select name='personnage_choisi'>
                                	<option value="<?php echo $personnage_choisi; ?>"><?php echo $personnage_choisi; ?></option>
                               	</select></span>
                                <input name='acceptation' type='text' />
                            <input type="submit" value="Valider" />
                            </form>
                            
                            <br /><br />
                        </td>
                  	</tr>
                    <tr>
                    	<td colspan='2' style='text-align:center'>
                        	<strong><span style='border:solid; border-color: red; padding: 8px'>Une fois valid&eacute;, aucun remboursement ne pourra &ecirc;tre effectu&eacute;.</span></strong>
                        </td>
                  	</tr>
             	</table>
                
				<?php
				if($joueur->rang > 4){
				echo "<br /><br />
				<form action='index.php?id_page=999' method='post'>
                            	<span style='display:none'><select name='nbrchap'>
                                	<option value=".$nbrchap.">".$nbrchap."</option>
                               	</select>
                            	<select name='royaume_choisi'>
                                	<option value=".$royaume_choisi."><?php echo $royaume_choisi; ?></option>
                               	</select>
                            	<select name='personnage_choisi'>
                                	<option value=".$personnage_choisi.">".$personnage_choisi."</option>
                               	</select></span>
                            <input type='submit' value='2eme boutique' />
                            </form>";
	
				}
				else{
				
				}
				
				
				}
				}
}
}
else
{
}
?>