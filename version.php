<?php include('config.php');?>

<!doctype html>
<html lang="fr">
<head>

<meta charset="utf-8">

<title>A quel jour de la semaine ?</title>

<meta name="description" content="Trouver à quel jour de la semaine correspond une date donnée">

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
	
<div style="width:975px;margin-left: auto;margin-right:auto;background-color:#ffffff;margin-top:0px;padding-top:0px;-webkit-box-shadow: 5px 5px 10px 0 #B0B0B0;box-shadow: 5px 5px 10px 0 #B0B0B0;">
	
  <a href="index.php">	
  <h1 style="padding-left:25px;padding-top:25px;font-family: 'Lobster', cursive;">Convertisseur Date Grégorienne / Date Républicaine</h1></a>
  <p style="text-align:right;margin-right:10px;font-size:9px;"><?php echo SITE_VERSION; ?></p>

  <header id="header"></header>

<section>
	
    <article>

<h1>Historique des versions</h1>

<h4>version 0.0.3 (18/11/15)</h4>

- mise en ligne du convertisseur gregorien -> républicain<br />
- ajout du code piwik<br />
- ajout d'un historique des dernières conversions<br />
- modification de la charte graphique pour que ce soit plus joli :)<br />

<h4>version 0.2 (19/11/15)</h4>

- préparation page du convertisseur gregorien -> républicain<br />
- ajout d'un menu pour basculer entre les convertisseurs<br />
- ajout pub<br />
- ajout du convertisseur republicain vers grégorien<br/>
- ajout d'une page qui proposera le script qui permet de trouver à quel jour de la semaine correspond une date donnée.<br/>
- encore qq problèmes mais le script "quel est la date du jour" est fonctionnel<br/>

<h4>version 0.2.1 (20/11/15)</h4>

- retouches sur la mise en page<br />
- ajout des title=""<br />
- tooltips sur les liens du menu (???)<br />
- modification du header pour que ce soit un peu plus en rapport avec le thème<br />
- modification de l'affichage des dernières dates converties<br />

<h4>version 0.2.2</h4>

- des tooltips sont dispos sur tous les éléments du menu<br />
- GWT : 4 urls soumises et 3 urls enregistrées<br />
- resolution d'un bug lié à l'encodage en utf-8 des caractères<br />
- modification de la balise meta de la page "jour d'une date"<br />

<h4>fonctions reportées</h4>

- il faudrait mettre des (?) et quand les gens cliquent dessus, ça affiche l'aide<br />
- les utilisateurs peuvent laisser un commentaire<br />


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
    Cette page est en phase de test. Vous pouvez me laisser vos remarques sur Twitter via <a href="https://twitter.com/alexisamand">@alexisamand</a> ou sur facebook via <a href="https://www.facebook.com/alexisamand">https://www.facebook.com/alexisamand</a><br /><br />© 2015 Alexis AMAND
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

