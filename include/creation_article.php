<?php
		$connect = connection($DBSite);
			$statutR = mysql_query("SELECT * FROM ".$prefix."article");
		while($statutT = mysql_fetch_array($statutR))
		{
			echo "Vous disposez de ".$statutT['pointdevote']."<br />Le prix du grade 1 pour ce royaume est de";
		}



?>

<form method="post" action='?id_page=31'>
	<table>
    	<tr>
        	<td colspan='2'>
            <input type="radio" name="icone" value="1" id="1" /><img src='images/theme/defaut/logo/1.PNG' style='width:32px' />
            <input type="radio" name="icone" value="2" id="2" /><img src='images/theme/defaut/logo/2.PNG' style='width:32px'/>
            <input type="radio" name="icone" value="3" id="3" /><img src='images/theme/defaut/logo/3.PNG' style='width:32px'/>
            <input type="radio" name="icone" value="4" id="4" /><img src='images/theme/defaut/logo/4.PNG' style='width:32px'/>
            <input type="radio" name="icone" value="5" id="5" /><img src='images/theme/defaut/logo/5.PNG' style='width:32px'/>
            <input type="radio" name="icone" value="6" id="6" /><img src='images/theme/defaut/logo/6.PNG' style='width:32px'/>
            <input type="radio" name="icone" value="7" id="7" /><img src='images/theme/defaut/logo/7.PNG' style='width:32px'/>
            <input type="radio" name="icone" value="8" id="8" /><img src='images/theme/defaut/logo/8.PNG' style='width:32px'/>
            <input type="radio" name="icone" value="9" id="9" /><img src='images/theme/defaut/logo/9.PNG' style='width:32px'/>
            <br /><br />
            </td>
        </tr>
    	<tr>
        	<td>
            Titre : 
            </td>
        	<td>
				<input name='titre_article' type='text' size="50" maxlength="50" />
            </td>
         </tr>
         <tr>
         	<td colspan='2'>
				<textarea name='message_article' cols='60' rows='10'></textarea>
    		</td>
    	</tr>
        <tr>
        	<td colspan='2'>
				<input type='submit' value='Enregister' name='ok'/>
            </td>
     	</tr>
     </table>
</form>