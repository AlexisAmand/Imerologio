<?php 
require('class/class.php');
require('config.php');
?>

<!DOCTYPE html>

<html lang="fr">

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Trouver quel jour était Pâques | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne utilisant l'algorithme de Meeus pour trouver quelle était la date de Pâques pour une année donnée du calendrier grégorien">

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
		<link rel="canonical" href="https://imerologio.boitasite.com/paques.php"/>
		
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

    	<h3>Quel jour était Pâques ?</h3>

 			<h5>Un peu d'histoire</h5>

			<p class="text-justify">La date de Pâques est fixée par le Concile de Nicée de 325 qui la défini ainsi : <em>"Pâques est le dimanche qui suit le 14e jour de la Lune qui atteint cet âge le 21 mars ou immédiatement après"</em>. Pâques tombe donc entre le 22 mars et le 25 avril de chaque année. À partir du début du XVIIIe siècle, les mathématiciens recherchent des méthodes simplifiant le calcul de la date de Pâques : Gauss (1800), Meeus (1876) ou encore Conway (1980). J'ai choisi l'algorithme de Meeus, car c'est le plus exact pour une date supérieure à 1583.</p>
		
 			<h5>Comment ça marche ?</h5>

    		<p>Indiquez simplement une date supérieure à 1583, puis cliquez sur le bouton trouver.</p>
   
    		<h5>Trouver la date de Pâques</h5>

    		<form method="post" action="paques.php" class="form-inline justify-content-center">

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
             	$paques = new gregorians;
            		
            	$paques->year = $_POST['annee'];
            		
            	$paques->dateDePaques(); 
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

<!-- code piwik pour les stats -->
		
<?php include('include/piwik.php'); ?>

</body>
</html>