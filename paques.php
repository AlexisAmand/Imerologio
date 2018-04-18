<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Trouver quel jour était Pâques</title>
		<meta name="description" content="Application en ligne pour trouver quelle était la date de Pâques pour une année donnée">

        <!-- Jquery 3.3.1 -->
    	
    	<script src="js/jquery-3.3.1.min.js"></script>						
						
		<!-- Bootstrap 4.1.0 -->
		
		<link href="css/bootstrap.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="css/style.css" rel="stylesheet">
		
		<!-- font awesome 5.0.10 -->
		
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

    	<h3>Quel jour était Pâques ?</h3>

 			<h5>Un peu d'histoire</h5>
 	
 			<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 		
 			<h5>Comment ça marche ?</h5>

    		<p>- Indiquez une date entre 1970 et 2037, puis cliquez sur le bouton trouver. Une mise à jour utilisant l'algorithme de Butcher/Meeus est en cours de développement. Elle permettra une recherche à partir de l'année 1583, premiére Pâques du calendrier grégorien instauré en 1582.</p>
   
    		<h5>Trouver la date de Pâques</h5>

    		<form method="post" action="paques.php" style="text-align:center;"  class="form-inline justify-content-center">

				<div class="form-group">
			    <label>Année</label> : 
			    <input type="text" name="annee" class="form-control m-2">
			    </div>
			    
 				<input type="submit" value="Trouver !" class="btn btn-outline-secondary">

   			</form>
  
    	<?php 

    	if (isset($_POST['annee']))
        	{
        	if (!empty($_POST['annee']))
           		{
            	if (($_POST['annee'] >= '1970') and ($_POST['annee'] <= '2037'))	
            		{
            		$year = $_POST['annee'];
         
           			/* unixtojd : timestamp UNIX vers Jour Julien */
            
            		$unix = unixtojd(easter_date($year));
            
            		/* jdtogregorian : Jour Julien vers calendrier gregorien */
        
            		$resultat = jdtogregorian($unix);
            		$dateunix = explode("/", $resultat);
	            
	            	$gregorian = new gregorians;  
	            
	            	$gregorian->day = $dateunix[1];
	            	$gregorian->year = $dateunix[2];
	                      
	            	$gregorian->month = $gregorian->MoisEnLettre($dateunix[0]);
            
					echo "<p class='alert alert-success'>En ".$gregorian->year.", Pâques est le ".$gregorian->day." ".$gregorian->month."</strong></p>";   
             		}
             	else 
             		{
             		echo "<p class='alert alert-warning'>La date entrée n'est pas correcte ! Elle doit être comprise en 1970 et 2037.</p>";
             		}
            	}
        	else
           		{
           		echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
           		}  
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