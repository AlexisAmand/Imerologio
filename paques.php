<?php include('class/class.php'); ?>
<?php include('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Conversion du calendrier grégorien vers le calendrier républicain</title>
		<meta name="description" content="Application en ligne pour permettant de convertir une date du calendrier grégorien en date du calendrier républicain">

        <!-- Jquery 3.2.1 -->
    	
    	<script src="js/jquery.js"></script>						
						
		<!-- Bootstrap 4.0.0 -->
		
		<link href="css/bootstrap.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="css/style.css" rel="stylesheet">
		
		<!-- font awesome 5.0.10 -->
		
		<script defer src="css/fontawesome-all.js"></script>
		
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

    <h1>Convertir une date grégorienne en date républicaine</h1>

    <h4>Consignes</h4>

    <p>- Indiquez votre date et cliquez sur le bouton convertir.</p>
   
    <h4>C'est parti !</h4>

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
 
            /* Retourne un timestamp UNIX pour Pâques */    
            // echo  easter_date($year);
        
            /* unixtojd : timestamp UNIX vers Jour Julien */
            
            $unix = unixtojd(easter_date($year));
            
            /* jdtogregorian : Jour Julien vers calendrier gregorien */
        
            $resultat = jdtogregorian($unix);
            
            /* Retourne le numéro du jour de la semaine de 0 à 6 */
            /* Inutile... Pâques c'est thrs un dimanche -_-' */
            
            // $resultat = jddayofweek( easter_date($year),0);
            
            $dateunix = explode("/", $resultat);
            
            $gregorian = new gregorians;  
            
            $gregorian->month = $dateunix[0];
            $gregorian->day = $dateunix[1];
            $gregorian->year = $dateunix[2];
                                   
            switch($gregorian->month)
                {
                case '1': $gregorian->month = "janvier"; Break;
                case '2': $gregorian->month = "février"; Break;
                case '3': $gregorian->month = "mars"; Break;
                case '4': $gregorian->month = "avril"; Break;
                case '5': $gregorian->month = "mai"; Break;
                case '6': $gregorian->month = "juin"; Break;
                case '7': $gregorian->month = "juillet"; Break;
                case '8': $gregorian->month = "août"; Break;
                case '9': $gregorian->month = "septembre"; Break;
                case '10': $gregorian->month = "octobre"; Break;
                case '11': $gregorian->month = "novembre"; Break;
                case '12': $gregorian->month = "décembre"; Break;
                }

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
