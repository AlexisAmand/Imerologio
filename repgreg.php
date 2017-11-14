<?php include('config.php');?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">

<title>Conversion entre le calendrier grégorien et calendrier républicain</title>

<meta name="description" content="cet outil permet de convertir une date du calendrier républicain en date du calendrier grégorien">

<!-- link href="style.css" rel="stylesheet" type="text/css" / -->

<link href="style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lobster&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<!-- bulles -->

<link rel="stylesheet" type="text/css" href="tooltipster/css/tooltipster.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
<script type="text/javascript" src="tooltipster/js/jquery.tooltipster.min.js"></script>

<script>
        $(document).ready(function() {
            $('.tooltip').tooltipster();

            $('#gregrep').tooltipster({content: $('<span style="text-align:justify;">Permet de convertir une date <br/>du calendrier grégorien en une<br/> date du calendrier républicain</span>')});

            $('#repgreg').tooltipster({content: $('<span style="text-align:justify;">Permet de convertir une date <br/>du calendrier républicain en une<br/> date du calendrier grégorien</span>')});

            $('#jourdate').tooltipster({content: $('<span style="text-align:justify;">Permet de trouver à quel jour<br/> de la semaine correspond<br/>une date donnée</span>')});
        });
</script>

</head>

<body>
	
<div id="container">
	
  <h1 class="titre"><a href="index.php">Convertisseur Date Grégorienne / Date Républicaine</a></h1>
  <p class="version"><?php echo SITE_VERSION; ?></p>

  <header></header>

<section>
	
    <article>

    <h1>Convertir une date républicaine en date grégorienne</h1>

    <h4>Consignes</h4>

    <p>- Indiquez votre date et cliquez sur le bouton convertir.</p>
    <p>- Cet outil convertit les dates comprises entre l'an I et l'an XIV (22 Septembre 1792 à 22 Septembre 1806 en calendrier grégorien). Il couvre plus que la durée d'existence du calendrier, mais c'est pour des raisons techniques.</p>

    <h4>C'est parti !</h4>

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
            echo "<p style='padding-left:10px;background-color:#ff8989;color:#FFFFFF;'>La date entrée n'est pas correcte !</p>";
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

            echo "<p style='background-color:#dbff67;padding-left:10px;'> Le <strong>".$day." ".$month." an ".$year."</strong> correspond au <strong>".$republic[1]." ".$republic[0]." ".$republic[2]."</strong></p>";
            }
        }

    ?>	

    </article>

    <aside>
   
        <nav>
            <ul>
                <li id="gregrep"><a href="index.php" title="Convertir une date du calendrier grégorien en date du calendrier républicain">Grégorien vers Républicain</a></li>
                <li id="repgreg"><a href="repgreg.php" title="Convertir une date du calendrier républicain en date du calendrier grégorien">Républicain vers Grégorien</a></li>
                <li id="jourdate"><a href="jourdelasemaine.php" title="Trouver à quel jour de la semaine correspond une date donnée">Jour d'une date</a></li>
            </ul>
        </nav>

    <div  style='border:1px solid #dadada;width:196px; padding:0px 10px 10px 10px;'>

    <h4>Dernières conversions</h4>

    <?php

    /*
    echo $historique;
    */

    if (isset($historique))
        {
        echo "<ul>";
        $tableau = explode('/', $historique);
        for ($i = 0; $i < count($tableau) - 1; $i+=3)
            {
            echo "<li>".$tableau[$i];

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
        echo "</ul>";
        }

    if ($compteur == 1)
        {
        echo "<p style='text-align:center;'>Vous n'avez pas<br />encore fait de conversion.</p>";
        }
    else
        {
        
        }

    ?>

    </div>

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

	<div style="clear:both;"></div>
	
	<footer style="text-align:center;">
    Cette page est en phase de test. Vous pouvez me laisser vos remarques sur Twitter via <a href="https://twitter.com/alexisamand">@alexisamand</a> ou sur facebook via <a href="https://www.facebook.com/alexisamand">https://www.facebook.com/alexisamand</a><br /><br />© 2015-2017 Alexis AMAND
	</footer>

</div>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//www.genealexis.fr/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 8]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//www.genealexis.fr/piwik/piwik.php?idsite=8" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

<!-- Piwik Image Tracker-->
<img src="http://www.genealexis.fr/piwik/piwik.php?idsite=8&rec=1" style="border:0" alt="" />
<!-- End Piwik -->

</body>
</html>