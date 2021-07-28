<?php


function connection($base,$sql_royaume=false,$royaume=-1){

	if($royaume===-1){
		$connect = mysql_connect(db_adr,db_user,db_mdp);
		mysql_select_db($base,$connect);
	}else{
		$connect = mysql_connect($sql_royaume[$royaume][0],$sql_royaume[$royaume][1],$sql_royaume[$royaume][2]);
		mysql_select_db($sql_royaume[$royaume][3],$connect);
	}
	return $connect;
}
function connectionrec($base,$sql_royaume=false,$royaume=-1){

	if($royaume===-1){
		$connect = mysql_connect(db_adr,db_user,db_mdp);
		mysql_select_db($base,$connect);
	}else{
		$connect = mysql_connect($sql_royaume[$royaume][0],$sql_royaume[$royaume][8],$sql_royaume[$royaume][9]);
		mysql_select_db($sql_royaume[$royaume][3],$connect);
	}
	return $connect;
}


// MJ Débutant
function connexion_6()
{
	mysql_connect ("79.143.179.66","sitelectmj2","coCHe7CBJiCR3CHa");
	mysql_select_db("mjdeb-char");
}

// MJ Intermédiaire
function connexion_7()
{
	mysql_connect ("193.104.56.36","sitelectmj1","2PWEh36xaD3WL80e");
	mysql_select_db("mjint-char");
}

// MJ Pro
function connexion_8()
{
	mysql_connect ("193.104.56.36","sitelectmj1","2PWEh36xaD3WL80e");
	mysql_select_db("mjpro-char");
}

// MJ Pro reserve
function connexion_10()
{
	mysql_connect ("79.143.179.66","sitelectmj2","coCHe7CBJiCR3CHa");
	mysql_select_db("mjpro2-char");
}


// Fun
function connexion_2()
{
	mysql_connect ("188.165.210.193","sitelectfun","rlWkx8T0EliGYct1");
	mysql_select_db("fun333-char");
}

// Blizz
function connexion_3()
{
	mysql_connect ("193.34.145.59","sitelectblizz","WMmE35gEGE8Y21QR");
	mysql_select_db("blizz-333-char");
}

// RP 
function connexion_4()
{
	mysql_connect ("193.104.56.35","sitelectrp","V8YnWRj0e5mCSFJf");
	mysql_select_db("rp-333-char");
}

// Twink 19-39
function connexion_0000()
{
	mysql_connect ("94.23.217.148","site01","dNV6tA05xDmspFsq");
	mysql_select_db("characterstwink39");
}

// PvP 3.3
function connexion_1()
{
	mysql_connect("188.165.210.192","sitelectpvp","kX21M390isHjA8mn");
	mysql_select_db("pvp-333-char");
}

// Twink 60
function connexion_5()
{
	mysql_connect ("193.104.56.37","sitelecttwink60","R65sFgN7Mv5Sxx2O");
	mysql_select_db("t60-333-char");
}

?>
