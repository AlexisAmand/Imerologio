<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		
		<title>Conversion du calendrier grégorien vers le calendrier républicain</title>
		<meta name="description" content=" ">
						
		<!-- Bootstrap 4.0.0 -->
		
		<link href="css/bootstrap.css" rel="stylesheet">	
    	
	    	   		
    	<!-- Jquery 3.2.1 -->
    	
    	<script src="js/jquery.js"></script>
    	
    	<script src="js/bootstrap.min.js"></script>	

   	</head>
	
<body style="background-image:url('img/fond.jpg')">

<div class="container" style="background-color:white;">

 	<header class="row" style="height:150px;">
 		<div class="col-md-12">
 		
 		<h1 class="text-center">Chronos</h1>
 		<p class="text-center">Convertir une date grégorienne en date républicaine</p>
 		
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
            $day = $_POST['jour'];
            $month = $_POST['mois'];
            $year = $_POST['annee'];
    
            $jj = gregoriantojd ( $month , $day , $year );
            $resultat = jdtofrench($jj);
    
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
                    case '1': $republic[0] = "Vendémiaire"; Break;
                    case '2': $republic[0] = "Brumaire"; Break; 
                    case '3': $republic[0] = "Frimaire"; Break; 
                    case '4': $republic[0] = "Nivôse"; Break;
                    case '5': $republic[0] = "Pluviôse"; Break;
                    case '6': $republic[0] = "Ventôse"; Break;
                    case '7': $republic[0] = "Germinal"; Break; 
                    case '8': $republic[0] = "Floréal"; Break;
                    case '9': $republic[0] = "Prairial"; Break;
                    case '10': $republic[0] = "Messidor"; Break;
                    case '11': $republic[0] = "Thermidor"; Break; 
                    case '12': $republic[0] = "Fructidor"; Break;
                    case '13': $republic[0] = "Sansculottide" ; Break;
                    }
    
                switch($republic[2])
                    {
                    case '1': $republic[2] = "I"; Break;
                    case '2': $republic[2] = "II"; Break; 
                    case '3': $republic[2] = "III"; Break; 
                    case '4': $republic[2] = "IV"; Break;
                    case '5': $republic[2] = "V"; Break;
                    case '6': $republic[2] = "VI"; Break;
                    case '7': $republic[2] = "VII"; Break; 
                    case '8': $republic[2] = "VIII"; Break;
                    case '9': $republic[2] = "IX"; Break;
                    case '10': $republic[2] = "X"; Break;
                    case '11': $republic[2] = "XI"; Break; 
                    case '12': $republic[2] = "XII"; Break;
                    case '13': $republic[2] = "XIII" ; Break;
                    }
    
                switch($month)
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
    
                echo "<p class='alert alert-success'> Le <strong>".$day." ".$month." ".$year."</strong> correspond au <strong>".$republic[1]." ".$republic[0]." an ".$republic[2]."</strong></p>";
                }
            }
    
        ?>	 
 	  			 	  
		</article>  
 	
 		<aside class="col-md-3">
 		
 		
 		
 		<div class="card">
            <div class="card-header">Titre</div>
       
 		
 		
 		
 
            <div class='list-group'>
                <a id="gregrep"  class='list-group-item list-group-item-action' href="index.php" title="Convertir une date du calendrier grégorien en date du calendrier républicain">Grégorien vers Républicain</a>
                <a id="repgreg" class='list-group-item list-group-item-action' href="repgreg.php" title="Convertir une date du calendrier républicain en date du calendrier grégorien">Républicain vers Grégorien</a>
                <a id="jourdate"   class='list-group-item list-group-item-action' href="jourdelasemaine.php" title="Trouver à quel jour de la semaine correspond une date donnée">Jour d'une date</a>
            </div>
            
     </div>
 		
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
 		
 	</footer>
 	
</div>

</body>
</html>
