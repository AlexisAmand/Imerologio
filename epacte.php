<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Calcul de l'épacte grégorienne | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne pour calculer l'épacte grégorienne d'une année donnée">

        <!-- Jquery 3.4.1-->
    	
    	<script src="js/jquery-3.4.1.min.js"></script>						
						
		<!-- Bootstrap 4.3.1 -->
		
		<link href="css/bootstrap.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="css/style.css" rel="stylesheet">
		
		<!-- Font Awesome 5.8.2 -->
		
		<link href="css/fontawesome-all.css" rel="stylesheet">
		
   	</head>
	
<body>
	
<div class="container mt-4">

 	<header class="row">
 		<div class="col-md-12">
 		
 		<h1 class="text-center"><?php echo SITE_TITLE; ?></h1>
 		<p class="text-center"><?php echo SITE_SLOGAN; ?></p>
 		
 		</div>
 	</header>

	<section class="row">
 		<article class="col-md-9">

    	<h3>Calcul de l'épacte grégorienne</h3>
 		
 			<h5>Comment ça marche ?</h5>

    		<p>- Indiquez une date supérieure à 1583, puis cliquez sur le bouton calculer.</p>
   
				<form method="post" action="epacte.php" class="form-inline justify-content-center">

					<div class="form-group">
						<input type="text" name="annee" class="form-control m-2" id="inputYear" placeholder="Indiquez une année">
					</div>

					<button type="submit" class="btn btn-outline-secondary">Trouver !</button>

				</form>

    	<?php 
    	
    	if (isset($_POST['annee']))
	    	{
	    	
	    	/*
	    	
		   	Soit A l'année concernée.
			c = Partie entière de (A / 100)
			Épacte = RESTE ((11 × RESTE (A / 19) + 8 - c + Partie entière de (c / 4) + Partie entière de ((8 × c + 13) / 25)) / 30)
			
			Si Épacte = 25 et que le nombre d'or N = RESTE(Année /19) > 10, alors Épacte = 26.
	    	
	    	 */
	    	
	    	if ($_POST['annee'] > 1582)
	    		{
	    	 	$gregorian = new gregorians;
	    		
	    		$gregorian->year = $_POST['annee'];
	    		
	    		$epacte = $gregorian->Epacte($gregorian->year);
	    		
	    		// Si Épacte = 25 et que le nombre d'or N = (Année % 19) > 10, alors Épacte = 26.<br />	
	    		
	    		if (($epacte == 25) and ($gregorian->year % 19 > 10))
	    			{
	    			$epacte = 26;
	    			}
	        	else
	        		{
	    			echo "<p class='alert alert-success'>L'épacte de ".$gregorian->year." est ".$epacte ."</strong></p>";
	    			}
	    		}
	    	else
    			{
    			echo "<p class='alert alert-warning'>La date entrée n'est pas bonne !</strong></p>";
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

<!-- code piwik pour les stats -->
		
<?php include('include/piwik.php'); ?>

</body>
</html>