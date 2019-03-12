<?php
	session_start();
	require_once('function.php');
	require_once('adminpanel/controller/indexFormController.php');

	$debeug=0;
	if (!empty ($debeug)){
				if ($debeug==1){
					echo'  <div id="page-wrapper"> <div class="container-fluid">
				   
					<div class="row">
					<div class="col-lg-2"></div>
						<div class="col-lg-10">';
						ini_set('display_errors','on');
						error_reporting(E_ALL);
						echo var_dump($_POST);
						echo var_dump($_GET);
						echo'SESSION';
						echo var_dump($_SESSION);
						echo'</div> 
						PAGE INDEX PRINCIPALE DU SITE
						
						</div></div></div>';
						}
					}
	include('header.php');	
	Index::dispatcher();
	include('footer.php');
	
	

?>