<?php
////	INIT
define("CONTROLE_SESSION",false);

////	ENVOI DU MAIL DE REINITIALISATION DU MOT DE PASSE (validé dans "global.inc.php")
////
if(isset($_POST["mail"]))
{
	$infos_user = db_ligne("SELECT * FROM gt_utilisateur WHERE mail=".db_insert($_POST["mail"])." AND mail!=''");
	if(count($infos_user)==0)	{ alert($trad["PASS_OUBLIE_mail_inexistant"]); }
	else
	{
		// Init
		$id_newpassword = mt_rand(1000000000,9999999999);
		$adresse_confirmation = $_SESSION["agora"]["adresse_web"]."/index.php?id_utilisateur=".$infos_user["id_utilisateur"]."&id_newpassword=".$id_newpassword;
		// Envoi du mail pour vérificaton
		$contenu_mail  = $trad["PASS_OUBLIE_mail_contenu"]." :&nbsp; <b>".$infos_user["identifiant"]."</b><br /><br />";
		$contenu_mail .= "<a href=\"".$adresse_confirmation."\" target=\"_blank\"><b>".$trad["PASS_OUBLIE_mail_contenu_bis"]."</b></a>";
		$envoi_mail = envoi_mail($_POST["mail"], $trad["PASS_OUBLIE_mail_objet"], $contenu_mail);
		// On ajoute l'invitation temporaire & ferme popup
		if($envoi_mail==true)	db_query("UPDATE gt_utilisateur SET id_newpassword='".$id_newpassword."' WHERE id_utilisateur='".$infos_user["id_utilisateur"]."'");
		echo "<script> window.close(); </script>";
		exit;
	}
}
?>


<style type="text/css">  body { background-image:url(<?php echo PATH_TPL; ?>module_mail/fond_popup.png); }  </style>
<script type="text/javascript">
////	Redimensionne
window.resizeTo(580,230);

////    On contrôle du mail
function controle_formulaire()
{
	if(controle_mail(get_value("mail"))==false)		{ alert("<?php echo $trad["mail_pas_valide"]; ?>"); return false; }
}
</script>

<form action="" method="post" style="margin-top:40px;text-align:center;" OnSubmit="return controle_formulaire();">
	<div><b><?php echo $trad["PASS_OUBLIE_preciser_mail"]; ?></b></div><br />
	<input type="text" name="mail" style="width:200px" />
	<input type="submit" value="<?php echo $trad["envoyer"]; ?>" class="button" />
</form>

