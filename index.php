<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title>Conversion du calendrier grégorien vers le calendrier républicain</title>
		<meta name="description" content="Application en ligne permettant de convertir une date du calendrier grégorien en date du calendrier républicain">
						
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
 		
 		<h4>Comment ça marche ?</h4>

    	<p>Indiquez votre date et cliquez sur le bouton convertir.</p>
   		<p class="text-justify">Votre date doit être comprise entre le <strong>22 septembre 1792</strong> (1er vendémiaire an I, jour de proclamation de la République) et le <strong>1er janvier 1806</strong>, date d&#39;application du sénatus-consulte signé par Napoléon le 22 fructidor an XIII (9 septembre 1805) qui abroge le calendrier républicain et instaure le retour au calendrier grégorien .</p>

    	<h4>C'est parti !</h4>
 		
 				
 		<form method="post" action="index.php" style="text-align:center;" class="form-inline">
 			
     		<div class="form-group">
    		<label for="jours">Jour</label>
    		<select name="jour" class="form-control">
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
            <select name="mois" class="form-control">
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
    		</div>
    		
    		<div class="form-group">
    		<label for="sujet">Année</label>
    		<select name="annee" class="form-control">
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
    
 			<br /><br /><input type="submit" value="Convertir !" class="btn btn-default">	
 			
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
    
                switch($republic->month)
                    {
                        case '1': $republic->month = "Vendémiaire"; Break;
                        case '2': $republic->month = "Brumaire"; Break; 
                        case '3': $republic->month = "Frimaire"; Break; 
                        case '4': $republic->month = "Nivôse"; Break;
                        case '5': $republic->month = "Pluviôse"; Break;
                        case '6': $republic->month = "Ventôse"; Break;
                        case '7': $republic->month = "Germinal"; Break; 
                        case '8': $republic->month = "Floréal"; Break;
                        case '9': $republic->month = "Prairial"; Break;
                        case '10': $republic->month = "Messidor"; Break;
                        case '11': $republic->month = "Thermidor"; Break; 
                        case '12': $republic->month = "Fructidor"; Break;
                        case '13': $republic->month = "Sansculottide" ; Break;
                    }
    
                    switch($republic->year)
                    {
                        case '1': $republic->year = "I"; Break;
                        case '2': $republic->year = "II"; Break; 
                        case '3': $republic->year = "III"; Break; 
                        case '4': $republic->year = "IV"; Break;
                        case '5': $republic->year = "V"; Break;
                        case '6': $republic->year = "VI"; Break;
                        case '7': $republic->year = "VII"; Break; 
                        case '8': $republic->year = "VIII"; Break;
                        case '9': $republic->year = "IX"; Break;
                        case '10': $republic->year = "X"; Break;
                        case '11': $republic->year = "XI"; Break; 
                        case '12': $republic->year = "XII"; Break;
                        case '13': $republic->year = "XIII" ; Break;
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
    
                    echo "<p class='alert alert-success'> Le <strong>".$gregorian->day." ".$gregorian->month." ".$gregorian->year."</strong> correspond au <strong>".$republic->day." ".$republic->month." an ".$republic->year."</strong></p>";
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
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>
