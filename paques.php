<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Trouver quel jour était Pâques | <?php echo SITE_TITLE; ?></title>
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
 	
 			<p class="text-justify">La date de Pâques est fixée par le Concile de Nicée de 325 qui la défini ainsi: <em>"Pâques est le dimanche qui suit le 14e jour de la Lune qui atteint cet âge le 21 mars ou immédiatement après"</em>. Pâques tombe donc entre le 22 mars et le 25 avril de chaque année. À partir du début du XVIIIe siècle, les mathématiciens recherchent des méthodes simplifiant le calcul de la date de Pâques: Gauss (1800), Meeus (1876) ou encore Conway (1980). J'ai choisi l'agorithme de Meeus car c'est le plus exact pour une date supérieure à 1583.</p>
 		
 			<h5>Comment ça marche ?</h5>

    		<p>- Indiquez une date supérieure à 1583, puis cliquez sur le bouton trouver.</p>
   
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
        		
        			/* Je n'ai pas utilisé la fonction easter_date() */
        			/* car elle est limité à une date en 1970 et 2037 */
           			             		
            		$paques = new gregorians;
            		
            		$paques->year = $_POST['annee'];
            		
            		/*
            		$quotient = (int)($divisor / $dividend);
            		$remainder = $divisor % $dividend;
            		*/
            		
            		/* cycle de Méton */
            		
            		$n = $paques->year % 19;
            		
            		/* centaine et rang de l'année */
            		
            		$u = $paques->year % 100;
            		$c = (int)($paques->year / 100);
            		
            		/* siècle bissextile */
            		
            		$t = $c % 4;
            		$s = (int)($c / 4);
            		
            		/* cycle de proemptose */

            		$p = (int)(($c + 8) / 25);
            		
            		/* proemptose */
            		
            		$q = (int)(($c - $p + 1 ) / 3);
            		
            		/* épacte */
            		
            		$e = (19 * $n + $c - $s - $q + 15) % 30;
            		
            		/* année bissextile */
            		
            		$d = $u % 4;
            		$b = (int)($u / 4);
            		
            		/* lettre dominicale */
            		
            		$L = (2 * $t + 2 * $b - $e - $d + 32) % 7;
            		
            		/* correction */
            		
            		$h = (int)(($n + 11 * $e + 22 * $L) / 451);
            		
            		/* mois et quantième du Samedi saint */
            		
            		$j = ($e + $L - 7 * $h + 114) % 31;
            		$m = (int)(($e + $L - 7 * $h + 114) / 31);
            		
            		/* mois et quantième de pâques */
            		         		
               		$paques->day = $j + 1;
               		$paques->month = $paques->MoisEnLettre($m);
           			                            
               		echo "<p class='alert alert-success'>En ".$paques->year.", Pâques est le ".$paques->day." ".$paques->month."</strong></p>";   
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