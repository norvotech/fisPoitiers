<?php

include('header.php');
	
	/** inscriptions actives **/
	function getFormaActive(){
    $stmt = Bdd2::connectFormation()->query("SELECT Actif_inscription FROM formation where Actif_inscription='1' ");
    $stmt->execute();
    $resSQL = $stmt->fetchAll();
	$nbActif = $stmt->rowCount();

     return $nbActif;
	
	}
$actif=getFormaActive();
if ($actif>0){

echo '<div class="modif-pass-wrap">

<h2 align ="center">Portail des formations</h2>

<h2 align ="center">au</h2>

<h2  align ="center"> CREPS de Lorraine</h2>

<div>Remplir les champs suivants pour rejoindre votre espace personnel et vous permettre de:</div>

<div >
<ul class="list-group">
<li>Vous inscrire.</li>

<li>Suivre votre dossier. </li>

<li>Suivre votre formation. </li>

</ul>
Il y a <strong>'.getFormaActive().'</strong> formation(s) ouverte(s) à l\'inscription.

<br> </br>

<div class="title">Créer un compte</div>

<form action="" method="post">';

if(!empty($_POST['inscription'])) {

	extract($_POST);
	///passer les nom et prenom en majuscule
	$nom= strtoupper ($nom);
	$prenom= strtoupper ($prenom);

	echo Inscription::inscrire($nom, $prenom, $identifiant, $email, $passeUn, $passeDe);

}

echo '

<div class="clear"><div class="label">Votre Nom (en majuscules) : </div><input class="input" type="text" name="nom"></div>

<div class="clear"><div class="label">Votre Prenom (en majuscules): </div><input class="input" type="text" name="prenom"></div>

<div class="clear"><div class="label">Choisissez un identifiant : </div><input class="input" type="text" name="identifiant"></div>

<div class="clear"><div class="label">Votre adresse Email : </div><input class="input" type="text" name="email"></div>

<div class="clear"><div class="label">Votre mot de passe : </div><input class="input" type="text" name="passeUn"></div>

<div class="clear"><div class="label">Confirmer votre mot de passe : </div><input class="input"  type="text" name="passeDe"></div>

<div class="clear"><input type="submit" value="Valider"  name="inscription" class="button"></div>

</form> 

</div>';
} else {echo'<div class="modif-pass-wrap"><h2 align ="center">Portail des formations</h2>

<h2 align ="center">au</h2>

<h2  align ="center"> CREPS de Lorraine</h2>';
	echo' <div class="clear"><center>  </div>';
	echo' <div class="clear"><center> Il n\'y a pas d\'inscriptions ouvertes pour pouvoir créer un compte.</div></div>';
	
	}


include('footer.php');

?>