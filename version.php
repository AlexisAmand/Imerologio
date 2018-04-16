<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Historique des versions</title>
		<meta name="description" content="Historique des versions">

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

    		<h4>Historique des versions</h4>
    		
    			<h5>version 0.4.13 (16/04/18)</h5>
    			
    				- Ajout d'un README.md et mise sur GitHub<br />
    				- Retouches sur charte graphique<br />
    				- Mise à jour de Bootstrap vers la version 4.1.0 <br />
    				- Mise à jour de font awesome vers la version 5.0.10<br />
    				- Mise à jour de Jquery vers la version 3.3.1<br />
    				- Création d'une page erreur 404<br />
    				- Mise à jour du contenu<br />
    				- Optimisation du code source<br />
    		
    			<h5>version 0.4.6 (13/04/18)</h5>
    			
    				- Mise du code source sur Github<br />
    				- Suite du passage à Bootstrap<br />
    		
    			<h5>version 0.4.5 (13/04/18)</h5>

					- Mise du code source sur Github<br />
					- Ajout de Font Awesome 5.0.9<br />
					- J'ai enlevé la version "sans BT" de GitHub<br />
    
    			<h5>version 0.4.3 (13/04/18)</h5>
    
    				- Mise du code source sur Github<br />
    				- La page "Jour de Pâques" est maintenant disponible.<br />
    				- Suite du passage à Bootstrap.<br />
    				- Ajout des class gregorians et republicans pour optimiser le code source.<br />
    
    			<h5>version 0.4 (05/04/18)</h5>
    
                    - Le projet utilise maintenant Bootstrap.<br />
                    - La feuille de style est dans un fichier externe.<br />
    
                <h5>version 0.3.5 (21/03/18)</h5>
                
                    - petite mise à jour des css<br />
                    - dépot du code source sur GitHub<br />
                
                <h5>version 0.3.4 (19/03/18)</h5>
                
                    - Changement du code Piwik<br />
                    - Mise à jour des metas<br />
                   
                <h5>version 0.3.2 (14/11/17)</h5>
    
                    - 45/46 avertissements PHP a corrigé<br />
                    - les feuilles de style sont dans un fichier externe pour alleger le chargement des pages<br />
    
    			<h5>version 0.3 (13/11/17)</h5>
    
    				- le projet est maintenant gérer via github<br />
    
    			<h5>version 0.3 (18/11/15)</h5>
    
                    - mise en ligne du convertisseur gregorien -> républicain<br />
                    - ajout du code piwik<br />
                    - ajout d'un historique des dernières conversions<br />
                    - modification de la charte graphique pour que ce soit plus joli :)<br />
    
    			<h5>version 0.2 (19/11/15)</h5>
    
                    - préparation page du convertisseur gregorien -> républicain<br />
                    - ajout d'un menu pour basculer entre les convertisseurs<br />
                    - ajout pub<br />
                    - ajout du convertisseur republicain vers grégorien<br/>
                    - ajout d'une page qui proposera le script qui permet de trouver à quel jour de la semaine correspond une date donnée.<br/>
                    - encore qq problèmes mais le script "quel est la date du jour" est fonctionnel<br/>
    
    			<h5>version 0.2.1 (20/11/15)</h5>
    
                    - retouches sur la mise en page<br />
                    - ajout des title=""<br />
                    - tooltips sur les liens du menu (???)<br />
                    - modification du header pour que ce soit un peu plus en rapport avec le thème<br />
                    - modification de l'affichage des dernières dates converties<br />
    
    			<h5>version 0.2.2</h5>
    
                    - des tooltips sont dispos sur tous les éléments du menu<br />
                    - GWT : 4 urls soumises et 3 urls enregistrées<br />
                    - resolution d'un bug lié à l'encodage en utf-8 des caractères<br />
                    - modification de la balise meta de la page "jour d'une date"<br />
    
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
			
		<p style="text-align:center;">
		Cette page est en phase de test.<br />Vous pouvez me laisser vos remarques sur Twitter via <a href="https://twitter.com/alexisamand">@alexisamand</a> ou sur facebook via <a href="https://www.facebook.com/alexisamand">https://www.facebook.com/alexisamand</a>
		</p>
		
	</section>
	
 	<footer class="row">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>
