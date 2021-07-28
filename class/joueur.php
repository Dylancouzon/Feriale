<?php

class joueur{

	// variable connection
	var $id;
	var $pseudo;
	var $mdp;
	var $rang;
	var $vote;
	var $ip;
	var $connecter;
	
	// variable de navigation
	var $id_page=1;
	var $Npage=1;
	
	// variable de class
	var $connect;
	var $error = false;

	function joueur($pseudo=null,$mdp=null){
		$this->set_ip($_SERVER["REMOTE_ADDR"]);
		if($joueur==null||$mdp==null){
			$this->connecter=false;
			$this->rang=0;
			$this->Npage=1;
			$this->id_page=1;
			$this->id=-1;
		}
		if(!empty($pseudo)&&!empty($mdp)){
			$this->pseudo = $pseudo;
			$this->mdp = $mdp;
			$this->connect = mysql_connect(db_adr,db_user,db_mdp);
			mysql_select_db(db_site,$this->connect);
			$this->recup_base();
		}else{
			$this->erreur('Valeur vide, Pseudo : '.$pseudo.' - Mdp : '.$mdp,__LINE__);
		}
	}
	
	function recup_base(){
		$reponse = mysql_query('SELECT * FROM realmd2.account WHERE username="'.$this->pseudo.'" AND sha_pass_hash="'.sha1(strtoupper($this->pseudo).":".strtoupper($this->mdp)).'"') or die($this->erreur(mysql_error(),__LINE__));
		if(mysql_num_rows($reponse)==1){
			$traite = mysql_fetch_array($reponse);
			$this->id = $traite['id'];
			
			$reponse = mysql_query("SELECT * FROM elios_site.elios_profil WHERE id_compte=".$this->id);
			$this->rang = 1;
			if(mysql_num_rows($reponse)==1){
				$traite=mysql_fetch_array($reponse);
				$this->rang = $traite['gradesite'];
			}
			
			$reponse = mysql_query('select * from elios_site.elios_stockageVOTE where id_compte = '.$this->id.' and num_top=1 order by date desc limit 1');
			if(mysql_num_rows($reponse)){
				$traite = mysql_fetch_array($reponse);
				$this->vote[1] = $this->convert_date($traite['date']);
			}
			$reponse = mysql_query('select * from elios_site.elios_stockageVOTE where id_compte = '.$this->id.' and num_top=2 order by date desc limit 1');
			if(mysql_num_rows($reponse)){
				$traite = mysql_fetch_array($reponse);
				$this->vote[2] = $this->convert_date($traite['date']);
			}
			$reponse = mysql_query('select * from elios_site.elios_stockageVOTE where id_compte = '.$this->id.' and num_top=3 order by date desc limit 1');
			if(mysql_num_rows($reponse)){
				$traite = mysql_fetch_array($reponse);
				$this->vote[3] = $this->convert_date($traite['date']);
			}

			
			$this->connecter=true;
		}else{
			$this->erreur('Mauvais Pseudo/Mdp',__LINE__);
		}
	}
	
	function __destruct(){
		if($this->connect!=null){
			//mysql_close();
		}
	}
	
	function set_ip($ip){
		$this->ip = $ip;
		//mysql_query('UPDATE realmd.account SET last_ip="'.$this->ip.'" WHERE id='.$this->id);
		
	}
	function convert_date($date){
		return mktime(substr($date,11,2),substr($date,14,2),substr($date,17,2),substr($date,5,2),substr($date,8,2),substr($date,0,4));
	}
	function erreur($erreur,$ligne){
		$this->error = true;
	
		$fp = fopen('erreur/erreur_class_joueur.txt','a+');
		fputs($fp,'Erreur ligne '.$ligne.' : '.$erreur."\n");
		fclose($fp);
	}

};

?>