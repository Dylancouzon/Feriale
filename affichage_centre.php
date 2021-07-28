<div id='news' style='align-text: center; background-image: url("images/NEWS/002.JPG"); background-repeat: no-repeat; background-position: center; margin-left:5px;'>
	<img src='images/theme/defaut/cadre_news.PNG' width='590px;'/>
</div>
            
        <table style='margin-bottom:30px;margin-left:5px; width:590px;'>
                <tr>
                    <td>
                        <img style='margin-left: 69px; margin-bottom: 15px; margin-top:5px	' src='images/theme/defaut/separateur.PNG' />
                    </td>
                </tr>
            <?php
            // $articledebut1 = $joueur->Npage*5;
            // $articledebut = $articledebut1-5;
            // $articlefin1 = $joueur->Npage*5;
            // $articlefin = $articlefin1+1;
           // $newsR = mysql_query("SELECT * FROM ".$prefixtable."article WHERE id_referantpage = ".$joueur->id_page." AND visible = 1 AND acce <= ".$joueur->rang." AND ordre > ".$articledebut." AND ORDRE < ".$articlefin." ORDER by ordre ASC");


 			// $articledebut1 = $joueur->Npage*5;
            // $articledebut = $articledebut1-5;
            // $articlefin1 = $joueur->Npage*5;
            // $articlefin = $articlefin1+1;
            // $connect = connection($DBSite);
			// $newsR = mysql_query("SELECT * FROM ".$prefixtable."article WHERE id_referantpage = ".$joueur->id_page." AND visible = 1 AND acce <= ".$joueur->rang." AND ordre > ".$articledebut." AND ORDRE < ".$articlefin." ORDER by ordre ASC");
			//            mysql_close($connect);
            // while($newsT = mysql_fetch_array($newsR))
            //     {
            ?>


<!-- News 1 -->
                <tr>
                    <td class='middle_top'>
                        <div style='float: left; margin-top: -5px; margin-left:30px;'>
                            <img src='images/theme/defaut/logo/1.PNG' />
                        </div>
                        <div style='width: 300px; height:20px; margin-left:5px; margin-top:0px; float: left;	'>
                            News
                        </div>
                        <div style='width: 100px; height:20px; margin-right:90px; margin-top:9px; float: right; font-size: 14px;'>
                        Dylan Couzon
                        </div>
                        <div style='margin-right: 20px; float:right; position:relative; left: 200px; top:-10px'>    	

                                                    <div style='margin-top:0px; margin-right:1px; float: right;'>
                                     <div id='hnews1' style='' 
                                            onclick="document.getElementById('news1').style.display='none'; 
                                                    document.getElementById('bnews1').style.display='';
                                                    document.getElementById('hnews1').style.display='none';">
                                        <img src='images/theme/defaut/fleche_haut.JPG' />
                                    </div>
                                    <div id='bnews1' style='display:none' 
                                            onclick="document.getElementById('news1').style.display=''; 
                                                    document.getElementById('hnews1').style.display='';
                                                    document.getElementById('bnews1').style.display='none';
                                                    ">
                                        <img src='images/theme/defaut/fleche_bas.JPG' />
                                    </div>
                                </div>
                        </div>
                    </td>
                </tr>
                <tr id='news1' style=''>
                    <td class='middle_middle'>
                      <h2>Welcome to Feriale</h2>
                      <strong>I created this website using HTML, CSS, Javascript, PHP, and MySql in 2010 and maintained it for over 2 years</strong><br ><br>
                      <strong>This is for showcase only and most functionalities are deactivated</strong>
                    </td>
                </tr>
 <?php     
 for ($x = 2; $x <= 8; $x++) {                        
echo" <tr>
                    <td class='middle_top'>
                        <div style='float: left; margin-top: -5px; margin-left:30px;'>
                            <img src='images/theme/defaut/logo/{$x}.PNG' />
                        </div>
                        <div style='width: 300px; height:20px; margin-left:5px; margin-top:0px; float: left;	'>
                            News Title
                        </div>
                        <div style='width: 100px; height:20px; margin-right:90px; margin-top:9px; float: right; font-size: 14px;'>
                        Author
                        </div>
                        <div style='margin-right: 20px; float:right; position:relative; left: 200px; top:-10px'>    	

                                                    <div style='margin-top:0px; margin-right:1px; float: right;'>
                                     <div id='hnews{$x}' style='display:none' 
                                            onclick=\"document.getElementById('news{$x}').style.display='none'; 
                                                    document.getElementById('bnews{$x}').style.display='';
                                                    document.getElementById('hnews{$x}').style.display='none';\">
                                        <img src='images/theme/defaut/fleche_haut.JPG' />
                                    </div>
                                    <div id='bnews{$x}' style='' 
                                            onclick=\"document.getElementById('news{$x}').style.display=''; 
                                                    document.getElementById('hnews{$x}').style.display='';
                                                    document.getElementById('bnews{$x}').style.display='none';
                                                    \">
                                        <img src='images/theme/defaut/fleche_bas.JPG' />
                                    </div>
                                </div>
                        </div>
                    </td>
                </tr>
                <tr id='news{$x}' style='display: none'>
                    <td class='middle_middle'>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida, leo vel iaculis mollis, urna diam gravida sapien, suscipit viverra enim metus sit amet nisl. Donec mauris magna, ullamcorper a dapibus ut, feugiat sed turpis. Donec auctor nisi ac ipsum cursus, id elementum elit lacinia. In dapibus a felis vel convallis. Fusce sed finibus urna. Nam cursus est sed elit consectetur pellentesque in et lorem. Praesent rutrum nunc varius felis cursus, vitae tempus ex rutrum. Curabitur augue lectus, lacinia in pretium vel, tincidunt eu ex. Donec tellus dolor, tristique et lorem quis, iaculis sagittis metus. Aliquam id mi sollicitudin, luctus lectus quis, sagittis purus. Nullam sed tellus at tellus vestibulum sagittis. Nunc accumsan, orci sit amet sollicitudin ultricies, augue velit porttitor nunc, nec mollis massa risus vel nibh. Donec rutrum mi quis pulvinar convallis. Ut eu neque lorem. Curabitur vulputate vehicula turpis non consectetur.</p>
                    </td>
                </tr>
";
 }
                ?>

                <tr>
                    <td>
                        <img style='margin-left: 69px; margin-bottom: 5px; margin-top:2px	' src='images/theme/defaut/separateur.PNG' />
                    </td>
                </tr>
        </table>