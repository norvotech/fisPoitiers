<?php
include('../function.php');
ProtectEspace::administrateur($_SESSION['id'], $_SESSION['captcha'], $_SESSION['jeton'], $_SESSION['niveau']);
Historique::creerAction('Connexion au site');
echo '<!DOCTYPE HTML>
<html>
<head>
<title>PGF Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../design/black-style.css">
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../adminpanel/view/moderateur/js/w3.css">
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/font-awesome.min.css">

<script src="jquery/jquery.min.js"></script>
<script src="../adminpanel/view/moderateur/vendor/jquery/jquery.min.js"></script>';
	  
echo'<link rel="stylesheet" type="text/css" href="js/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="datatables-responsive/dataTables.responsive.css">';

echo '</head>
<body>';
?>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script>
$('#liste').dataTable( {
    paging: false,
    searching: false
} );
</script>

<!--
elevé le 11/10/2018
le 3 D est dans <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="datatables/css/dataTables.bootstrap.css">-->