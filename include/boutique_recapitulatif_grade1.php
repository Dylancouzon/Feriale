<?php 
$royaume_choisi = $_POST['boutiqueR']; 
$grade1mjdeb;
$prixgrade1 = $sql_royaume[$royaume_choisi][8];
if(isset($_SESSION['joueur'])&&isset($_POST['boutiqueR'])&&is_numeric($_POST['boutiqueR'])){
if($royaume_choisi == $idmjint | $royaume_choisi == $idmjpro | $royaume_choisi == $idmjres)
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
                   <tr>
                    	<td height='30px'>
                        </td>
                   	</tr>
                    <tr>
                    	<td style='text-align:center;' colspan='2'>
                                <span><strong>Vous &ecirc;tes sur le point de prendre le grade 1 sur le royaume <br /><span style='font-size: 1.3em'><?php echo $sql_royaume[$royaume_choisi][6];?></span> pour <?php echo $prixgrade1; ?><br />Pour valider l'envoi veuillez &eacute;crire <strong><span style='color:#FF9900'>OK</span></strong> dans le cadre ci-dessous</strong></span><br /><br />	
                            <form action="index.php?id_page=102" method="post">
                            	<span style='visibility:hidden'>
                            	<select name='royaume_choisi'>
                                	<option value="<?php echo $royaume_choisi; ?>"><?php echo $royaume_choisi; ?></option>
                               	</select>
                                <select name='prixgrade1'>
                                	<option value="<?php echo $prixgrade1; ?>"><?php echo $prixgrade1; ?></option>
                               	</select>
                                </span>
                                <input name='acceptation' type='text' />
                            <input type="submit" value="Valider" />
                            </form>
                            
                            <br /><br />
                        </td>
                  	</tr>
                    <tr>
                    	<td colspan='2' style='text-align:center'>
                        	<strong><span style='border:solid; border-color: red; padding: 8px'>Une fois valid&eacute; aucun remboursement ne pourra &ecirc;tre demand&eacute;.</span></strong>
                        </td>
                  	</tr>
             	</table>
                
                <?php 
				
}
else
{
echo "en maintenance";
				}
				}
				else
				{
				
				}
				?>