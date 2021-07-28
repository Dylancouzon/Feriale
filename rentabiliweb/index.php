<?php 
require_once ("../config/configuration.php");
require_once ("../class/joueur.php");
session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Paiements - Feriale.fr</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<style type="text/css">
		body
		{
		font-family:Verdana, Arial, Helvetica, sans-serif;
		background-image:url(../images/theme/defaut/fond/fond_top2.JPG);
		background-position:center;
		color:black;}	
		
		p
		{
			text-align: center;
		}

		a
		{
			text-decoration: underline;
			color: black;
		}

		a:hover
		{
			text-decoration: none;
		}

		h1
		{
			text-align: center;
		}

		h1 a
		{
			text-decoration: none;
			color: bkack;
		}

		h1 a:hover
		{
			text-decoration: underline;
		}
        </style>
        </script> 
	</head>

	<body>
<div style='width:1100px; margin:auto	'>


<span style='padding-left:340px'><a style='border:none' href='http://www.feriale.fr/index.php'> <img src='../images/theme/defaut/logo_feriale_onclick.PNG'  style='border:none'/></a>
<p> SOLUTION RENTABILIWEB : <br /><br />
Chaque code vous apportera des points de vote, que vous pourrez dépenser via la boutique.</p>
<p>Pour plus d'information sur les points offerts, regardez en bas de cette page.</p>
        <p>
            <form name="s" style="text-align:center;">              
            </form>	
    	</p>

	<?php
