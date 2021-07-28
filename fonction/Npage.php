   <div style='vertical-align: top; text-align: center; height:20px; width:100px; margin-bottom:5px; position: relative; bottom:0px; float: right;'>
   <style type="text/css">
   
   .Numerodepage<?php
	$Npage=$joueur->Npage;
    echo $Npage; ?>
   {   	
	font-weight:bold;
	font-size:19px;
   }
   </style>
    
    
    <?php
$connect = connection($DBSite);        
        $req3 = mysql_query("SELECT COUNT(*) as nombrepage FROM ".$prefixtable."article WHERE id_referantpage = ".$joueur->id_page." AND visible = 1 AND acce = 0");
        $row3 = mysql_fetch_array($req3);
        $nombreP = $row3['nombrepage'];
	$nombreP= $nombreP/5;
	$i=1;
	if( $nombreP >=1)
	{
	while( $nombreP >=0)
	{
	if( $i >1 )
	{
	echo " | <span class='Numerodepage".$i."'><a href='index.php?id_page=".$joueur->id_page."&Npage=".$i."'>".$i."</a></span>";
	$nombreP=$nombreP-1;
	$i++;
	}
	else{
	echo "<span class='Numerodepage".$i."'><a href='index.php?id_page=".$joueur->id_page."&Npage=".$i."'>".$i."</a></span>";
	$nombreP=$nombreP-1;
	$i++;
	}
	}
	}
	?>
    
    
    
    
    
    
    
    
    
   </div>     