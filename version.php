<?php require('class/class.php'); ?>
<?php require('config.php');?>

<!DOCTYPE html>

<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title>Historique des versions | <?php echo SITE_TITLE; ?></title>
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

    		<h3>Historique des versions</h3>


				<h5>Bugs</h5>

					- Quand on arrive sur la page paques.php il y a un msg indiquant que la date n'est pas bonne
    		
    			<h5>Version 0.6.4 (20/04/18)</h5>

    				- Mise à jour du contenu (textes)<br />
    		
    			<h5>Version 0.6.3 (20/04/18)</h5>
    			
    				- Mise à jour du contenu (textes) et des metas<br />
    				- Mise à jour du script de calcul de l'épacte grégorienne<br />
    				
    				   	
    			<h5>Version 0.6.1 (20/04/18)</h5>
    			
    				- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- Mise en ligne de la nouveau version<br />		
    				- Mise à jour du contenu (textes)<br />
    		
    			<h5>version 0.6.0 (19/04/18)</h5>
    			
    				- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- Mise à jour des metas<br />
    				- Mise à jour du contenu (textes)<br />
    				- Utilisation de l'agorithme de Meeus pour le calcul de la date de pâques<br />
    				- Ajout du calcul de l'épacte grégorienne<br />
    				    				    		
    			<h5>version 0.5.2 (18/04/18)</h5>
    			
    				- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- Mise à jour du contenu (textes)<br />
    		
    			<h5>version 0.5.1 (18/04/18)</h5>
    			
      				- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- Ajout d'une rubrique pour calculer le Jour Julien<br />
    				- Le projet devient Imerológio<br />
    				  				
    			<h5>version 0.5 (17/04/18)</h5>
    			
    				- Retouches sur la charte graphique<br />
    				- Ajout d'un formulaire (non actif pour le moment) qui permet de calculer le Jour Julien<br />
    		
    			<h5>version 0.4.14 (16/04/18)</h5>
    		
    				- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- Suite du passage à Bootstrap<br />
    		
    			<h5>version 0.4.13 (16/04/18)</h5>
    			
    				- Ajout d'un README.md et mise sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- Retouches sur la charte graphique<br />
    				- Mise à jour de Bootstrap vers la version 4.1.0 <br />
    				- Mise à jour de font awesome vers la version 5.0.10<br />
    				- Mise à jour de Jquery vers la version 3.3.1<br />
    				- Création d'une page erreur 404<br />
    				- Mise à jour du contenu<br />
    				- Optimisation du code source<br />
    		
    			<h5>version 0.4.6 (13/04/18)</h5>
    			
    				- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- Suite du passage à Bootstrap<br />
    		
    			<h5>version 0.4.5 (13/04/18)</h5>

					- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
					- Ajout de Font Awesome 5.0.9<br />
					- J'ai enlevé la version "sans Bootstrap" de GitHub<br />
    
    			<h5>version 0.4.3 (13/04/18)</h5>
    
    				- Mise du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    				- La page "Jour de Pâques" est maintenant disponible<br />
    				- Suite du passage à Bootstrap<br />
    				- Ajout des class gregorians et republicans pour optimiser le code source.<br />
    
    			<h5>version 0.4 (05/04/18)</h5>
    
                    - Le projet utilise maintenant Bootstrap<br />
                    - La feuille de style est dans un fichier externe<br />
    
                <h5>version 0.3.5 (21/03/18)</h5>
                
                    - Petite mise à jour des css<br />
                    - Dépot du code source sur <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
                
                <h5>version 0.3.4 (19/03/18)</h5>
                
                    - Changement du code Piwik<br />
                    - Mise à jour des metas<br />
                   
                <h5>version 0.3.2 (14/11/17)</h5>
    
                    - 45/46 avertissements PHP a corrigé<br />
                    - Les feuilles de style sont dans un fichier externe pour alleger le chargement des pages<br />
    
    			<h5>version 0.3 (13/11/17)</h5>
    
    				- Le projet est maintenant géré via <a href="https://github.com/AlexisAmand/Imerologio">Github</a><br />
    
    			<h5>version 0.3 (18/11/15)</h5>
    
                    - Mise en ligne du convertisseur gregorien -> républicain<br />
                    - Ajout du code Piwik<br />
                    - Ajout d'un historique des dernières conversions<br />
                    - Modification de la charte graphique pour que ce soit plus joli :)<br />
    
    			<h5>version 0.2 (19/11/15)</h5>
    
                    - Préparation de la page du convertisseur gregorien -> républicain<br />
                    - Ajout d'un menu pour basculer entre les convertisseurs<br />
                    - Ajout pub<br />
                    - Ajout du convertisseur republicain vers grégorien<br/>
                    - Ajout d'une page qui proposera le script qui permet de trouver à quel jour de la semaine correspond une date donnée.<br/>
                    - Encore quelques problèmes mais le script "quelle est la date du jour" est fonctionnel<br/>
    
    			<h5>version 0.2.1 (20/11/15)</h5>
    
                    - Retouches sur la mise en page<br />
                    - Ajout des title=""<br />
                    - Tooltips sur les liens du menu (???)<br />
                    - Modification du header pour que ce soit un peu plus en rapport avec le thème<br />
                    - Modification de l'affichage des dernières dates converties<br />
    
    			<h5>version 0.2.2</h5>
    
                    - Des tooltips sont dispos sur tous les éléments du menu<br />
                    - GWT : 4 urls soumises et 3 urls enregistrées<br />
                    - Résolution d'un bug lié à l'encodage en utf-8 des caractères<br />
                    - Modification de la balise meta de la page "jour d'une date"<br />
    
		</article>
    
    	<aside class="col-md-3">
   
       		<nav><?php include('include/aside.php');?></nav>

    	</aside>

	
	</section>
	
 	<footer class="row text-center">
 		<?php include('include/footer.php'); ?> 		
 	</footer>
 	
</div>

</body>
</html>
