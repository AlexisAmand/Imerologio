<?php
require('class/class.php'); 
require('config.php');
?>

<!DOCTYPE html>

<html lang="fr">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>L'année est-elle bissextile ? | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="formulaire pour déterminer si une année du calendrier grégorien est bissextile">

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
		<link rel="canonical" href="https://imerologio.boitasite.com/bissextile.php"/>
		
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

    	<h3>L'année est-elle bissextile ?</h3>

 			<h5>Comment ça marche ?</h5>

    		<p>Indiquez une date supérieure à 1583, puis cliquez sur le bouton trouver.</p>
   
				<form method="post" action="bissextile.php" class="form-inline justify-content-center">

					<div class="form-group">
						<input type="text" name="annee" class="form-control m-2" id="inputYear" placeholder="Indiquez une année">
					</div>

					<button type="submit" class="btn btn-outline-secondary">Trouver !</button>

				</form>

    	<?php 
    	
    	if (isset($_POST['annee']))
        	{
        	if (!empty($_POST['annee']))
        		{
				$gregorian = new gregorians;
                $gregorian->year = $_POST['annee'];
				$gregorian->Bissextile();
             	}
            else 
             	{
             	echo "<p class='alert alert-warning'>La date entrée n'est pas correcte ! Elle doit être supérieure à 1583.</p>";
             	}
        	}
       
        ?>

		<h5>Un peu d'histoire</h5>
 	
	 	<p class="text-justify">L'année bissextile sert à rattraper le retard pris par l'année civile sur l'année solaire. C'est une habitude qui remonte aux Romains.</p>

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