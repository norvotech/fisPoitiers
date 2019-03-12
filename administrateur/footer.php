<?php
require_once('../adminpanel/controller/preInscriptionController.php');
echo '<footer class="footer-info">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
   <p>Copyright &copy; 2016 V 3.0 | <a href="http://www.oriontronic.com" target="_blank">Norvotech DEVELOPPEMENT</a> | 
   Design par <img src="../design/img/dbm-icon.png" width="8" height="8" alt="logo-dbm"> JLBourgon | <a href="../mentions_legales.php" target="_blank"> Mentions l&eacute;gales</a> </p>
   <p> '.PreInscription::getNomEtab().'</p>
</footer>

';
?>