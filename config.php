<?php 
$debeug=0;
	$monUrl ='http://' . $_SERVER['SERVER_NAME'];
	$monUrl = filter_var($monUrl, FILTER_VALIDATE_URL);
	if ($monUrl!='http://localhost')
	{
	  $init=1;
	}else{
	 $init=0;
	}
if ($init>0){
$PARAM_hote        = '10.0.239.70'; 
$PARAM_nom_bd      = 'fiscreps86_inscription'; 
$PARAM_utilisateur = 'fiscreps86'; 
$PARAM_mot_passe   = 'hVTqM9ZGb5kZ'; 
$PARAM_nom_site    = 'Base des formations et Fis '; 
$PARAM_mail_site   = 'jlouis.bourgon@hotmail.fr'; 
///formation
$PARAM_url_site    = 'http://www.creps86.fr/fis/pgf/'; 
$PARAM_nom_bd2		 = 'fiscreps86';
/*
$PARAM_hote        = 'localhost'; 
$PARAM_nom_bd      = 'creps54_inscription_demo'; 
$PARAM_utilisateur = 'creps54_creps54';
$PARAM_mot_passe   = 'vr5qaa5wyx04lo40k8'; 
$PARAM_nom_site    = 'Base des FIS'; 
$PARAM_mail_site   = 'jlouis.bourgon@oriontronic.com';
$PARAM_url_site    = 'http://fis2018.crepsnancyformation.com/'; 
$PARAM_nom_bd2		 = 'creps54_fis';	
*/
} else {

$PARAM_hote        = 'localhost'; 
$PARAM_nom_bd      = 'inscription_dijon';
//$PARAM_nom_bd      = 'prodoc_acces'; 
$PARAM_utilisateur = 'root'; 
$PARAM_mot_passe   = ''; 
$PARAM_nom_site    = 'DATA BASE FIS'; 
$PARAM_mail_site   = 'jlouis.bourgon@oriontronic.com';
$PARAM_url_site    = 'http://localhost/formation_poitiers';
//$PARAM_url_site    = 'http://localhost/formation_rogue_oneVraza/';
//$PARAM_url_site    = 'http://192.168.50.242/formation_rogue_one/';
// 2e base : formation
$PARAM_nom_bd2 = 'formation_poitiers';
}



?>
