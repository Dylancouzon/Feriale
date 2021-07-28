<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<link rel="SHORTCUT ICON" href="http://127.0.0.1/feriale/images/icone_navigateur.ico" type="image/x-icon" />
<link rel="stylesheet" href="designMozilla.css" type="text/css" />
<head>
	<title>Feriale</title>
</head>

<body>
	<div id='connexion'>
		<?php require_once ("connexion_header.php");
		
		
		?>
	</div>



	<div id='corpus'>
		<div id='logo_feriale'><a href='<?php echo $urlindex ;?>'>
			<img src="images/theme/defaut/logo_feriale_offclick.PNG" onmouseover="this.src='images/theme/defaut/logo_feriale_onclick.PNG';" onmouseout="this.src='images/theme/defaut/logo_feriale_offclick.PNG';" name="Feriale" /></a>
		</div>

		<div id='menu_horizontal'>
			<ul>
				 <li class='menu_horizontal_1'>
					<a href="index.php?id_page=12"><img style='margin-top:66px; margin-left:0px' src="images/theme/defaut/menuH/texte/menu_horizontal_1_offclick.PNG" onmouseover="this.src='images/theme/defaut/menuH/texte/menu_horizontal_1_onclick.PNG';" onmouseout="this.src='images/theme/defaut/menuH/texte/menu_horizontal_1_offclick.PNG';" name="Consultez l'Armurie" /></a>
				</li>
				 <li class='menu_horizontal_2'>
					<a href="index.php?id_page=9"><img style='margin-top:67px; margin-left:3px' src="images/theme/defaut/menuH/texte/menu_horizontal_2_offclick.PNG" onmouseover="this.src='images/theme/defaut/menuH/texte/menu_horizontal_2_onclick.PNG';" onmouseout="this.src='images/theme/defaut/menuH/texte/menu_horizontal_2_offclick.PNG';" name="Votez pour F�riale" /></a>
				</li>
				 <li class='menu_horizontal_3'>
					<a href="<?php echo $urlforum; ?>" target=_blank><img style='margin-top:65px; margin-left:3px' src="images/theme/defaut/menuH/texte/menu_horizontal_3_offclick.PNG" onmouseover="this.src='images/theme/defaut/menuH/texte/menu_horizontal_3_onclick.PNG';" onmouseout="this.src='images/theme/defaut/menuH/texte/menu_horizontal_3_offclick.PNG';" name="Visitez notre Forum" /></a>
				</li>
				 <li class='menu_horizontal_4'>
					<a href="index.php?id_page=80"><img style='margin-top:70px; margin-left:3px' src="images/theme/defaut/menuH/texte/menu_horizontal_4_offclick.PNG" onmouseover="this.src='images/theme/defaut/menuH/texte/menu_horizontal_4_onclick.PNG';" onmouseout="this.src='images/theme/defaut/menuH/texte/menu_horizontal_4_offclick.PNG';" name="Voir les classements" /></a>
				</li>
			</ul>	
		</div>
		<div id='middle'>
		
   			<div id='menu_gauche'>
				<?php include ("menuG.php"); ?>
			</div>
		<div id='centre'>
				<?php include ("affichage_centre.php"); ?>
			</div>
            <div id='menu_droite'>
				<?php include ("menuD.php"); ?>
			</div>           
		</div>
   <div style='vertical-align: top; text-align: center; height:160px; width:1100px; margin-bottom:0px; padding-bottom:0px; position: relative; bottom:0px; float: right; background-image: url("images/theme/defaut/footer_site.JPG"); background-position:bottom'>
   <img src='images/theme/defaut/footer_ligne1.PNG' style='position: relative; top:20px'/><br />
   <a href='http://www.graftech.fr' target="_blank"><img src='images/theme/defaut/graftech.PNG' style='position: relative; top:-5px' /></a><br />
      <img src='images/theme/defaut/footer_ligne3.PNG' style='position: relative; top:-30px' /><br />
         <img src='images/theme/defaut/footer_ligne4.PNG' style='position: relative; top:-50px' />
   </div>     
    </div>
</body>
</html>