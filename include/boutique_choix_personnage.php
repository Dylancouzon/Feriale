<?php
if(isset($_SESSION['joueur'])&&isset($_POST['boutiqueR'])&&is_numeric($_POST['boutiqueR'])){
$boutiqueR = $_POST['boutiqueR'];
?>
Choisissez le personnage du royaume <strong><?php echo $explodeRoy[$boutiqueR][3] ?></strong> sur lequel vous d&eacute;sirez envoyer vos 
<?php if($boutiqueR == '37' OR $boutiqueR == '38' OR $boutiqueR == '39'){echo"Sceaux de champion";}else{echo "Chapeluisants";} ?> .<br /><br />
                <table style='position: relative; left: 80px;'>
<?php
		$connect = connection(false,$sql_royaume,$boutiqueR);
		$statutR = mysql_query("SELECT * FROM characters WHERE account = ".$joueur->id." ORDER BY name ASC");
		mysql_close($connect);
		while($statutT = mysql_fetch_array($statutR))
				{
				?>
                	<tr> 
                    	<td style='background-image: url("images/portrait/<?php echo $statutT['gender'];?>-<?php echo $statutT['race'];?>-<?php echo $statutT['class'];?>.gif"); width:81px; height:90px; background-position:center; background-repeat:no-repeat'>
                        	<img src='images/theme/defaut/selection_perso1.PNG'  />
                        </td>
                  		<td style='background-image: url("images/theme/defaut/selection_perso2.PNG"); width:293px; height:90px; background-position:center' valign="middle">
           					<span style='font-size: 1.3em; position: relative; left: 70px' class='class<?php echo $statutT['class'];?>'><strong><?php echo $statutT['name'];?></span></strong>		
                		</td>
                  	</tr>
 					<tr>
                    	<td style='text-align: center' colspan='2'>
                        	<form action='index.php?id_page=111' name='<?php echo $idmjint; ?>' method='post'>
								<input type='hidden' name='boutiqueP' value='<?php echo $statutT['guid']; ?>' />
								<input type='hidden' name='psn' value='<?php echo $statutT['name'];?>' />
								<input type='hidden' name='royaume' value='<?php echo $boutiqueR; ?>' />
								<input type='submit' value='choisir <?php echo $statutT['name'];?>' />
							</form>
                        </td>
                   </tr>
	              <tr>
                    	<td colspan ="2" style='height:25px;'>
                        </td>
                    </tr>
                <?php	
				}
				?>
				          </table>
                          
                <?php
				}
				else
				{
				
				}
				?>