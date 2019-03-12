<?php session_start();
include('header.php');
Connexion::deconnexion($redirection = "");
echo '<div class="install-wrap">
<div class="clear">
<div class="title-admin-active"><p>Vous compte doit etre activ&eacute; par l\'administrateur ou un mod&eacute;rateur du site.</p>
<p>Vous recevrez un Email une fois cette validation effectu&eacute;e.<br>
Pensez &agrave; v&eacute;rifier dans votre dossier Spams.</p></div>
</div>
</div>';
include('footer.php');
?>