if($_SESSION['login'] && ($_SESSION['id'] == TRUE))
{
	$connect = connection($DBSite);
	$req_regulation = mysql_query("SELECT * FROM regulation_paiements WHERE uid='".$_SESSION['id']."'");
	$rep_regulation = mysql_fetch_array($req_regulation);

	
	if(($rep_regulation['paiements'] < 30) || ($rep_regulation['mois'] != date('F', time())))
	{
		if($rep_regulation['mois'] == date('F', time()))
		{
			$nombre_paiements = $rep_regulation['paiements'];
		}
		else
		{
			$nombre_paiements = 0;
		}
	?>
            <p style="text-align: center;">
				Ce mois-ci vous avez acheté <?php echo $nombre_paiements; ?> codes sur 30.
            </p>
		<p>
			<table border="0" cellpadding="0" cellspacing="0" style="border:5px solid #E5E5E5; margin: 5px auto;"><tr><td>
	<table cellpadding="0" cellspacing="0" style="width: 436px;  border: solid 1px #AAAAAA;">
    <tr>
        <td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <img src="http://payment.rentabiliweb.com/data/i/component/logo-form.gif" width="173" height="20" alt="Paiement sécurisé par Rentabiliweb" style="padding: 1px 0 0 5px"/>
                    </td>
                    <td>
                        <div style="text-align: right; padding: 2px; font-family: Arial, Helvetica, sans-serif; min-height:30px; ">
                            <span style="color: #3b5998; font-weight:bold; font-size: 12px;">Solutions de paiements sécurisés</span>
                            <br/>
                            														<span style="color: #5c5c5c; font-size: 11px; font-style: italic;">Secure payment solution</span>
														                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-top: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA;background-color: #F7F7F7;">
            <div style="text-align: center; padding: 2px; font-family: Arial, Helvetica, sans-serif; min-height:30px;">
                <span style="color: #3b5998; font-weight:bold; font-size: 12px;">Choisissez votre pays et votre moyen de paiement pour obtenir votre code</span>
                <br/>
                                <span style="color: #5c5c5c; font-size: 11px; font-style: italic;">Please choose your country and your kind of payment to obtain a code</span>
								            </div>
        </td>
    </tr>
    <tr height="250">
        <td width="280">
            <iframe name="rweb_display_frame" width="280" height="250" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="http://payment.rentabiliweb.com/form/acte/frame_display.php?docId=89200&siteId=362983&cnIso=geoip&lang=fr&skin=default">
            </iframe>
        </td>
        <td width="156" style="border-left: 1px solid #AAAAAA; background-color: #ffffff;">
            <iframe name="rweb_flags_frame" width="156" height="250" frameborder="0" marginheight="0" marginwidth="0" scrolling="no" src="http://payment.rentabiliweb.com/form/acte/frame_flags.php?docId=89200&siteId=362983&lang=fr&skin=default">
            </iframe>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-top: 1px solid #AAAAAA; background-color: #F7F7F7;">
            <form id="rweb_tickets_89200" method="get" action="http://payment.rentabiliweb.com/access.php" style="margin: 0px; padding: 0px;" >
                <table width="400" cellpadding="0" cellspacing="0" style=" margin: 2px auto;">
                	<tr>
                		<td style="text-align: center"><label for="code_0" style=" font-family:Arial, Helvetica, sans-serif;font-size: 12px; font-weight:bold; color:#3b5998; padding: 2px; margin: 0px;">
                        Saisissez votre code d'accès et validez :
										<br/>
										                		<span style="font-size: 11px; font-style: italic;color:#5c5c5c;">Please enter your access code :</span>
                    										</label></td>
                	</tr>
                	<tr>
                		<td style="text-align: center">
                																	<input name="code[0]" type="text" id="code_0" size="10" style="border: solid 1px #3b5998; padding: 2px; font-weight: bold; color:#3b5998; text-align: center;"/>
																					<input type="hidden" name="docId" value="89200" /><input type="button"  alt="Ok" onclick="getElementById('rweb_sub_89200').disabled=true;document.getElementById('rweb_tickets_89200').submit();" id="rweb_sub_89200"  style="width: 40px; height:20px; vertical-align:middle; margin-left: 5px; border: none; background:url(http://payment.rentabiliweb.com/data/i/component/button_okdefault.gif);"/></td>
                	</tr>
                </table>				
            </form>
            <div style="text-align: center; padding: 2px; font-family: Arial, Helvetica, sans-serif; clear: both;">
                <span style="font-weight:bold; font-size: 10px; color: #3b5998;">Votre navigateur doit accepter les cookies</span>
                								<br/>
                <span style="font-style: italic; font-size: 10px; color: #5c5c5c;">Please check that your browser accept the cookies</span>
								            </div>
			<div style="text-align: center; padding: 2px; font-family: Arial, Helvetica, sans-serif;">
                <a href="javascript:;"  onclick="javascript:window.open('http://www.rentabiliweb.com/component/ticket/form.php?page=form2&docId=89200&siteId=362983&lang=fr','rentabiliweb_help','toolbar=0,location=0,directories=0,status=0,scrollbars=1,resizable=1,copyhistory=0,menuBar=0,width=620,height=590');" style="color: #3b5998; font-weight:bold; font-size: 12px; text-decoration: none;">Support technique</a><span style="color: #AAAAAA;"> / </span><a href="javascript:;"  onclick="javascript:window.open('http://www.rentabiliweb.com/component/ticket/form.php?page=form2&docId=89200&siteId=362983&lang=en','rentabiliweb_help','toolbar=0,location=0,directories=0,status=0,scrollbars=1,resizable=1,copyhistory=0,menuBar=0,width=620,height=590');" style="color: #5c5c5c; font-weight:normal; font-size: 12px; text-decoration: none;">Technical support</a>            </div>
        </td>
    </tr>
	</table>
</td></tr></table>
            <p style="text-align: center;">
				Ce mois-ci vous avez acheté <?php echo $nombre_paiements; ?> codes sur 30.
            </p>
		</p>
		<?php
        }
		else
		{
			?>
            <p>Afin de ne pas dégrader la qualité de jeu, nous avons décidé de limiter les paiements sur chaque compte.<br />
			Nous sommes désolés, vous avez atteint le seuil maximal d'achat rentabiliweb ce mois-ci (La limite étant de 30 codes/mois et par compte).<br />
			Vous pourrez racheter des codes dès le mois prochain...</p>
            <?php
		}
	}
	else
	{
	?>
	<p>Vous devez être connectés pour acheter un code rentabiliweb.<br />
	Si le site affiche que vous êtes déjà connectés, déconnectez-vous et reconnectez-vous.<br>
       ( Si le problème persiste veuillez utiliser un autre navigateur, tels qu'Internet Explorer ou Mozilla Firefox)

</p>
	<?php
	}
	?>
</br>
<h3 style="text-align:center;">Bonus en fonction du nombre de codes achetés :</h3>
<p style="text-align:center;">
Du 1er au 4e code = 100 points pour chaque code,<br />
Du 5e au 9e code = 110 points pour chaque code,<br />
Du 10e au 14e code = 130 points pour chaque code,<br />
Du 15e au 19e code = 150 points pour chaque code,<br />
Le 20e au 24e code = 200 points pour chaque code,<br />
Le 25e au 29e code = 250 points pour chaque code,<br />
Le 30e code = 500 points pour ce dernier code !
</p>
<br />

Où va cet argent ? / Pourquoi proposez-vous ce système ?<br /><br />
Ce système permet de payer les frais de fonctionnement, comme  les serveurs (soit plus de 12 serveurs dédiés actuellement), ainsi que tout autres frais permettant l'amélioration de la qualité de jeu.
Il n'est bien sûr pas obligatoire de payer pour pouvoir jouer sur nos serveurs, mais sans cette solution, Feriale n'aurait pas pus devenir ce qu'il est aujourd'hui.
<br />
<br />
Un grand merci à toutes les personnes qui ont, ou qui participeront aux paiements, de la part de toute l'équipe de Feriale ;)
<br />
	<h1><a href="../index.php" title="Feriale"> Cliquez ici si vous voulez revenir sur Feriale. </a></h1><br />
<br />
</div>
	</body>

</html>
<br>
<br />