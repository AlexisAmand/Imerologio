<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>L'année est-elle bissextile ? | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Trouver si une année du calendrier grégorien est bissextile">

        <!-- Jquery 3.4.1-->
    	
    	<script src="js/jquery-3.4.1.min.js"></script>						
						
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

    	<h3>L'année est-elle bissextile ? </h3>

 			<h5>Un peu d'histoire</h5>
 	
 			<p class="text-justify">Bientôt...</p>
 		
 			<h5>Comment ça marche ?</h5>

    		<p>- Indiquez une date supérieure à 1583, puis cliquez sur le bouton trouver.</p>
   
    		<h5>Trouver si une année est bissextile</h5>

    		<form method="post" action="bissextile.php">
    		
    		<div class="form-row justify-content-center">

				<div class="form-group col-md-2">
			    <label for="inputYear">Année</label>
			    <input id="inputYear" type="text" name="annee" class="form-contro">
			    </div>
			    
 			</div>
		  
		  <div class="form-row justify-content-center">
		  
		  	<button type="submit" class="btn btn-outline-secondary">Trouver !</button>
		  
		  </div>
		  
		</form>
  
    	<?php 
    	
    	if (isset($_POST['annee']))
        	{
        	if (!empty($_POST['annee']))
        		{
        		if (($_POST['annee'] % 4 == 0) and ($_POST['annee'] % 100 != 0) or ($_POST['annee'] % 400 == 0 )) 
        			{
        			echo "<p class='alert alert-success'>L'année ".$_POST['annee']." est bissextile.</p>";
        			}
           		else 
           			{
           			echo "<p class='alert alert-success'>L'année ".$_POST['annee']." n'est pas bissextile.</p>";
           		   	}
             	}
            else 
             	{
             	echo "<p class='alert alert-warning'>La date entrée n'est pas correcte ! Elle doit être supérieure à 1583.</p>";
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