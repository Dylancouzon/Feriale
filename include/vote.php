<div align="center"><strong>
<?php
if( $joueur->rang ==0)
{
echo "<strong><span style='color: red'>ATTENTION VOUS N'&Ecirc;TES PAS CONNECT&Eacute; AU SITE LES POINTS DE VOTES NE VOUS SERONT PAS CR&Eacute;DIT&Eacute;S	.</span></strong><br /><br /><br />
<a href='http://www.gowonda.com/vote.php?server_id=652' target='_blank'><img src='http://www.gowonda.com/vote.gif' target='_blank' /></a><br /><br />
<a href='http://www.topwow.fr/in.php?id=2436' target='_blank'><img src='http://www.topwow.fr/bouton.gif' target='_blank' /></a><br /><br />
<a href='http://www.rpg-paradize.com/?page=vote&vote=6570' target='_blank'><img src='http://www.rpg-paradize.com/vote.gif' target='_blank' /></a><br />
"; 
}
else{

echo "</strong>Cliquez sur le lien ci dessous pour voter:<br /><br />";
$now = time();
$vote2='block';
$vote3='block';
if($now > $joueur->vote[1] + 7200){
	echo '<span id="vote_1" onclick="create_frame(\'http://www.gowonda.com/vote.php?server_id=652\',1)"><img id="img_vote_1" src="http://www.gowonda.com/vote.gif" /></span>';
	$vote2='none';
	$vote3='none';
	
}else{
	echo '<img onclick="alert(\'Vous avez deja voter surce top\')" src="images/logo_vote1.jpg" />';
}
echo '<br /><br />ATTENTION : Ne pas utiliser Internet Explorer comme navigateur Web, <br /> car il bloque vos votes sur le top de Gowonda.<br /><br />';
if($now > $joueur->vote[2] + 7200){
	echo '<div id="vote_2" style="display:'.$vote2.'">Merci, le vote de Gowonda vous a rapporté 2 points. Vous pouvez maintenant cliquer sur le lien ci-dessous.<br /><a href="http://www.rpg-paradize.com/?page=vote&vote=6570" target="_blank" onclick="file(\'include/vote1.php?vote=2\');document.getElementById(\'img_vote_2\').src=\'images/logo_vote3.jpg\';document.getElementById(\'vote_3\').style.display=\'block\'"><img src="http://www.rpg-paradize.com/vote.gif" id="img_vote_2" /> </a></div>';
	$vote3='none';
}else{
	echo '<img onclick="alert(\'Vous avez deja voter sur ce top\')" src="images/logo_vote3.jpg" />';
}
echo '<br /><br />';
if($now > $joueur->vote[3] + 7200){
	echo '<div id="vote_3" style="display:'.$vote3.'">Merci, le vote de RPG Paradize vous a rapporté 2 points. Vous pouvez maintenant cliquer sur le lien ci-dessous.<br /><strong></strong><span onclick="create_frame(\'http://www.topwow.fr/in.php?id=2436\',3)"><img src="http://www.topwow.fr/bouton.gif" id="img_vote_3" /></span></div><br />';
}else{
	echo '<img onclick="alert(\'Vous avez deja voter sur ce top\')" src="images/logo_vote2.jpg" />';
}
echo '<span id="fin_vote" style="display:none">Merci, le vote de Top WoW vous a rapport&eacute; 2 points. </span>';

?>
<div style='visibility:hidden'>
<script type="text/javascript">
num_vote=1;
function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     }
	 count=0;
	/* document.getElementById('vote').onload=ok;
window.addEvent('domready', function() {
	alert('e');
	document.getElementById('vote').onreadystatechange=ok;
		
	}

}*/
count=0;
function ok(){
	count++;
		if(count==2){
			file('include/vote1.php?vote='+num);
			num_vote++;
			if(num_vote==2){
				document.getElementById('vote_2').style.display = 'block';
				document.getElementById('img_vote_1').src="images/logo_vote1.jpg";
			}else if(num_vote==3){
				document.getElementById('fin_vote').style.display = 'block';
				document.getElementById('img_vote_3').src="images/logo_vote2.jpg";
			}
			del_frame();
		}
}
function create_frame(source,n){
	taille();
	num = n;
	var frame = document.createElement('iframe');
	var div	= document.createElement('div');
	div.id = 'div_vote';
	div.style.width = '1000px';
	div.style.height = '400px';
	div.style.position = 'absolute';
	div.style.left = "50px";
	div.style.top = 50+scrollH+'px';
	div.innerHTML = '<div style="border: 5px solid; border-color:black; background-color:black; color:#FDE02D"><strong> <span onclick="reload_frame()" style="font-size: 1.3em; cursor:pointer" onmouseover="this.style.color=\'red\';" onmouseout="this.style.color=\'#FDE02D\'";>Actualiser</span></strong><span style="color:black"> ...................</span>  Si vous ne voyez pas les caract&egrave;res de l\'image cliquez <span onclick="reload_frame()" style="font-size: 1.3em; cursor:pointer" onmouseover="this.style.color=\'red\';" onmouseout="this.style.color=\'#FDE02D\'">ICI</span><span style="color:black">..........................</span></span><span onclick="del_frame()" style="cursor:pointer; font-size: 1.3em" onmouseover="this.style.color=\'red\';" onmouseout="this.style.color=\'#FDE02D\'"><strong>Fermer   X</strong></span> <br /><div id="f"><span style="color:black">...</span><span style="font-size:0.8em; font-style: italic">(Si apr&egrave;s plusieurs tentatives vous ne voyez toujours pas les caract&egrave;res, veuillez installer et utiliser le navigateur <strong><a style="color:#FDE02D" href="http://www.mozilla-europe.org/fr/firefox/" onmouseover="this.style.color=\'red\';" onmouseout="this.style.color=\'#FDE02D\'">Mozilla Firefox</a></strong> pour voter.)</span></div>';
	frame.id = 'vote';
	frame.src = source;
	frame.onload = ok;
	frame.width = '1000px';
	frame.height = '650px';
	document.body.appendChild(div);
	document.getElementById('f').appendChild(frame);
	
}
function reload_frame(){
	count=0;
	document.getElementById('vote').src = document.getElementById('vote').src;
}
function del_frame(){
count=0;
document.body.removeChild(document.getElementById('div_vote'));
}	
function taille(){
scrollH = 0;
scrollW = 0;
windowH = 0;
windowW = 0;

if (document.doctype == null || document.documentElement.clientHeight == 0){

	if (window.innerWidth || (document.body.offsetHeight == document.documentElement.offsetHeight && document.body.offsetWidth == document.documentElement.offsetWidth)){

		scrollH = document.body.scrollTop;
		scrollW = document.body.scrollLeft;
		windowH = document.body.clientHeight;
		windowW = document.body.clientWidth;
	}else{
	
		scrollH = document.documentElement.scrollTop;
		scrollW = document.documentElement.scrollLeft;
		windowH = document.documentElement.clientHeight;
		windowW = document.documentElement.clientWidth;
	}
	var i=1;
window.onbeforeunload = function(e){ if(i==1) { i=2; return 'Cliquez sur Annuler pour poursuivre le vote !'; } }

}else{

	if (document.doctype.publicId.search(/xhtml/i) != -1)	{

		scrollH = document.documentElement.scrollTop;
		scrollW = document.documentElement.scrollLeft;
	}else{

		scrollH = document.body.scrollTop;
		scrollW = document.body.scrollLeft;
	}
}

if (window.innerWidth && window.innerHeight){

	windowH = window.innerHeight;
	windowW = window.innerWidth;

}
}
</script>
</div>
<?php
}
?></strong>
</div>