<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Calcul du jour julien | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne pour calculer le jour julien d'une date donnée">

        <!-- Jquery 3.3.1 -->
    	
    	<script src="js/jquery-3.3.1.min.js"></script>						
						
		<!-- Bootstrap 4.3.1 -->
		
		<link href="css/bootstrap.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="css/style.css" rel="stylesheet">
		
		<!-- Font Awesome 5.8.2 -->
		
		<link href="css/fontawesome-all.css" rel="stylesheet">
		
		<!-- code piwik pour les stats -->
		
		<?php include('include/piwik.php'); ?>

   	</head>
	
<body>
	
<div class="container">

 	<header class="row">
 		<div class="col-md-12">
 		
 		<h1 class="text-center"><?php echo SITE_TITLE; ?></h1>
 		<p class="text-center"><?php echo SITE_SLOGAN; ?></p>
 		
 		</div>
 	</header>

	<section class="row">
		<article class="col-md-9">
 	
	    	<h3>Calcul du Jour julien</h3>
	    	
	    	<h5>Un peu d'histoire</h5>
			
				<p> Le jour julien correspond au nombre de jours qui se sont &eacute;coul&eacute;s depuis midi du&nbsp;<abbr title="Premier">1er</abbr>&nbsp;janvier&nbsp;4713 avant JC selon le&nbsp;calendrier julien proleptique&nbsp;ou le&nbsp;24 novembre&nbsp;4714 avant JC selon le&nbsp;calendrier gr&eacute;gorien proleptique, exprim&eacute; en jours d&eacute;cimaux. La partie enti&egrave;re sp&eacute;cifie jour et la partie d&eacute;cimale sp&eacute;cifie l'heure&nbsp;: 0,5 correspondant au &laquo;&nbsp;minuit&nbsp;&raquo; du jour en question. Le jour Julien est cependant tr&eacute;s peu employ&eacute; en raison de sa taille: le 7 juillet 2011 correspond ainsi au jour julien 2455749.5 !</p>
			
			<h5>Comment ça marche ?</h5>

    			<p>- Indiquez une date entre 1970 et 2037, puis cliquez sur le bouton convertir.</p>
   
    		<h5>Trouver une date</h5>	
    		
				<form method="post" action="jourjulien.php">
				
				<div class="form-row justify-content-center">
				
					<div class="form-group col-md-2">
					<label for="jours">Jour</label>
					<select name="jour" class="form-control">
					<option selected>1</option>
					<?php
					for($i=2; $i<32; $i++)
					{
						echo "<option value=".$i.">".$i."</option>";
					}
					?>
	            	</select>
	    			</div>
    		
		    		<div class="form-group col-md-2">
		    		<label for="sujet">Mois</label> 		
				    <select name="mois" class="form-control">
					      <option value="1" selected>Janvier</option>
					      <?php
				      	  $MoisGregoriens = array("Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
				          $i = 2;
				          foreach($MoisGregoriens as $val)
				          	{
				        	echo "<option value=".$i.">".$val."</option>";
				        	$i++;
				        	}
				      	  ?>
				    </select>
		       		</div>
    		
		    		<div class="form-group col-md-2">
				    <label>Année</label> : 
				    <input type="text" name="annee" class="form-control">
				    </div>
    		
    			</div>
		  
				  <div class="form-row justify-content-center">
				  
				  	<button type="submit" class="btn btn-outline-secondary">Convertir !</button>
				  
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
 										  
		</article>
   
    	<aside class="col-md-3">
   
       		<nav><?php include('include/aside.php');?></nav>

    	</aside>
					
	</section>
	
 	<footer class="row">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>