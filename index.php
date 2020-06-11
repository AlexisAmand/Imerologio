<?php 

require('class/class.php'); 
require('config.php');
$erreur = 0;
$historique = "";

?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title>Conversion du calendrier grégorien vers le calendrier républicain | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne permettant de convertir une date du calendrier grégorien en date du calendrier républicain">
		
		<meta name="google-site-verification" content="NrJvg2SL3r8GToGISpF-SJatGnKIvS5mekxb-2uTef4" />
						
    	<!-- Jquery 3.4.1-->
    	
    	<script src="js/jquery-3.4.1.min.js"></script>						
						
		<!-- Bootstrap 4.3.1 -->
		
		<link href="css/bootstrap.min.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="css/style.css" rel="stylesheet">
		
		<!-- Font Awesome 5.8.2 -->
		
		<link href="css/fontawesome-all.min.css" rel="stylesheet">
		
   	</head>
	
<body>

<div class="container mt-4">

 	<header class="row">
		 	
 		<div class="col-md-12">
 		
 		<h1 class="text-center"><?php echo SITE_TITLE; ?></h1>
 		<p class="text-center"><?php echo SITE_SLOGAN; ?></p>
 		
 		</div>
     
 	</header>
 	
 	<section class="row">
 		<article class="col-md-9">
 		
 		<h3>Convertir une date grégorienne en date républicaine </h3>	
 		 		
 		<h5>Comment ça marche ?</h5>

     <p class="text-justify">Indiquez votre date et cliquez sur le bouton convertir. Votre date doit être comprise entre le <strong>22 septembre 1792</strong> (1er vendémiaire an I, jour de proclamation de la République) et le <strong>1er janvier 1806</strong>, 		date d&#39;application du sénatus-consulte signé par Napoléon le 22 fructidor an XIII (9 septembre 1805) qui abroge le calendrier républicain et instaure le retour au calendrier grégorien .</p>

 		<form method="post" action="index.php">
 		
		  <div class="form-row justify-content-center">
		  
		    <div class="form-group col-md-2">
		      <select id="inputDay" class="form-control" name="jour">
			      <option selected>Jour</option>
			      <?php
	              for($i=1; $i<32; $i++)
	                {
	                echo "<option value=".$i.">".$i."</option>";
	                }
	              ?>
		      </select>
		    </div>
		    
		    <div class="form-group col-md-2">
		      <select id="inputMonth" class="form-control" name="mois">
		          <option selected>Mois</option>
		          <?php
	      		  $MoisGregoriens = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
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
		      <select id="inputYear" class="form-control" name="annee">
		          <option selected>Année</option>
		          <?php
                  for($i=1792; $i<1806; $i++)
                	{
                    echo "<option value=".$i.">".$i."</option>";
                    }
                  ?>
		      </select>
		    </div>


        <input type="hidden" name="historique" value="<?php echo $historique; ?>" />
		        
		  </div>
		  
		  <div class="form-row justify-content-center">
		  
		  	<button type="submit" class="btn btn-outline-secondary">Convertir !</button>
		  
		  </div>
		  
		</form>
 	  	 	  	
      <?php 

        $erreur = 1;

        if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
            {
            $gregorian = new gregorians;
            
            $gregorian->day = $_POST['jour'];
            $gregorian->month = $_POST['mois'];
            $gregorian->year = $_POST['annee'];

            if (($gregorian->month == 'Jour') or ($gregorian->day == 'Mois') or ($gregorian->year == 'Année'))
              {
              echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
              $erreur = 1;
              }
            else
              {
  
              $jj = gregoriantojd ( $gregorian->month , $gregorian->day , $gregorian->year );
              $resultat = jdtofrench($jj);
      
              if ($resultat == "0/0/0")
                  {
                  echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
                  }
              else
                  {

                  /* ----- */
                  $historique = $_POST['historique'].$_POST['jour']."/".$_POST['mois']."/".$_POST['annee']."/";

                  $tabrepublic = explode("/", $resultat);
      
                  $republic = new republics;
                                          
                  $republic->month = $tabrepublic[0];
                  $republic->day = $tabrepublic[1];
                  $republic->year = $tabrepublic[2];
                  
                  $republic->month = $republic->MoisEnLettre($republic->month);
                      
                  $republic->year = $republic->AnneeEnLettre($republic->year);
                                  
                  $gregorian->month = $gregorian->MoisEnLettre($gregorian->month);
          
                  echo "<p class='alert alert-success'>Le <strong>".$gregorian->day." ".$gregorian->month." ".$gregorian->year."</strong> correspond au <strong>".$republic->day." ".$republic->month." an ".$republic->year."</strong></p>";
                  }
              }

            }
    
        ?>

      <h5>Un peu d'histoire</h5>
 		
 		  <p class="text-justify">Le calendrier grégorien a été conçu par Christophorus Clavius à la demande du pape Grégoire XIII pour corriger la dérive du calendrier julien qui était en usage depuis 46 avant Jésus-Christ. Il est adopté le 24 février 1582 et appliqué le 15 octobre 1582. Il va ensuite s'imposer dans le monde entier pour les usages civils, parfois en parallèle aux calendriers traditionnels ou religieux. En France, le passage se fit dès décembre 1582.</p>
 	  			 	  
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
        
        echo "";
        
        if (isset($historique))
            {
        
            $tableau = explode('/', $historique);
            for ($i = 0; $i < count($tableau) - 1; $i+=3)
                {
                echo "<li href='#' class='list-group-item'>".$tableau[$i];
        
                switch($tableau[$i + 1])
                    {
                    case '1': $month = "janvier"; Break;
                    case '2': $month = "février"; Break; 
                    case '3': $month = "mars"; Break; 
                    case '4': $month = "avril"; Break;
                    case '5': $month = "mai"; Break;
                    case '6': $month = "juin"; Break;
                    case '7': $month = "juillet"; Break; 
                    case '8': $month = "août"; Break;
                    case '9': $month = "septembre"; Break;
                    case '10': $month = "octobre"; Break;
                    case '11': $month = "novembre"; Break; 
                    case '12': $month = "décembre"; Break;
                    }
        
                 echo " ".$month." ";
        
                echo $tableau[$i + 2]."</li>";
                }
           
            }
        
        if ($historique == "")
            {
            echo "<li class='list-group-item text-center'>Vous n'avez pas<br />encore fait de conversion.</li>";
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

<!-- code piwik pour les stats -->
		
<?php include('include/piwik.php'); ?>

</body>
</html>