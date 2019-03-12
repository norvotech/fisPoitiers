<?php 
	 session_start();
	include('header.php');
	include('menu.php');
	
	$debug=0;
		if ($init=0){
    	//LOCAL
  		$table = "jejescriptmembres";
	}
	else{
		 $table = "JejeScriptMembres";	
		
		}

	
	 ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Liste PGF</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

    
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des inscriptions 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover display"  id="dataTables-example">
   				 <thead>
				      <tr>
				        <?php 
	/**/if ($debug > 0) echo "<li>table: $table<li>cle: $cle<li>tri: $tri";
	if (isset($tri)) { $order = "ORDER BY $cle $tri" ; } else { $order = "" ; }
	
	
			$sql1= Bdd::connectFormation()->query("SELECT id,pseudo,email,nom,prenom FROM ".$table." $order"); 
			$sql1->execute(); 
			$nblig = $sql1->rowCount();
			$nbcol=$sql1->columnCount();
			
	
 
							for ($i=0;$i<$nbcol;$i++)
					{// pour changer la couleur de la fleche ;color :#000
						$tableau = ($sql1->getColumnMeta($i));
						$nomCol = $tableau['name'];
					
					
					
						echo "<th>";
						echo $nomCol;
						echo "</th>";
					}
					//insertion des colonnes modif et suppression et concultation de fiche
					echo "<td class='button2'>Sup.</td>";
					echo "</tr>
				</thead>
	<tbody>";	
		
	// Lignes de corps du tableau
	for ($i=0;$i<$nblig;$i++)
	{$res= $sql1-> fetch();
		
		
		
		echo "<tr>";
		for ($j=0;$j<$nbcol;$j++) 
		{
			echo "<td class='button' >";
			switch ($j)
				  {
					case'2':
					echo"<a href='mailto:$res[$j]?SUBJECT=Demande d informations pour la base Formation'> $res[$j]</a>";
					break;
					default :
					echo $res[$j];
					break;
				}
				echo "</td>";
	}
	echo "<td class='celsup' onclick=\"if(confirm('Supprimer la fiche ".$res['id']." ?')) window.location.href='supp.php?table=$table&id=".$res['id']."' \" ></td>";

echo "</tr>";	
	}
?>

</tbody>
                            </table>
                            <!-- /.table-responsive -->
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
          

	       
            
              <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>