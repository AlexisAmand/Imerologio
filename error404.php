<?php 
require('class/class.php'); 
require('config.php');
?>

<!DOCTYPE html>

<html lang="fr">
	
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Erreur 404 | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="La page que vous cherchez n'a pas été trouvée.">

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
		<link rel="canonical" href="https://imerologio.boitasite.com/error404.php"/>
		
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
 
    	<h3 class="text-center">Erreur 404 !</h3>
    	
    	<p class="text-center">La page que vous cherchez n'a pas été trouvée.</p>   	
    	
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