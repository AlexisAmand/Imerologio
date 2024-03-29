<?php
require('class/class.php'); 
require('config.php');
?>

<!DOCTYPE html>

<html lang="fr">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Calcul du jour julien | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne pour calculer le jour julien d'une date donnée">

        <!-- Jquery 3.4.1-->
    	<script src="js/jquery-3.4.1.min.js"></script>						
						
		<!-- Bootstrap 4.3.1 -->
		<link href="css/bootstrap.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		<link href="css/style.css" rel="stylesheet">
		
		<!-- Bootstrap Icons -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

		<?php include 'include/tarteaucitron.inc.php'; ?>

		<script>
		function DateDuJour( ) {
			var now = new Date();

			var annee   = now.getFullYear();
			var mois    = now.getMonth() + 1;
			var jour    = now.getDate();
				
			document.getElementById("jour").value = jour;
			document.getElementById("mois").value = mois;
			document.getElementById("annee").value = parseInt(annee);
		}
		</script>

		<!-- url canonical -->
		<link rel="canonical" href="https://imerologio.boitasite.com/jourjulien.php"/>
		
   	</head>
	
<body>
	
<div class="container mt-4">

	<header class="row">
 		<div class="col-md-12">
			<a href="/index.php" title=" "> 
				<h1 class="text-center"><?php echo SITE_TITLE; ?></h1>
				<p class="text-center"><?php echo SITE_SLOGAN; ?></p>
			</a> 
 		</div>
 	</header>

	<section class="row">
		<article class="col-md-9">
 	
	    	<h3>Calcul du Jour julien</h3>
	    	
			<h5>Comment ça marche ?</h5>

    			<p>Indiquez une date entre 1970 et 2037, puis cliquez sur le bouton convertir.</p>
      		
				<form method="post" action="jourjulien.php">
				
				<div class="form-row justify-content-center">
				
					<div class="form-group col-md-2">
					<select name="jour" class="form-control" id="jour">
					<option selected>Jour</option>
					<?php
					for($i=1; $i<32; $i++)
					{
						echo "<option value=".$i.">".$i."</option>";
					}
					?>
	            	</select>
	    			</div>
    		
		    		<div class="form-group col-md-2">
				    <select name="mois" class="form-control" id="mois">
					      <option selected>Mois</option>
					      <?php
				      	  $MoisGregoriens = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "septembre", "Octobre", "Novembre", "Décembre");
				          $i = 1;
				          foreach($MoisGregoriens as $val)
				          	{
				        	echo "<option value=".$i.">".$val."</option>";
				        	$i++;
				        	}
				      	  ?>
				    </select>
		       		</div>
    		
		    		<div class="form-group col-md-2">
				    <input type="text" name="annee" class="form-control"  placeholder="Année" id="annee">
				    </div>
    		
    			</div>
		  
				  <div class="form-row justify-content-center">
				  
				  	<button type="submit" class="btn btn-outline-secondary">Convertir !</button>
					<button onclick="DateDuJour()" class="btn btn-outline-secondary ml-2" type="button">Aujourd'hui</button>

				  </div>
		  
			</form>				

    		<?php 
				
				if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
					{
					$gregorian = new gregorians;
					
					$gregorian->day = $_POST['jour'];
					$gregorian->month = $_POST['mois'];
					$gregorian->year = $_POST['annee'];
																	
					$jd = cal_to_jd (  CAL_GREGORIAN , $gregorian->month , $gregorian->day , $gregorian->year );
					
					/* La mise en lettre du mois se fait ici car au dessus j'ai encore besoin du mois en chiffre */
					
					$gregorian->month = $gregorian->MoisEnLettre($gregorian->month);
					
					echo "<p class='alert alert-success'>Le ".$gregorian->day." ".$gregorian->month." ".$gregorian->year." est le jour julien ".$jd."</p>";
					}
								
			?>

			<h5>Un peu d'histoire</h5>
			
			<p class="text-justify">Le jour julien correspond au nombre de jours qui se sont écoulés depuis midi du 1er janvier 4713 avant Jésus-Christ selon le calendrier julien proleptique ou le 24 novembre 4714 avant Jésus-Christ selon le calendrier grégorien proleptique, exprimé en jours décimaux. La partie entière spécifie le jour et la partie décimale spécifie l'heure : 0,5 correspondant au "minuit" du jour en question. Le jour Julien est cependant très peu employée en raison de sa taille : le 7 juillet 2011 correspond ainsi au jour julien 2455749.5 !</p>
 										  
		</article>
   
    	<aside class="col-md-3">
   
       		<nav><?php include('include/aside.php');?></nav>

    	</aside>
					
	</section>
	
 	<footer class="row">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

<!-- code piwik pour les stats -->
		
<?php include('include/piwik.php'); ?>

</body>
</html>