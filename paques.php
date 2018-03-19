<?php include('config.php');?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">

<title>Conversion du calendrier grégorien vers le calendrier républicain</title>

<meta name="description" content="Application en ligne pour permettant de convertir une date du calendrier grégorien en date du calendrier républicain">

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
   
    <h4>C'est parti !</h4>

    <form method="post" action="paques.php" style="text-align:center;">

    <label>Année</label> : 

    <input type="text" name="annee">

    <br /><br />
    <input type="submit" value="Convertir !">

   </form>

   
     <?php 

    if (isset($_POST['annee']))
        {
        if (!empty($_POST['annee']))
            {
            $year = $_POST['annee'];
 
            echo  easter_date($year);
        
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

             echo "<p style='background-color:#dbff67;padding-left:10px;'> Le ".$day." ".$month." ".$year." est un <strong>".$resultat."</strong></p>";   
             
            }     
        else
            {
            echo "<p style='padding-left:10px;background-color:#ff8989;color:#FFFFFF;'>La date entrée n'est pas correcte !</p>";
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