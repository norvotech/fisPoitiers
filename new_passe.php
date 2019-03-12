<html lang="en">
<head>
  <title>CHANGE PASS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="adminpanel/view/moderateur/css/bootstrap.min.css">
  <script src="adminpanel/view/moderateur/js/jquery.min.js"></script>
  <script src="adminpanel/view/moderateur/js/bootstrap.min.js"></script>
</head>


<?php 

session_start();
echo"les POST". var_dump ($_POST);
echo"les GET". var_dump ($_GET);

$connect_host='0';

if ($connect_host> 0)    {$db_host = "localhost";$db_base = "creps54_inscription";$db_user = "creps54_creps54";$db_pass = "vr5qaa5wyx04lo40k8";} else {$db_host = "localhost:3306";$db_base = "inscription";$db_user = "root";$db_pass = "";}

	include('header.php');
///////////
//connexion 
///////////
if ( $serveur = mysql_connect($db_host,$db_user,$db_pass) )  {

	if ( mysql_select_db($db_base,$serveur) ) {

	} else {

		echo "<li>La base $db_base n'existe pas.</li>";

	}

} else {

	echo "<li>Le serveur $db_host n'est pas accessible.</li>";

	echo '<SCRIPT>javascript:window.close()</SCRIPT>';	

}

//////////

	
	if (isset($_GET['loop'])){$loop=$_GET['loop'];} else{$loop=0;}
	if (isset($_POST['mail'])){
			
		
		$mail=$_POST['mail'];
		if(!empty ($mail)){
		$reqSQL = "SELECT * FROM JejeScriptMembres WHERE email= '$mail'";
		$resSQL = mysql_query($reqSQL) or die('Requ?te invalide : ' . mysql_error()) ;
		echo $nblig = mysql_num_rows($resSQL);
		$ligSQL = mysql_fetch_array($resSQL);
		$a=$ligSQL[0];
		////si le mail  existe 
	
			if($nblig>0)
	
			{
	
	////// cryptage
				
/*				echo "<SCRIPT>javascript:window.open ('change_pass_internet.php?mail=".addslashes(urlencode(serialize($a)))."')</SCRIPT>";
*/
			echo '<div class="modif-pass-wrap">

			<div class="title">changez votre mot de passe <span class="exp-pseudo"> </span></div>
			<form action="new_passe.php?loop=4" method="post">';
			if(!empty($_POST['changerPass'])) {
				extract($_POST);
				echo '<div style="text-align:center;">
				'.Membre::newPass2($mail, $newPassUn, $newPassDe).'
				
				</div>';
				}
			echo '<div class="clear">
			<div class="clear"><div class="label">Votre nouveau mot de passe : </div><input class="input" type="text" name="newPassUn"></div>
			<div class="clear"><div class="label">Confirmer votre nouveau mot de passe : </div><input class="input" type="text" name="newPassDe"></div>
			<div class="clear" ><input type="submit" value="Valider le nouveau mot de passe" name="changerPass" class="button">
			</form> 
			</div>';


	
	
	
	

			///envoi du mail pour verifier qui demande le mot de pass

						$mailSent = false; // drapeau qui aiguille l'affichage du formulaire OU du r?capitulatif  

						 $to='jean-louis.bourgon@creps-lorraine.sports.gouv.fr';

						 $ip = $_SERVER['REMOTE_ADDR'];

						 $subject = 'le sujet';

						 $message = 'Récupération du mot de passe';

						 $message.= var_dump( get_host($ip) );

						 $headers = 'From: formation@creps-lorraine.sports.gouv.fr' . "\r\n" .

						'X-Mailer: PHP/' . phpversion(); 

						 $headers .= 'Bcc: jean-louis.bourgon@creps-lorraine.sports.gouv.fr' . "\r\n";

						 $headers .= $mail."\r\n";

						 mail($to, $subject, $message, $headers);

						 
///// si l'on ne trouve pas de mail dans la base $nblig=0

								
								
			}

			else{
			//si le mail est saisi mais pas reconnue
			echo '<body onLoad="alert(\'Ce mail est inexistant! Votre adresse IP a été enregistrée.\')">';

								$ip = $_SERVER['REMOTE_ADDR'];
								echo "Bonjour ceci est votre IP: $ip ";	
								$to1='jean-louis.bourgon@creps-lorraine.sports.gouv.fr';

									$subject1 = 'Détection d\'hackers avec un mail exesitant';

									$message1=var_dump( get_host($ip) );

									$message1.=$ip ;
									
									$message1.= $mail;
									
									mail($to1, $subject1, $message1);

										echo "<SCRIPT>javascript:window.location.href='new_passe.php?loop=2'</SCRIPT>";
			
			}

	/// fin du empty login	

	}

					else

					///si pas de mail verification qu'il y a un mai lde saisi

					

					{echo '<body onLoad="alert(\'Vous devez saisir une adresse courriel!\')">';
					
					echo "<SCRIPT>javascript:window.location.href='new_passe.php?loop=1'</SCRIPT>";
				} //// fin du empty du mail vide


		

		
		
				
			} else {
				
					echo '<div class="jumbotron">';

		echo'<form  method="post" action="new_passe.php">';
		
		echo '<div align="center"><img src="images/logo.png" width="193" height="83" />
			<div class="panel panel-primary">
			  <div class="panel-heading">';
			  
			  switch ($loop){
				  case'1':
				  echo'Le problème: vous devez remplir une adresse courriel dans le champs.</h3>';
				  break;
				  case'2':
				  echo'<h3>Le problème: votre adresse courrier est erronnée. votre saisie a été enregistrée.</h3>';
				  break;
				  case'3':
				  echo'<h3>Votre mail ne correpond pas à celui saisi lors de votre inscription.</h3>';
				  break;
				   case'4':
				  echo'<h3>Votre mot de passe est changé. Le service des formations en a été informé.</h3>';
/*				  echo "<SCRIPT>javascript:window.location.href='new_passe.php?loop=1'</SCRIPT>";
*/				  break;
				  default:
				  echo'<h3>Indiquez votre adresse e-mail pour renouveler votre MOT DE PASSE.</h3>';
				  			  
				  break;
				  
				  }
			 echo' </div>
			  <div class="panel-body">
			   <a href="#demo" data-toggle="collapse"><span class="glyphicon glyphicon-lock"></span> cliquez ici pour saisir votre adresse Email </a>
		
							<div id="demo" class="collapse">
							<input class="input" type="text" name="mail">
							<button type="submit" class="btn btn-success" id="action">Valider</button></div></div>
							</div>
							</div>
							
			</div></div>';
		
		?>
		
		</form> 
		
		<?php
 
 				
					}
		include('footer.php');



?>

