<?php session_start();
include('function.php');

	// Créer l'historique de la déconnexion du membre
	if (isset($_SESSION['jeton'])){

		if (!(empty($_SESSION['nom']))) {
			Historique::creerActionFis('Déconnexion');
		}
	}
Connexion::deconnexion('index.php');
?>