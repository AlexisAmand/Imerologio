<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Calcul de l'épacte grégorienne</title>
		<meta name="description" content="Application en ligne pour calculer l'épacte grégorienne d'une année donnée">

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

    	<h3>Calcul de l'épacte grégorienne</h3>

 			<h5>Un peu d'histoire</h5>
 	
 			<p class="text-justify"> </p>
 		
 			<h5>Comment ça marche ?</h5>

    		<p>- Indiquez une date supérieure à 1583, puis cliquez sur le bouton calculer.</p>
   
    		<h5>Calculer l'épacte</h5>

    		<form method="post" action="epacte.php" style="text-align:center;"  class="form-inline justify-content-center">

				<div class="form-group">
			    <label>Année</label> : 
			    <input type="text" name="annee" class="form-control m-2">
			    </div>
			    
 				<input type="submit" value="Calculer !" class="btn btn-outline-secondary">

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
	        		
	    		echo "<p class='alert alert-success'>L'épacte de ".$gregorian->year." est ".$gregorian->Epacte($gregorian->year)."</strong></p>";
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

</body>
</html>