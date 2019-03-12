<?php session_start();
include('header.php');
Connexion::deconnexion($redirection = "");
echo '<div class="install-wrap">
<div class="clear">
<div class="title-admin-active"><p>Vous devez activer votre compte.</p>
<p>Un Email vous permettant d\'activer votre compte vous a &eacute;t&eacute; envoy&eacute;.<br>
Pensez &agrave; v&eacute;rifier dans votre dossier Spams.</p></div>
</div>
</div>';
include('footer.php');
?>