<?php 
require('class/class.php');
require('config.php');
?>

<!DOCTYPE html>

<html lang="fr">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Trouver à quel jour de la semaine correspond une date | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne utilisant l'algorithme de Mike Keith pour trouver à quel jour de la semaine correspond une date donnée du calendrier grégorien.">

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

		<!-- url canonical -->
		<link rel="canonical" href="https://imerologio.boitasite.com/jourdelasemaine.php"/>
		
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

    	<h3>A quel jour correspond une date ?</h3>
    	
   		 	<h5>Comment ça marche ?</h5>

    		<p class="text-justify">Indiquez votre date, avec un année composée de 4 chiffres, et cliquez sur le bouton "Trouver !".</p>

    		<form method="post" action="jourdelasemaine.php">

            	<div class="form-row justify-content-center">
            
            	<div class="form-group col-md-2">
                <select name="jour" class="form-control" id="inputDay">
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
			    <select name="mois" class="form-control" id="inputMonth">
			    	  <option selected>Mois</option>
				      <?php
			      	  $MoisGregoriens = array("Janvier","Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "septembre", "Octobre", "Novembre", "Décembre");
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
                <input type="text" name="annee" class="form-control" id="inputYear" placeholder="Année">
                </div>
              
                </div>
		  
		  <div class="form-row justify-content-center">
		  
		  	<button type="submit" class="btn btn-outline-secondary">Trouver !</button>
		  
		  </div>
		  
		</form>

     		<?php 
     		
            /* Algorithme de Mike Keith */
                
            if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
            	{
                if ($_POST['annee'] >= 1583 )
                	{
                	$gregorian = new gregorians;
                	
                	$gregorian->day = $_POST['jour'];
                	$gregorian->month = $_POST['mois'];
                	$gregorian->year = $_POST['annee'];
					             	 
                	$gregorian->monthInLetters = $gregorian->MoisEnLettre($gregorian->month);
                	$day = $gregorian->JourEnLettre($gregorian->gregorianDay());		

					echo "<p class='alert alert-success'> Le ".$gregorian->day." ".$gregorian->monthInLetters." ".$gregorian->year." est un <strong>".$day."</strong></p>";
                	}
                else
                	{
                	echo "<p class='alert alert-warning'>La date entrée n'est pas correcte ! Elle doit être supérieure à 1583.</p>";
                	}
                }
            ?>
		
		<h5>Un peu d'histoire</h5>
    	
		<p>Ce formulaire utilise l'algorithme de Mike Keith pour vous aider à trouver à quel jour de la semaine correspond une date donnée du calendrier grégorien. Il a initialement été publié en 1990 dans un article du <em>Journal of Recrational Mathematics (Vol. 22, No. 4, 1990, p. 280).</em></p> 
 	  	
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