<?php include('config.php');?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">

<title>Conversion du calendrier grégorien vers le calendrier républicain</title>

<meta name="description" content="Application en ligne permettant de convertir une date du calendrier grégorien en date du calendrier républicain">

<meta name="google-site-verification" content="NrJvg2SL3r8GToGISpF-SJatGnKIvS5mekxb-2uTef4" />

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

    <h1>Convertir une date grégorienne en date républicaine</h1>

    <h4>Consignes</h4>

    <p>- Indiquez votre date et cliquez sur le bouton convertir.</p>
    <p>- Votre date doit être comprise entre le <strong>22 septembre 1792</strong> (1er vendémiaire an I, jour de proclamation de la République) et le <strong>1er janvier 1806</strong>, date d&#39;application du sénatus-consulte signé par Napoléon le 22 fructidor an XIII (9 septembre 1805) qui abroge le calendrier républicain et instaure le retour au calendrier grégorien .</p>

    <h4>C'est parti !</h4>

    <form method="post" action="index.php" style="text-align:center;">

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

    <select name="annee">
      <option selected>1792</option>
      <?php
      for($i=1793; $i<1806; $i++)
        {
        echo "<option value=".$i.">".$i."</option>";
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

        $jj = gregoriantojd ( $month , $day , $year );
        $resultat = jdtofrench($jj);

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

            echo "<p style='background-color:#dbff67;padding-left:10px;'> Le <strong>".$day." ".$month." ".$year."</strong> correspond au <strong>".$republic[1]." ".$republic[0]." an ".$republic[2]."</strong></p>";
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

    <div style='border:1px solid #dadada;width:196px; padding:0px 10px 10px 10px;'>

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

</body>
</html>