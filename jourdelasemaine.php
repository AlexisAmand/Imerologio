<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>A quel jour de la semaine correspond cette date ?</title>
		<meta name="description" content="Application en ligne pour trouver à quel jour de la semaine correspond une date donnée">

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

    	<h3>A quel jour correspond une date ?</h3>

    		<h5>Un peu d'histoire</h5>
 	
		 	<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		 		
		 	<h5>Comment ça marche ?</h5>

    		<p>- Indiquez votre date et cliquez sur le bouton "Trouver !".<br />
    		- Votre date doit être composée de 4 chiffres !</p>

    		<h5>Trouver un jour</h5>

    		<form method="post" action="jourdelasemaine.php" class="form-inline justify-content-center">

            	<label>Jour</label> : 
            
            	<div class="form-group">
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
            	<label>Année</label> :            
                <input type="text" name="annee" class="form-control m-2">
                </div>
                              
                <input type="submit" value="Convertir !" class="btn btn-outline-secondary">

   			 </form>

     		<?php 

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
        
            ?>

		</article>
   
    	<aside class="col-md-3">
   
       		<nav><?php include('include/aside.php');?></nav>

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
					
	</section>
	
 	<footer class="row">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>