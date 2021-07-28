<?php
 
 /*
  * Created on 4 mai 07
  *
  * @autor : The Kankrelune
  * @copyright : The WebFaktory © 2006/2007
  * 
  */

if(isset($_POST['captchaResult']))
{
	session_start();
	
	if(isset($_POST['caseInsensitive']))
	{
		$_POST['captchaResult'] = strtolower($_POST['captchaResult']);
		$_SESSION['captchaResult'] = strtolower($_SESSION['captchaResult']);
	}
	
	if($_POST['captchaResult'] === $_SESSION['captchaResult'])
		$result = '<div class="result true">Bonne r&eacute;ponse bonne... bravo... .. !</div><br />';
			else
				$result = '<div class="result false">Mauvaise r&eacute;ponse... pas de chance... il fallait r&eacute;pondre '.$_SESSION['captchaResult'].'... .. !</div><br />';
}
else $result = '';

echo '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n"; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" dir="ltr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="content-language" content="french" />
		<title>Captcha</title>
		<style type="text/css">
	    <!--//
	    body { background-color:#F8F8F8; } 
	    input
		{
			border: #000000 1px solid; 
			margin-bottom:2px;
			vertical-align:middle;
			display: in-line;
			background-color:#ffffff;
		}
		input[type="checkbox"] { border: none; } 
		.result { margin:auto;text-align:center; }
		.true { color:#00ff00; }
		.false {  color:#ff0000; }
		//-->
		</style>
	</head>
<body>
	<div style="width:75%;margin:auto;margin-top:30px;">
		<fieldset style="text-align:center;">
			<legend>Captcha</legend>
				<br />
			<?php echo $result; ?>
			<form action="index.php?" method="post">
				<label for="captchaResult">Veuillez recopier le code affich&eacute; : </label><input type="text" name="captchaResult" size="10" /> <img src="http://www.feriale.net/V2/fonction/protect/captcha.php" style="vertical-align:middle;" />
					<br />
				<input type="checkbox" name="caseInsensitive" value="1" <?php echo isset($_POST['caseInsensitive']) ? 'checked="checked" ' : ''; ?>/> Case insensitive 
					<br />
				<input type="submit" value="Go" />
			</form>
		</fieldset>
	  </div>
</body>
</html>