<?php require('../class/class.php'); ?>
<?php require('../config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title>Conversion du calendrier grégorien vers le calendrier républicain | <?php echo SITE_TITLE; ?></title>
		<meta name="description" content="Application en ligne permettant de convertir une date du calendrier grégorien en date du calendrier républicain">
		
		<meta name="google-site-verification" content="NrJvg2SL3r8GToGISpF-SJatGnKIvS5mekxb-2uTef4" />
						
    	<!-- Jquery 3.3.1 -->
    	
    	<script src="../js/jquery-3.3.1.min.js"></script>						
						
		<!-- Bootstrap 4.1.0 -->
		
		<link href="../css/bootstrap.css" rel="stylesheet">	
		<script src="../js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="../css/style.css" rel="stylesheet">
		
		<!-- font awesome 5.0.10 -->
		
		<link href="../css/fontawesome-all.css" rel="stylesheet">
		
		<!-- code piwik pour les stats -->
		
		<?php include('../include/piwik.php'); ?>
		
		<!-- test -->
		
		<link href="flags/flags.css" rel="stylesheet">	

   	</head>
	
<body>

<div class="container">

 	<header class="row">
 	
 		<div class="col-md-12">
 		
		<?php 
		
		
		
		if (isset($_GET['langue']))
			{
			$lg = $_GET['langue'];
				
			/* la langue est mise dans le cookie */	
			setcookie('langue',$lg);
			
			/* test du contenu du cookie */
			echo "la page est en ".$_COOKIE['langue'];
			
			/* include de la langue qui correspond */
			}
		else
			{
			/* si pas de langue choisie, c'est en fr par défaut */	
			/* include de la langue fr */
			setcookie('langue', 'fr');
			echo "la page est en ".$_COOKIE['langue'];
			}
		
		?>
 		
 		<br />
 		
 		<a href="?langue=fr"><img src="flags/blank.gif" class="flag flag-fr" alt=" " /></a>
 		<a href="?langue=gb"><img src="flags/blank.gif" class="flag flag-gb" alt=" " /></a>
 		</div>
		 	
 		<div class="col-md-12">
 		
 		<h1 class="text-center"><?php echo SITE_TITLE; ?></h1>
 		<p class="text-center"><?php echo SITE_SLOGAN; ?></p>
 		
 		</div>
 	</header>
 	
 	<section class="row">
 		<article class="col-md-9">
 		
 		<h3>Page de tests divers</h3>	
 		
 		<h5>Un peu d'histoire</h5>
 		
 		<p class="text-justify">Le calendrier grégorien a été concu par Christophorus Clavius à la demande du pae Grégoire XIII pour corriger la dérive du calendrier julien qui était en usage depuis 46 avant Jésus-Christ. Il est adopté le 24 février 1582 et appliqué le 15 octobre 1582. Il va ensuite s'imposer dans le monde entier pour les usages civils, parfois en parallèle aux calendriers traditionnels ou religieux. En France, le passage se fit dès décembre 1582.</p>
 		
 		<h5>Comment ça marche ?</h5>

    	<p>- Indiquez votre date et cliquez sur le bouton convertir.<br />
   		- Votre date doit être comprise entre le <strong>22 septembre 1792</strong> (1er vendémiaire an I, jour de proclamation de la République) et le <strong>1er janvier 1806</strong>, 		date d&#39;application du sénatus-consulte signé par Napoléon le 22 fructidor an XIII (9 septembre 1805) qui abroge le calendrier républicain et instaure le retour au calendrier grégorien .</p>

    	<h5>Convertir une date</h5>
 		
 				
 		<form method="post" action="index.php" class="form-inline justify-content-center">
 			
     		<div class="form-group">
    		<label for="jours">Jour</label>
    		<select name="jour" class="form-control m-2">
              <option selected>1</option>
              <?php
              for($i=2; $i<32; $i++)
                {
                echo "<option value=".$i.">".$i."</option>";
                }
              ?>
            </select>
    		</div>
    		
    		<div class="form-group">
    		<label for="sujet">Mois</label> 		
		    <select name="mois" class="form-control m-2">
			      <option value="1" selected>Janvier</option>
			      <?php
		      	  $MoisGregoriens = array("Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
		          $i = 2;
		          foreach($MoisGregoriens as $val)
		          	{
		        	echo "<option value=".$i.">".$val."</option>";
		        	$i++;
		        	}
		      	  ?>
		    </select>
       		</div>
    		
    		<div class="form-group">
    		<label for="sujet">Année</label>
    		<select name="annee" class="form-control m-2">
                  <option selected>1792</option>
                  <?php
                  for($i=1793; $i<1806; $i++)
                    {
                    echo "<option value=".$i.">".$i."</option>";
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
    
 			<input type="submit" value="Convertir !" class="btn btn-outline-secondary">
 						
 	  	</form>
 	  	 	  	
 	 	<?php 

        if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
            {
            $gregorian = new gregorians;         
                
            $gregorian->day = $_POST['jour'];
            $gregorian->month = $_POST['mois'];
            $gregorian->year = $_POST['annee'];
    
            $jj = gregoriantojd ( $gregorian->month , $gregorian->day , $gregorian->year );
            $resultat = jdtofrench($jj);
    
            if ($resultat == "0/0/0")
                {
                echo "<p class='alert alert-warning'>La date entrée n'est pas correcte !</p>";
                }
            else
                {
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
    
        ?>	 
 	  			 	  
		</article>  
		
 		<aside class="col-md-3">
 				
 			<?php include('../include/aside.php');?>
 		
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
        
        if ($compteur == 1)
            {
            echo "<li class='list-group-item'>Vous n'avez pas<br />encore fait de conversion.</li>";
            }

        ?>
        
        </ul>
          </div>      
 		</aside>
 	
 	</section>
 	
 	<footer class="row">
 		<?php include('../include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>