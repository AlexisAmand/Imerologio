<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Conversion entre le calendrier grégorien et calendrier républicain</title>
		<meta name="description" content="Application en ligne pour convertir une date du calendrier républicain en date du calendrier grégorien">

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

<div class="jumbotron vertical-center">
	
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

	    <h5>Un peu d'histoire</h5>
 		
 		<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 		
 		<h5>Comment ça marche ?</h5>
	
	    <p>- Indiquez votre date et cliquez sur le bouton convertir.<br />
	    - Cet outil convertit les dates comprises entre l'an I et l'an XIV (22 Septembre 1792 à 22 Septembre 1806 en calendrier grégorien). Il couvre uniquement la durée d'existence du calendrier, mais c'est pour des raisons techniques.</p>
	
	    <h5>Convertir une date</h5>
	
	    <form method="post" action="repgreg.php" class="form-inline">
	
		<div class="form-group">
	    <label>Jour</label> : 
	    <select name="jour" class="form-control m-2">
	      <option selected>1</option>
	      <?php
	      for($i=2; $i<31; $i++)
	        {
	        echo "<option value=".$i.">".$i."</option>";
	        }
	      ?>
	    </select>
	    </div>
	
		<div class="form-group">
	    <label>Mois</label> : 	    
	    <select name="mois" class="form-control m-2">
	      <option value="1" selected>Vendémiaire</option>
	      <?php
	      $MoisRepublicains = array("Brumaire", "Frimaire", "Nivose", "Pluviose", "Ventose", "Germinal", "Floréal", "Prairial", "Messidor", "Thermidor", "Fructidor", "Sansculottide");
	      $i = 2;
	      foreach($MoisRepublicains as $val)
	        {
	        echo "<option value=".$i.">".$val."</option>";
	        $i++;
	        }
	      ?>
	    </select>
	    </div>
	    
	    <div class="form-group">	    
	    <label>An</label> : 
	
	    <select name="annee" class="form-control m-2">
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
	    </div>
	
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
	
	    <input type="submit" value="Convertir !">
	
	    </form>
	
	    <?php 
	
	    if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
	        {
	        $republic = new republics;	
	        	
	        $republic->day = $_POST['jour'];
	        $republic->month = $_POST['mois'];
	        $republic->year = $_POST['annee'];
	
	        $jj = frenchtojd( $republic->month , $republic->day , $republic->year );
	        $resultat = jdtogregorian($jj);
	
	        if ($resultat == "0/0/0")
	            {
	            echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
	            }
	        else
	            {
	            $tabrepublic = explode("/", $resultat);
	
	            $gregorian = new gregorians;
	            
	            // $republic_month = $tabrepublic[0];
	            $gregorian->day = $tabrepublic[1];
	            $gregorian->year = $tabrepublic[2];
	
	            $gregorian->month = $gregorian->MoisEnLettre($tabrepublic[0]);
	            
                $republic->month = $republic->MoisEnLettre($gregorian->month);
	            
	            $republic->year = $republic->AnneeEnLettre($republic->year);
	
	            echo "<p class='alert alert-success'>Le <strong>".$republic->day." ".$republic->month." an ".$republic->year."</strong> correspond au <strong>".$gregorian->day." ".$gregorian->month." ".$gregorian->year."</strong></p>";
	            }
	        }
	
	    ?>	
	
	    </article>  
			
	 		<aside class="col-md-3">
	 				
	 			<?php include('include/aside.php');?>
	 		
	 		<br />
	 		
	 		<div class="card">
	            <div class="card-header">Historique</div>
	        		
	 		<ul class='list-group'>
	
	    <?php
	
	     // -------------------------------------------------------------------------
         // L'historique est une chaine de caractéres concaténée à chaque conversion
         // Ensuite, je récupére les éléments 3 par 3 pour afficher les dates : J/M/A
         // -------------------------------------------------------------------------
	
	    if (isset($historique))
	        {
	
	        $tableau = explode('/', $historique);
	        for ($i = 0; $i < count($tableau) - 1; $i+=3)
	            {
	            echo "<li href='#' class='list-group-item'><i class='fas fa-angle-right'></i>&nbsp;&nbsp;".$tableau[$i];
	           
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

</div>

</body>
</html>