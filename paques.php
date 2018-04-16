<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Trouver quel jour était Pâques</title>
		<meta name="description" content="Application en ligne pour trouver quelle est la date de Pâques">

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

    <h4>Quel jour était Pâques ?</h4>

 	<h5>Un peu d'histoire</h5>
 	
 	<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 		
 	<h5>Comment ça marche ?</h5>

    <p>- Indiquez votre date et cliquez sur le bouton convertir.</p>
   
    <h5>Trouver une date</h5>

    <form method="post" action="paques.php" style="text-align:center;">

    <label>Année</label> : 

    <input type="text" name="annee">

    <br /><br />
    <input type="submit" value="Convertir !">

   </form>

   
     <?php 

    if (isset($_POST['annee']))
        {
        if (!empty($_POST['annee']))
            {
            $year = $_POST['annee'];
         
            /* unixtojd : timestamp UNIX vers Jour Julien */
            
            $unix = unixtojd(easter_date($year));
            
            /* jdtogregorian : Jour Julien vers calendrier gregorien */
        
            $resultat = jdtogregorian($unix);
                        
            $dateunix = explode("/", $resultat);
            
            $gregorian = new gregorians;  
            
            // $gregorian->month = $dateunix[0] ;
            $gregorian->day = $dateunix[1];
            $gregorian->year = $dateunix[2];
                      
            $gregorian->month = $gregorian->MoisEnLettre($dateunix[0]);
            
			echo "<p class='alert alert-success'>En ".$gregorian->year.", Pâques est le ".$gregorian->day." ".$gregorian->month."</strong></p>";   
             
            }     
        else
            {
            echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
            }    
        }

    ?>

</article>
    
    	<aside class="col-md-3">
   
        <nav>
			<?php include('include/aside.php');?>
		</nav>

    	</aside>

        <div style="text-align:center;">
    	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- arbre.genealexis.fr 1 -->
        <ins class="adsbygoogle"
        style="display:inline-block;width:468px;height:60px"
        data-ad-client="ca-pub-1550427609493753"
        data-ad-slot="1772159645"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
			
		<p style="text-align:center;">
		Cette page est en phase de test.<br />Vous pouvez me laisser vos remarques sur Twitter via <a href="https://twitter.com/alexisamand">@alexisamand</a> ou sur facebook via <a href="https://www.facebook.com/alexisamand">https://www.facebook.com/alexisamand</a>
		</p>
		
	</section>
	
 	<footer class="row">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>
