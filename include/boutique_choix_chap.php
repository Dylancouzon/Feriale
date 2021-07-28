   <?php 
   if(isset($_SESSION['joueur'])&&isset($_POST['boutiqueP'])&&is_numeric($_POST['boutiqueP'])&&isset($_POST['royaume'])&&is_numeric($_POST['royaume'])){
$guid=$_POST['boutiqueP'];
$royaume=$_POST['royaume'];

  if($royaume == '37' OR $royaume == '38' OR $royaume == '39'){echo"<form action=\"index.php?id_page=685\" method=\"post\">" ;}else{
	echo"<form action=\"index.php?id_page=112\" method=\"post\">";}; ?>
	<input type="hidden" name="royaume" value="<?php echo $_POST['royaume']; ?>" >
	<input type="hidden" name="boutiqueP" value="<?php echo $_POST['boutiqueP']; ?>" >
<label>
Vous disposez de <strong><?php 

$connect = connection($DBSite);
$reponse = mysql_query('SELECT * FROM '.$prefixtable.'profil WHERE id_compte='.$joueur->id);
if(mysql_num_rows($reponse)==1){
$traite = mysql_fetch_array($reponse);
$pointdevote=$traite['pointdevote'];
}else{
	$pointdevote=0;
}
echo $pointdevote; ?></strong> point de vote.<br /><br />Pour information 10 point de vote = 1 <?php if($royaume == '37' OR $royaume == '38' OR $royaume == '39'){echo"Sceau de champion";}else{echo "Chapeluisant";} ?>.<br /><br />
Combien de <?php if($royaume == '37' OR $royaume == '38' OR $royaume == '39'){echo"Sceau de champion";}else{echo "Chapeluisant";} ?> souhaitez-vous recevoir sur le personnage <?php echo $_POST['psn'] ?>? <br /><br />
</label>
<span style='text-align:center;'>
<select name="nbrchap" style='text-align:center; margin-left:240px'>
<?php
	for($i = 1; $i <= 100; $i++)
	{
		echo '<option name="nbrchap">' . $i . '</option>';
		if($i >= 10)
		{
			$i += 9;
		}
	}
?>
</select>
<div style='visibility: hidden'>
<select name="boutiqueP">
<option value='<?php echo $guid; ?>'><?php echo $guid; ?></option>
</select>
<select name="royaume">
<option value='<?php echo $royaume; ?>'><?php echo $royaume; ?></option>
</select>
</div>
</p>
<p>
<i><font color=white><?php if($royaume == '37' OR $royaume == '38' OR $royaume == '39'){echo"<b>(Vous recevez vos sceaux de champion dans l'onglet monnaies sur votre personnage)</b>";}else{echo "(Vous recevrez vos Chapeluisant dans la bo&icirc;te aux lettres)";} ?> </font></i><br /><br />
<input type="submit" value="Valider">
</p>
</form></span>

<?php
				}
				else
				{
				
				}
				?>