<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Conversion entre le calendrier grégorien et calendrier républicain</title>
		<meta name="description" content="Application en ligne pour convertir une date du calendrier républicain en date du calendrier grégorien">

		<!-- Jquery 3.2.1 -->
    	
    	<script src="js/jquery.js"></script>						
						
		<!-- Bootstrap 4.0.0 -->
		
		<link href="css/bootstrap.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="css/style.css" rel="stylesheet">
		
		<!-- font awesome 5.0.9 -->
		
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

    	<h4>Convertir une date républicaine en date grégorienne</h4>

	    <h5>Consignes</h5>
	
	    <p>- Indiquez votre date et cliquez sur le bouton convertir.<br />
	    - Cet outil convertit les dates comprises entre l'an I et l'an XIV (22 Septembre 1792 à 22 Septembre 1806 en calendrier grégorien). Il couvre plus que la durée d'existence du calendrier, mais c'est pour des raisons techniques.</p>
	
	    <h5>C'est parti !</h5>
	
	    <form method="post" action="repgreg.php" style="text-align:center;">
	
	    <label>Jour</label> : 
	
	    <select name="jour">
	      <option selected>1</option>
	      <?php
	      for($i=2; $i<31; $i++)
	        {
	        echo "<option value=".$i.">".$i."</option>";
	        }
	      ?>
	    </select>
	
	    <label>Mois</label> : 
	
	    <select name="mois">
	        <option selected value="1">Vendémiaire</option>
	        <option value="2">Brumaire</option>
	        <option value="3">Frimaire</option>  
	        <option value="4">Nivose</option>
	        <option value="5">Pluviose</option>
	        <option value="6">Ventose</option>
	        <option value="7">Germinal</option>  
	        <option value="8">Floréal</option>
	        <option value="9">Prairial</option>
	        <option value="10">Messidor</option>
	        <option value="11">Thermidor</option>  
	        <option value="12">Fructidor</option>
	        <option value="13">Sansculottide</option>
	    </select>
	
	    <label>An</label> : 
	
	    <select name="annee">
	      <option value="1" selected>I</option>
	      <?php
	      $romain = array("II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII", "XIII", "XIV");
	      $i = 2;
	      foreach($romain as $val)
	        {
	        echo "<option value=".$i.">".$val."</option>";
	        $i++;
	        }
	      ?>
	    </select>
	
	    <?php
	    if (isset($_POST['compteur']))
	        {
	        $compteur = $_POST['compteur'] + 1;
	        $historique = $_POST['historique'].$_POST['jour']."/".$_POST['mois']."/".$_POST['annee']."/";
	        echo '<input type="hidden" name="compteur" value="'.$compteur.'" />';
	        echo '<input type="hidden" name="historique" value="'.$historique.'" />';
	        }
	    else
	        {
	        $compteur = 1;
	        $historique = "";
	        echo '<input type="hidden" name="compteur" value="1" />';
	        echo '<input type="hidden" name="historique" value="'.$historique.'" />';
	        }
	    ?>
	
	    <br /><br />
	    <input type="submit" value="Convertir !">
	
	    </form>
	
	    <?php 
	
	    if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
	        {
	        $day = $_POST['jour'];
	        $month = $_POST['mois'];
	        $year = $_POST['annee'];
	
	        $jj = frenchtojd( $month , $day , $year );
	        $resultat = jdtogregorian($jj);
	
	        if ($resultat == "0/0/0")
	            {
	            echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
	            }
	        else
	            {
	            $republic = explode("/", $resultat);
	
	            $republic_month = $republic[0];
	            $republic_day = $republic[1];
	            $republic_year = $republic[2];
	
	            switch($republic[0])
	                {
	                case '1': $republic[0] = "Janvier"; Break;
	                case '2': $republic[0] = "Février"; Break; 
	                case '3': $republic[0] = "Mars"; Break; 
	                case '4': $republic[0] = "Avril"; Break;
	                case '5': $republic[0] = "Mai"; Break;
	                case '6': $republic[0] = "Juin"; Break;
	                case '7': $republic[0] = "Juillet"; Break; 
	                case '8': $republic[0] = "Août"; Break;
	                case '9': $republic[0] = "Septembre"; Break;
	                case '10': $republic[0] = "Octobre"; Break;
	                case '11': $republic[0] = "Novembre"; Break; 
	                case '12': $republic[0] = "Décembre"; Break;
	                }
	
	            switch($month)
	                {
	                case '1': $month = "Vendémiaire"; Break;
	                case '2': $month = "Brumaire"; Break;
	                case '3': $month = "Frimaire"; Break;  
	                case '4': $month = "Nivose"; Break;
	                case '5': $month = "Pluviose"; Break;
	                case '6': $month = "Ventose"; Break;
	                case '7': $month = "Germinal"; Break;  
	                case '8': $month = "Floréal"; Break;
	                case '9': $month = "Prairial"; Break;
	                case '10': $month = "Messidor"; Break;
	                case '11': $month = "Thermidor"; Break;  
	                case '12': $month = "Fructidor"; Break;
	                case '13': $month = "Sansculottide"; Break;
	                }
	
	            switch($year)
	                {
	                case '1': $year = "I"; Break;
	                case '2': $year = "II"; Break; 
	                case '3': $year = "III"; Break; 
	                case '4': $year = "IV"; Break;
	                case '5': $year = "V"; Break;
	                case '6': $year = "VI"; Break;
	                case '7': $year = "VII"; Break; 
	                case '8': $year = "VIII"; Break;
	                case '9': $year = "IX"; Break;
	                case '10': $year = "X"; Break;
	                case '11': $year = "XI"; Break; 
	                case '12': $year = "XII"; Break;
	                case '13': $year = "XIII" ; Break;
	                }
	
	            echo "<p class='alert alert-success'>Le <strong>".$day." ".$month." an ".$year."</strong> correspond au <strong>".$republic[1]." ".$republic[0]." ".$republic[2]."</strong></p>";
	            }
	        }
	
	    ?>	
	
	    </article>  
			
	 		<aside class="col-md-3">
	 				
	 			<?php include('include/aside.php');?>
	 		
	 		<br />
	 		
	 		<div class="card">
	            <div class="card-header">Titre</div>
	        		
	 		<ul class='list-group'>
	
	    <?php
	
	    /*
	    echo $historique;
	    */
	
	    if (isset($historique))
	        {
	
	        $tableau = explode('/', $historique);
	        for ($i = 0; $i < count($tableau) - 1; $i+=3)
	            {
	            echo "<li href='#' class='list-group-item'>".$tableau[$i];
	
	            switch($tableau[$i + 1])
	                {
	                case '1': $month = "Vendémiaire"; Break;
	                case '2': $month = "Brumaire"; Break;
	                case '3': $month = "Frimaire"; Break;  
	                case '4': $month = "Nivose"; Break;
	                case '5': $month = "Pluviose"; Break;
	                case '6': $month = "Ventose"; Break;
	                case '7': $month = "Germinal"; Break;  
	                case '8': $month = "Floréal"; Break;
	                case '9': $month = "Prairial"; Break;
	                case '10': $month = "Messidor"; Break;
	                case '11': $month = "Thermidor"; Break;  
	                case '12': $month = "Fructidor"; Break;
	                }
	
	             echo " ".$month." ";
	
	            echo $tableau[$i + 2]."</li>";
	            }
	        }
	
	    if ($compteur == 1)
	        {
	        echo "<p style='text-align:center;'>Vous n'avez pas<br />encore fait de conversion.</p>";
	        }
	
	    ?>

       	 	</ul>
       		</div>      
 			</aside>
 	
 	</section>
 	
 	<footer class="row">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>