<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Trouver à quel jour de la semaine correspond une date | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne utilisant l'algorithme de Mike Keith pour trouver à quel jour de la semaine correspond une date donnée du calendrier grégorien">

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

    	<h3>A quel jour correspond une date ?</h3>
    	
    		<h5>Un peu d'histoire</h5>
    	
    		<p>Ce formulaire utilise l'algorithme de Mike Keith pour vous aider à trouver à quel jour de la semaine correspond une date donnée du calendrier grégorien. Il a initialement été publié en 1990 dans un article du <em>Journal of Recrational Mathematics (Vol. 22, No. 4, 1990, p. 280).</em></p> 

   		 	<h5>Comment ça marche ?</h5>

    		<p>- Indiquez votre date et cliquez sur le bouton "Trouver !".<br />
    		- Votre date doit être composée de 4 chiffres !</p>

    		<h5>Trouver un jour</h5>

    		<form method="post" action="jourdelasemaine.php">

            	<div class="form-row justify-content-center">
            
            	<div class="form-group col-md-2">
            	<label for="inputDay">Jour</label> 
                <select name="jour" class="form-control" id="inputDay">
                  <option selected>Choisir...</option>
                  <?php
                  for($i=1; $i<32; $i++)
                    {
                    echo "<option value=".$i.">".$i."</option>";
                    }
                  ?>
                </select>
                </div>
                            
	    		<div class="form-group col-md-2">
	    		<label for="inputMonth">Mois</label> 		
			    <select name="mois" class="form-control" id="inputMonth">
			    	  <option selected>Choisir...</option>
				      <?php
			      	  $MoisGregoriens = array("Janvier","Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
			          $i = 1;
			          foreach($MoisGregoriens as $val)
			          	{
			        	echo "<option value=".$i.">".$val."</option>";
			        	$i++;
			        	}
			      	  ?>
			    </select>
	       		</div>
            
            	<div class="form-group col-md-2">
            	<label for="inputYear">Année</label>           
                <input type="text" name="annee" class="form-control" id="inputYear">
                </div>
                              
                </div>
		  
		  <div class="form-row justify-content-center">
		  
		  	<button type="submit" class="btn btn-outline-secondary">Trouver !</button>
		  
		  </div>
		  
		</form>

     		<?php 
     		
     		/* Algorithme utilisant les fonctions de PHP */
     		
     		/*

            if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
                {
                if (!empty($_POST['annee']))
                    {                    
                    $gregorian = new gregorians;
                    
                    $gregorian->day = $_POST['jour'];
                    $gregorian->year = $_POST['annee'];
        
                    $jj = gregoriantojd( $_POST['mois'] , $gregorian->day , $gregorian->year );
                    $resultat = jddayofweek($jj,0);
                    
                    $resultat = $gregorian->JourEnLettre($resultat);     
                    
                    $gregorian->month = $gregorian->MoisEnLettre($_POST['mois']);
                     
                    echo "<p class='alert alert-success'> Le ".$gregorian->day." ".$gregorian->month." ".$gregorian->year." est un <strong>".$resultat."</strong></p>";   
                    }     
                else
                    {
                    echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
                    }    
           		 }
                
            */ 
                
            /* Algorithme de Mike Keith */
                
            if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
            	{
                if ($_POST['annee'] >= 1583 )
                	{
                	$gregorian = new gregorians;
                	
                	$gregorian->day = $_POST['jour'];
                	$gregorian->month = $_POST['mois'];
                	$gregorian->year = $_POST['annee'];
                	
                	if ($gregorian->month >= 3)
                		{
                		$z = $gregorian->year;
                		$day = (((23 * $gregorian->month) / 9) + $gregorian->day + 4 + $gregorian->year + ($z / 4) - ($z / 100) + ($z / 400) - 2 ) % 7;
                		}
                	else
                		{
                		$z = $gregorian->year - 1;
                		$day =  (((23 * $gregorian->month) / 9)+ $gregorian->day + 4 + $gregorian->year + ($z / 4) - ($z / 100) + ($z / 400) ) % 7;
                		}
                			
                	$day = $gregorian->JourEnLettre($day-1); 
                	$gregorian->month = $gregorian->MoisEnLettre($gregorian->month);
                			
                	echo "<p class='alert alert-success'> Le ".$gregorian->day." ".$gregorian->month." ".$gregorian->year." est un <strong>".$day."</strong></p>";   
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