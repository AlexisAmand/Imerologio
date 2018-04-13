<?php include('class/class.php'); ?>
<?php include('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>A quel jour de la semaine correspond cette date ?</title>
		<meta name="description" content="Application en ligne pour trouver à quel jour de la semaine correspond une date donnée">

        <!-- Jquery 3.2.1 -->
    	
    	<script src="js/jquery.js"></script>						
						
		<!-- Bootstrap 4.0.0 -->
		
		<link href="css/bootstrap.css" rel="stylesheet">	
		<script src="js/bootstrap.min.js"></script>	

		<!-- CSS perso -->
		
		<link href="css/style.css" rel="stylesheet">
		
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

    	<h4>A quel jour correspond une date ?</h4>

    		<h5>Comment ça marche ?</h5>

    		<p>
    		- Indiquez votre date et cliquez sur le bouton "Trouver !".<br />
    		- Votre date doit être composée de 4 chiffres !</p>

    		<h5>C'est parti !</h5>

    		<form method="post" action="jourdelasemaine.php" style="text-align:center;">

            	<label>Jour</label> : 
            
                <select name="jour">
                  <option selected>1</option>
                  <?php
                  for($i=2; $i<32; $i++)
                    {
                    echo "<option value=".$i.">".$i."</option>";
                    }
                  ?>
                </select>
            
            	<label>Mois</label> : 
            
                <select name="mois">
                    <option selected value="1">Janvier</option>
                    <option value="2">Février</option>
                    <option value="3">Mars</option>  
                    <option value="4">Avril</option>
                    <option value="5">Mai</option>
                    <option value="6">Juin</option>
                    <option value="7">Juillet</option>  
                    <option value="8">Aout</option>
                    <option value="9">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>  
                    <option value="12">Décembre</option>
                </select>
            
            	<label>Année</label> : 
            
                <input type="text" name="annee">
                <br /><br />
                <input type="submit" value="Trouver !">

   			 </form>

     		<?php 

            if (isset($_POST['jour']) and isset($_POST['mois']) and isset($_POST['annee']))
                {
                if (!empty($_POST['annee']))
                    {                    
                    $gregorian = new gregorians;
                    
                    $gregorian->day = $_POST['jour'];
                    $gregorian->month = $_POST['mois'];
                    $gregorian->year = $_POST['annee'];
        
                    $jj = gregoriantojd( $gregorian->month , $gregorian->day , $gregorian->year );
                    $resultat = jddayofweek($jj,0);
        
                    switch($resultat)
                            {
                            case '0': $resultat = "dimanche"; Break;
                            case '1': $resultat = "lundi"; Break; 
                            case '2': $resultat = "mardi"; Break; 
                            case '3': $resultat = "mercredi"; Break;
                            case '4': $resultat = "jeudi"; Break;
                            case '5': $resultat = "vendredi"; Break;
                            case '6': $resultat = "samedi"; Break; 
                            }
        
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
        
                            echo "<p style='background-color:#dbff67;padding-left:10px;'> Le ".$gregorian->day." ".$gregorian->month." ".$gregorian->year." est un <strong>".$resultat."</strong></p>";   
                    }     
                else
                    {
                    echo "<p style='padding-left:10px;background-color:#ff8989;color:#FFFFFF;'>La date entrée n'est pas correcte !</p>";
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
					
	</section>
	
 	<footer class="row">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>