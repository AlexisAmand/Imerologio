<?php 

require('class/class.php'); 
require('config.php');

?>

<!doctype html>
<html lang="fr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
       
    <title>Convertisseur de calendriers anciens et actuels en Javascript</title>
	<meta name="description" content="Convertisseur des calendriers anciens et modernes : maya, republicain, gregorien, hebreux et julien. Vous devez avoir JavaScript activé pour que cette page fonctionne">
   
    <meta name="viewport" content="width=device-width, initial-scale=1" />

	<link href='http://fonts.googleapis.com/css?family=Short+Stack|Handlee|Varela+Round' rel='stylesheet' type='text/css'>
	
	<!-- Calendriers -->
	<script src="js/astro.js"></script>
	<script src="js/calendar.js"></script>

	<!-- Jquery 3.4.1-->
    	
    <script src="js/jquery-3.4.1.min.js"></script>
						
	<!-- Bootstrap 4.3.1 -->
		
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>

	<!-- CSS perso -->
		
	<link href="css/style.css" rel="stylesheet">
		
	<!-- Font Awesome 5.8.2 -->
		
	<link href="css/fontawesome-all.min.css" rel="stylesheet">
  
</head>

<body>

<div class="container mt-4">

 	<header class="row">
		 	
 		<div class="col-md-12">
 		
 		<h1 class="text-center"><?php echo SITE_TITLE; ?></h1>
 		<p class="text-center"><?php echo SITE_SLOGAN; ?></p>
 		
 		</div>
     
 	</header>

	 <section class="row">
 		<article class="col-md-9">

		<h3>Convertisseur "tout en un"</h3>

		<form name="warning" action="javascript:return false;" class="form-inline">

		<p class="text-justify">Ce convertisseur est adapté de "Calendar Converter" disponible sur <a href="https://www.fourmilab.ch/documents/calendar/">Fourmilab</a>. Autrefois présent sur mon site "La Généalogie Entre Amis", que j'ai administré de 2007 à 2015, il est de retour dans un version modernisée et remise au goût du jour. Pour que cette page fonctionne, vous devez avoir JavaScript activé, normalement c'est le cas sur la plupart des machines. Si la case suivante est allumée verte, c'est bon. </p>

		<input type="text" name="warning" style="background-color: red; color: #000000;" value=" " class="ctr form-control col-1" readonly="readonly"/>
		
		</form>
	
		<script>
		<!--
			//  Clear out "sorry, no JavaScript" message from text box.
			document.warning.warning.value = "   ";
			document.warning.warning.style.backgroundColor = "#82FA58";
		// -->
		</script>
		
		<h5 class="mt-5">Comment ça marche ?</h5>
	
		<p>Il suffit de selectionner une date dans le calendrier de départ de votre choix, et de cliquer sur le bouton "Calculer". Elle sera automatiquement convertie dans tous les autres calendriers de la page.</p>
	
		<h5 class="mt-5" id="CalendrierGregorien">Calendrier Grégorien</h5>
		
		<p class="text-justify">Le calendrier grégorien a été proclamé par le pape Grégoire XIII et est entré en vigueur dans la plupart des États catholiques en 1582. Le 4 octobre 1582 du calendrier julien a été suivi du 15 octobre du nouveau calendrier, corrigeant ainsi l'écart accumulé entre le <a href="#CalendrierJulien">calendrier julien</a> et l'équinoxe à partir de cette date. En comparant les dates historiques, il est important de noter que le calendrier grégorien, utilisé aujourd'hui de manière universelle dans les pays occidentaux et dans le commerce international, a été adopté à des époques différentes par différents pays. La Grande-Bretagne et ses colonies (y compris ce qui est aujourd'hui les États-Unis), ne sont pas passées au calendrier grégorien avant 1752, date à laquelle le mercredi 2 septembre du calendrier julien est devenu le jeudi 14 du calendrier grégorien.</p>
		
				<form name="gregorian" action="javascript:return false;" class="form-inline">

				<table class="ConvCal table table-bordered">
				<tr>
					<td>Jour</td>
					<td>
		    			<input type="text" name="wday" value="" size="9" class="ctr form-control" readonly="readonly" />
					</td>
				</tr>
				<tr>
					<td width="130"  >Date</td>
					<td width="210">
						<input type="text" name="day" value="1" size="3" class="form-control" />
					    <select name="month" size="1" class="form-control">
					        <option value="1">Janvier</option>
					        <option value="2">Février</option>
					        <option value="3">Mars</option>
					        <option value="4">Avril</option>
					        <option value="5">Mai</option>
					        <option value="6">Juin</option>
					        <option value="7">Juillet</option>
					        <option value="8">Août</option>
					        <option value="9">Septembre</option>
					        <option value="10">Octobre</option>
					        <option value="11">Novembre</option>
					        <option value="12">Decembre</option>
					    </select>
					    <input type="text" name="year" value="1998" size="5" class="form-control"/>
			    		<br />
					    <input type="text" name="leap" value="" size="12" class="ctr form-control mt-1 mr-1" readonly="readonly" />
					</td>
				</tr>
				<tr>
					<td>Heure</td>
					<td>
		    			<input type="text" name="hour" value="00" size="2" class="form-control"/> h
		    			<input type="text" name="min" value="00" size="2" class="form-control"/> min
		    			<input type="text" name="sec" value="00" size="2" class="form-control"/>
					</td>
				</tr>
				<tr>
					<td colspan="2" class="text-center">
						<input type="button" value="Calculer" onclick="calcGregorian();"  class="btn btn-outline-secondary"/>
						<input type="button" value="Aujourd'hui" onclick="setDateToToday(); calcGregorian();"  class="btn btn-outline-secondary"/>
					</td>
				</tr>
			</table>
	
		</form>

		<p class="text-justify">Le calendrier grégorien est une correction mineure du calendrier julien. Dans le calendrier julien, une année sur quatre est une année bissextile où le mois de février compte 29 jours, et non 28, mais dans le calendrier grégorien, les années divisibles par 100 ne sont pas des années bissextiles, sauf si elles sont également divisibles par 400. Comme le pape Grégoire était prescient ! Quels que soient les problèmes posés par le passage à l'an 2000, ils n'incluront pas une programmation bâclée qui suppose que chaque année divisible par 4 est une année bissextile depuis 2000, contrairement aux années précédentes et suivantes divisibles par 100, est une année bissextile. Comme dans le calendrier julien, on considère que les jours commencent à minuit.</p>

		<p class="text-justify">La durée moyenne d'une année dans le calendrier grégorien est de 365,2425 jours, alors que l'année solaire tropicale réelle (temps entre les équinoxes) est de 365,24219878 jours, de sorte que le calendrier accumule un jour d'erreur par rapport à l'année solaire environ tous les 3300 ans. En tant que calendrier purement solaire, aucune tentative n'est faite pour synchroniser le début des mois avec les phases de la Lune.</p>

		<p class="text-justify">Bien qu'on ne puisse pas parler de "dates grégoriennes" avant l'adoption du calendrier en 1582, le calendrier peut être extrapolé à des dates antérieures. Ce faisant, cette mise en œuvre utilise la convention selon laquelle l'année précédant l'année 1 est l'année 0, ce qui diffère du calendrier julien dans lequel il n'y a pas d'année 0 - l'année précédant l'année 1 dans le calendrier julien est l'année -1. La date du 30 décembre, 0 dans le calendrier grégorien correspond au 1er janvier, 1 dans le calendrier julien.</p>

		<p class="text-justify">Une légère modification du calendrier grégorien le rendrait encore plus précis. Si vous ajoutez la règle supplémentaire selon laquelle les années régulièrement divisibles par 4000 ne sont pas des années bissextiles, vous obtenez une année solaire moyenne de 365,24225 jours par an qui, par rapport à l'année moyenne réelle de 365,24219878, équivaut à une erreur d'un jour sur une période d'environ 19 500 ans ; cela est comparable aux erreurs dues au freinage de la rotation de la Terre par les marées.</p>
	
		<script>
		<!--
			//  Preset the fields in the request form to today's date.
			setDateToToday();
		// -->
		</script>

		<h5 class="mt-5" id="JourJulien">Jour Julien</h5>
		
		<p class="text-justify">Les astronomes, contrairement aux historiens, ont souvent besoin de faire de l'arithmétique avec des dates. Par exemple : une étoile double entre en éclipse tous les 1583,6 jours et sa dernière éclipse moyenne a été mesurée pour être le 17 octobre 2003 à 21:17 UTC. Quand aura lieu la prochaine éclipse ? Eh bien, vous pourriez sortir votre calendrier et compter les jours, mais il est beaucoup plus facile de convertir toutes les quantités en question en nombres de jours juliens et de faire simplement des additions ou des soustractions. Les jours juliens énumèrent simplement les jours et les fractions qui se sont écoulés depuis le début de l'ère julienne, qui est définie comme commençant à midi le lundi 1er janvier de l'année 4713 avant J.-C. dans le <a href="#CalendrierJulien">calendrier julien</a>. Cette date est définie en termes de cycle d'années, mais présente l'avantage supplémentaire que toutes les observations astronomiques historiques connues portent un nombre positif de jours juliens, et que les périodes peuvent être déterminées et les événements extrapolés par simple addition et soustraction. Les dates juliennes sont un peu excentriques en ce qu'elles commencent à midi, mais les astronomes (et les programmeurs de systèmes !) le sont aussi. Lorsque vous avez pris l'habitude de vous lever après le "crépuscule" et de faire la plupart de votre travail lorsque le Soleil est couché, vous appréciez d'enregistrer vos résultats dans un calendrier où la date ne change pas au milieu de votre journée de travail. Mais même la convention Julian Day témoigne de l'eurocentrisme de l'astronomie du XIXe siècle : midi à Greenwich est minuit à l'autre bout du monde. Mais la notation du jour julien est si profondément ancrée dans l'astronomie qu'il est peu probable qu'elle soit déplacée à un moment quelconque dans un avenir prévisible. C'est un système idéal pour stocker des dates dans des programmes informatiques, sans préjugés culturels ni discontinuités à diverses dates, et il peut être facilement transformé en d'autres systèmes de calendrier, comme l'illustre le code source de cette page. Utilisez les jours et fractions juliennes (stockés en nombres à virgule flottante de 64 bits ou plus) dans vos programmes, et soyez prêts pour les années 10K, 100K et 1MM !</p>
		
		<form name="julianday" action="javascript:return false;" class="form-inline">
		
		<div class="form-group row">
		
			<label class="col-auto col-form-label">Jour julien</label>
	
			<div class="col-auto"><input type="text" name="day" value="" size="16" class="form-control"/></div>
	
			<input type="button" value="Calculer" onclick="calcJulian();" class="btn btn-outline-secondary"/>
		
		</div>
		
		</form>
		
		<p class="text-justify">Si tout événement de l'histoire humaine peut s'écrire sous la forme d'un nombre positif de jours juliens, tous ces chiffres peuvent s'avérer lourds lorsqu'on travaille avec des événements contemporains. Un jour julien modifié (MJD) est créé en soustrayant 2400000,5 d'un nombre de jour julien, et représente donc le nombre de jours écoulés depuis minuit (00:00), temps universel, le 17 novembre 1858. Les jours juliens modifiés sont largement utilisés pour spécifier l'époque dans les tableaux des éléments orbitaux des satellites artificiels de la Terre. Comme aucun objet de ce type n'existait avant le 4 octobre 1957, tous les JJM liés aux satellites sont positifs.</p>
	
		<form name="modifiedjulianday" action="javascript:return false;" class="form-inline"> 

		<div class="form-group row">
		
			<label class="col-auto col-form-label">Jour julien modifié</label>
			
			<div class="col-auto"><input type="text" name="day" value="" size="16" class="form-control"/></div>
			
			<input type="button" value="Calculer" onclick="calcModifiedJulian();" class="btn btn-outline-secondary"/>
		
		</div>
		
		</form>
	
		<h5 class="mt-5" id="CalendrierJulien">Calendrier Julien</h5>
		
		<p class="text-justify">Le calendrier julien a été proclamé par Jules César en 46 av. J.-C. et a subi plusieurs modifications avant d'atteindre sa forme définitive en 8 de notre ère. Le calendrier julien ne diffère du calendrier grégorien que par la détermination des années bissextiles, sans la correction des années divisibles par 100 et 400 dans le <a href="#CalendrierGregorien">calendrier grégorien</a>. Dans le calendrier julien, toute année positive est une année bissextile si elle est divisible par 4 (les années négatives sont des années bissextiles si la valeur absolue divisée par 4 donne un reste de 1). On considère que les jours commencent à minuit.</p>
		
		<form name="juliancalendar" action="javascript:return false;" class="form-inline">
				
		<table class="ConvCal table table-bordered">
			<tr>
				<td>
					Date
				</td>
				<td>	
					<input type="text" name="day" value="" size="3" class="form-control"/>
					<select name="month" size="1" class="form-control">
						<option value="1">Janvier</option>
						<option value="2">Février</option>
						<option value="3">Mars</option>
						<option value="4">Avril</option>
						<option value="5">Mai</option>
						<option value="6">Juin</option>
						<option value="7">Juillet</option>
						<option value="8">Août</option>
						<option value="9">Septembre</option>
						<option value="10">Octobre</option>
						<option value="11">Novembre</option>
						<option value="12">Decembre</option>
					</select>
					<input type="text" name="year" value="" size="5" class="form-control"/>
					<br />
					<input type="text" name="leap" value="" size="12" class="ctr form-control mt-1 mr-1" readonly="readonly" />	
					<br />
					<input type="text" name="wday" value="" size="9" class="ctr form-control mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="button" value="Calculer" onclick="calcJulianCalendar();" class="btn btn-outline-secondary"/>
				</td>
			</tr>
		</table>
		</form>

		<p class="text-justify">Dans le calendrier julien, l'année moyenne a une durée de 365,25 jours, alors que l'année tropicale solaire réelle compte 365,24219878 jours. Le calendrier accumule donc un jour d'erreur par rapport à l'année solaire tous les 128 ans. Étant un calendrier purement solaire, aucune tentative n'est faite pour synchroniser le début des mois avec les phases de la Lune.</p>
		
		<h5 class="mt-5" id="CalendrierHebraique">Calendrier Hébraïque</h5>
		
		<p class="text-justify">Le calendrier hébreu (ou juif) tente de maintenir simultanément l'alignement des mois et des saisons et de synchroniser les mois avec la Lune - il est donc considéré comme un "calendrier luni-solaire". En outre, il existe des contraintes concernant les jours de la semaine où une année peut commencer et le décalage des jours supplémentaires nécessaires aux années précédentes pour maintenir la longueur de l'année dans les limites prescrites. Ce n'est pas facile, et les calculs nécessaires sont donc complexes.</p>

		<p class="text-justify">Les années sont classées en années communes (normales) ou emboliques (bissextiles) qui se produisent selon un cycle de 19 ans dans les années 3, 6, 8, 11, 14, 17 et 19. Lors d'une année embolique (bissextile), un mois supplémentaire de 29 jours, "Veadar" ou "Adar II", est ajouté à la fin de l'année après le mois "Adar", qui est désigné "Adar I" dans ces années. En outre, les années peuvent être déficientes, régulières ou complètes, ayant respectivement 353, 354 ou 355 jours dans une année commune et 383, 384 ou 385 jours dans les années emboliques. Les jours sont définis comme commençant au coucher du soleil, et le calendrier commence au coucher du soleil la nuit précédant le lundi 7 octobre, 3761 avant J.-C. dans le calendrier julien, ou le jour julien 347995.5. Les jours sont numérotés avec le dimanche comme jour 1, jusqu'au samedi : jour 7.</p>
		
		<p class="text-justify">La durée moyenne d'un mois est de 29,530594 jours, ce qui est extrêmement proche du mois synodique moyen (temps entre la nouvelle lune et la prochaine nouvelle lune) de 29,530588 jours. La précision est telle que plus de 13 800 ans s'écoulent avant qu'il y ait un écart d'un jour entre la moyenne du calendrier pour le début des mois et la durée moyenne de la nouvelle lune. L'alignement sur l'année solaire est meilleur que celui du calendrier julien, mais inférieur à celui du calendrier grégorien. La durée moyenne d'une année est de 365,2468 jours, alors que l'année solaire tropicale réelle (temps entre deux équinoxes) est de 365,24219 jours. Le calendrier accumule donc un jour d'erreur par rapport à l'année solaire tous les 216 ans.</p>
		
		<form name="hebrew" action="javascript:return false;" class="form-inline">
		
		<table class="ConvCal table table-bordered">
			<tr>
				<td>
					Date
				</td>
				<td>
					<input type="text" name="day" value="" size="3" class="form-control"/>
					<select name="month" size="1" class="form-control">
						<option value="1">Nisan</option>
						<option value="2">Iyyar</option>
						<option value="3">Sivan</option>
						<option value="4">Tammuz</option>
						<option value="5">Av</option>
						<option value="6">Elul</option>
						<option value="7">Tishri</option>
						<option value="8">Heshvan</option>
						<option value="9">Kislev</option>
						<option value="10">Teveth</option>
						<option value="11">Shevat</option>
						<option value="12">Adar</option>
						<option value="13">Veadar</option>
					</select>
					<input type="text" name="year" value="" size="5" class="form-control"/>
					<br />
					<input type="text" name="leap" value="" size="36" class="ctr form-control mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td>Mois hébraïque</td>
				<td>
					<img src="img/calendrier/hebrew_month_0.gif" name="hebmonth" width="186" height="51" alt="" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="button" value="Calculer" onclick="calcHebrew();" class="btn btn-outline-secondary"/>
				</td>
			</tr>
		</table>
		</form>

		<h5 class="mt-5" id="CalendrierMusulman">Calendrier Musulman (ou hégirien)</h5>
		
		<p class="text-justify">Le calendrier islamique est purement lunaire et se compose de douze mois alternant entre 30 et 29 jours, le dernier mois de 29 jours étant étendu à 30 jours lors des années bissextiles. Les années bissextiles suivent un cycle de 30 ans et se situent dans les années 1, 5, 7, 10, 13, 16, 18, 21, 24, 26 et 29. On considère que les jours commencent au coucher du soleil. Le calendrier commence le vendredi 16 juillet 622 de l'ère julienne, le jour julien 1948439.5, jour du vol de Mahomet de La Mecque à Médine, le coucher du soleil du jour précédent étant considéré comme le premier jour du premier mois de l'année 1 A.H.-"Anno Hegiræ"- le mot arabe pour "séparer" ou "partir". Les noms des jours ne sont que leurs numéros : Le dimanche est le premier jour et le samedi le septième ; la semaine est considérée comme commençant le samedi.</p>

		<p class="text-justify">Chaque cycle de 30 ans contient donc 19 années normales de 354 jours et 11 années bissextiles de 355, la durée moyenne d'une année est donc de ((19 × 354) + (11 × 355)) / 30 = 354.365... jours, avec une longueur moyenne de mois de 1/12 de ce chiffre, ou 29.53055... jours, ce qui se rapproche beaucoup du mois synodique moyen (temps entre la nouvelle lune et la prochaine nouvelle lune) de 29.530588 jours, le calendrier ne glissant que d'un jour par rapport à la lune tous les 2525 ans. Comme le calendrier est fixé à la Lune, et non à l'année solaire, les mois se décalent par rapport aux saisons, chaque mois commençant environ 11 jours plus tôt dans chaque année solaire successive.</p>

		<p class="text-justify">Le calendrier présenté ici est le calendrier civil le plus couramment utilisé dans le monde islamique ; à des fins religieuses, les mois sont définis comme commençant avec la première observation du croissant de la nouvelle lune.</p>
		
		<form name="islamic" action="javascript:return false;" class="form-inline">

		<table class="ConvCal table table-bordered">
			<tr>
				<td>Date</td>
				<td>
					<input type="text" name="day" value="" size="3" class="form-control"/>
					<select name="month" size="1" class="form-control">
						<option value="1">Muharram</option>
						<option value="2">Safar</option>
						<option value="3">Rabi`al-Awwal</option>
						<option value="4">Rabi`ath-Thani</option>
						<option value="5">Jumada l-Ula</option>
						<option value="6">Jumada t-Tania</option>
						<option value="7">Rajab</option>
						<option value="8">Sha`ban</option>
						<option value="9">Ramadan</option>
						<option value="10">Shawwal</option>
						<option value="11">Dhu l-Qa`da</option>
						<option value="12">Dhu l-Hijja</option>
					</select>
					<input type="text" name="year" value="" size="5" class="form-control"/>
					<br />
					<input type="text" name="leap" value="" size="12" class="ctr form-control mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td>Jour de la semaine</td>
					<td>
						<input type="text" name="wday" value="" size="18" class="ctr form-control mt-1 mr-1" readonly="readonly" />
					</td>
				</tr>
				<tr>
					<td colspan="2" class="text-center">
						<input type="button" value="Calculer" onclick="calcIslamic();" class="btn btn-outline-secondary"/>
					</td>
				</tr>
		</table>
		</form>

		<h5 class="mt-5" id="CalendrierPersan">Calendrier Persan</h5>
		
		<p class="text-justify">Le calendrier persan moderne a été adopté en 1925, supplantant (tout en conservant les noms des mois) un calendrier traditionnel datant du XIe siècle. Le calendrier se compose de 12 mois, dont les six premiers sont de 31 jours, les cinq suivants de 30 jours, et le dernier mois de 29 jours dans une année normale et de 30 jours dans une année bissextile.</p>

		<p class='text-justify'>Chaque année commence le jour où l'équinoxe de mars se produit à midi ou après le midi solaire à la longitude de référence pour l'heure normale de l'Iran (52°30' E). Les jours commencent à minuit dans le fuseau horaire standard. Il n'y a pas de règle d'année bissextile ; les années de 366 jours ne se répètent pas de façon régulière mais se produisent plutôt chaque fois que ce nombre de jours s'écoule entre les équinoxes au méridien de référence. Le calendrier reste donc parfaitement aligné sur les saisons. Aucune tentative n'est faite pour synchroniser les mois avec les phases de la Lune.</p>

		<p class='text-justify'>Le méridien de référence auquel l'équinoxe est déterminé dans ce calendrier fait l'objet d'une certaine controverse. Diverses sources citent Téhéran, Ispahan et le méridien central de l'Iran Standard Time comme celui où l'équinoxe est déterminé ; dans cette mise en œuvre, la longitude de l'Iran Standard Time est utilisée, car il semble que ce soit le critère utilisé en Iran aujourd'hui. Comme ce calendrier est prolétaire pour toutes les années antérieures à 1925 c.e., les considérations historiques concernant les capitales de la Perse et de l'Iran ne semblent pas s'appliquer.</p>
		
		<form name="persian" action="javascript:return false;" class="form-inline">

		<table class="ConvCal table table-bordered">
			<tr>
				<td>Date</td>
				<td>		
					<input type="text" name="year" value="" size="5" class="form-control"/>
					<select name="month" size="1" class="form-control">
						<option value="1">Farvardin</option>
						<option value="2">Ordibehesht</option>
						<option value="3">Khordad</option>
						<option value="4">Tir</option>
						<option value="5">Mordad</option>
						<option value="6">Shahrivar</option>
						<option value="7">Mehr</option>
						<option value="8">Aban</option>
						<option value="9">Azar</option>
						<option value="10">Dey</option>
						<option value="11">Bahman</option>
						<option value="12">Esfand</option>
					</select>
					<input type="text" name="day" value="" size="3" class="form-control"/>
					<br />
					<input type="text" name="leap" value="" size="12" class="ctr form-control mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td>Jour de la semaine</td>
				<td>
					<input type="text" name="wday" value="" size="13" class="ctr form-control mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="button" value="Calculer" onclick="calcPersian();" class="btn btn-outline-secondary"/>
				</td>
			</tr>
		</table>
		</form>

		<h5 class="mt-5" id="CalendrierMaya">Calendrier Maya</h5>
		
		<p class='text-justify'>Les Mayas utilisaient trois calendriers, tous organisés sous forme de hiérarchies de cycles de jours de durées diverses. Le Long Count était le principal calendrier à des fins historiques, le Haab servait de calendrier civil, tandis que le Tzolkin était le calendrier religieux. Tous les calendriers mayas sont basés sur le comptage en série des jours sans possibilité de synchronisation avec le Soleil ou la Lune, bien que les calendriers Long Count et Haab contiennent des cycles de 360 et 365 jours, respectivement, qui sont à peu près comparables à l'année solaire. Basé uniquement sur le comptage des jours, le Long Count ressemble davantage au système des jours juliens et aux représentations informatiques contemporaines de la date et de l'heure que les autres calendriers conçus dans l'Antiquité. Le fait que les jours et les cycles soient comptés à partir de zéro, et non d'un seul comme dans la plupart des autres calendriers, simplifie le calcul des dates, et que des nombres plutôt que des noms aient été utilisés pour tous les cycles, ce qui est également très moderne.</p>
		
		<form name="mayancount" action="javascript:return false;" class="form-inline"> 

		<table class="ConvCal table table-bordered">
			<tr>
				<td>
					<b>Mayan Long Count</b><br />
					<input type="text" name="baktun" value="" size="4" class="form-control"/><b>.</b>
					<input type="text" name="katun" value="" size="3" class="form-control"/><b>.</b>
					<input type="text" name="tun" value="" size="3" class="form-control"/><b>.</b>
					<input type="text" name="uinal" value="" size="3" class="form-control"/><b>.</b>
					<input type="text" name="kin" value="" size="3" class="form-control"/><p />
					<b>Haab</b>  <input type="text" name="haab" value="" size="9" class="ctr form-control mt-1 mr-1" readonly="readonly" /><br />
					<b>Tzolkin</b>  <input type="text" name="tzolkin" value="" size="10" class="ctr form-control mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="button" value="Calculer" onclick="calcMayanCount();" class="btn btn-outline-secondary"/>
				</td>
			</tr>
		</table>
		</form>

		<p class='text-justify'>Le calendrier Long Count est organisé selon la hiérarchie des cycles présentée à droite. Chacun des cycles est composé de 20 cycles plus courts, à l'exception du tun, qui comprend 18 uinaux de 20 jours chacun. Il en résulte un tun de 360 jours, qui maintient un alignement approximatif avec l'année solaire sur des intervalles modestes - le calendrier est défait du Soleil 5 jours par tun.</p>
		
		<table class="ConvCal table table-bordered">
			<tr>
				<th scope="col">Cycle</th>
				<th scope="col">Composé de</th>
				<th scope="col">Nombre total de jours</th>
				<th scope="col">Années (environ)</th>
			</tr>	
			<tr>
				<th scope="row">kin</th>
				<td> </td>
				<td>1</td>
				<td> </td>
			</tr>	
			<tr>
				<th scope="row">uinal</th>
				<td>20 kin</td>
				<td>20</td>
				<td> </td>
			</tr>	
			<tr>
				<th scope="row">tun</th>
				<td>18 uinal</td>
				<td>360</td>
				<td>0.986</td>
			</tr>	
			<tr>
				<th scope="row">katun</th>
				<td>20 tun</td>
				<td>7200</td>
				<td>19.7</td>
			</tr>	
			<tr>
				<th scope="row">baktun</th>
				<td>20 katun</td>
				<td>144,000</td>
				<td>394.3</td>
			</tr>	
			<tr>
				<th scope="row">pictun</th>
				<td>20 baktun</td>
				<td>2,880,000</td>
				<td>7,885</td>
			</tr>	
			<tr>
				<th scope="row">calabtun</th>
				<td>20 piktun</td>
				<td>57,600,000</td>
				<td>157,704</td>
			</tr>	
			<tr>
				<th scope="row">kinchiltun</th>
				<td>20 calabtun</td>
				<td>1,152,000,000</td>
				<td>3,154,071</td>
			</tr>	
			<tr>
				<th scope="row">alautun</th>
				<td>20 kinchiltun</td>
				<td>23,040,000,000</td>
				<td>63,081,429</td>
			</tr>
		</table>
		
		<p class='text-justify'>Les Mayas croyaient qu'à la fin de chaque cycle pictun d'environ 7 885 ans, l'univers était détruit et recréé. Ceux qui ont des penchants apocalyptiques seront soulagés de constater que le cycle actuel ne se terminera pas avant le jour de Christophe Colomb, le 12 octobre 4772 dans le calendrier grégorien. En parlant d'événements apocalyptiques, il est amusant de constater que le plus long des cycles du calendrier maya, alautun, environ 63 millions d'années, est comparable aux 65 millions d'années qui se sont écoulées depuis l'impact qui a fait tomber le rideau sur les dinosaures - un impact qui s'est produit près de la péninsule du Yucatan où, presque alautun plus tard, la civilisation maya a prospéré. Si l'univers doit être détruit et la fin du pictun actuel, il est inutile d'écrire les dates en utilisant les cycles les plus longs, donc nous les supprimons ici.</p>

		<p class='text-justify'>Les dates du calendrier Long Count sont écrites, par convention, comme :</p>

		<p class='text-center'>baktun . katun . tun . uinal . kin</p>

		<p class='text-justify'>et ressemblent donc aux adresses IP Internet actuelles !</p>
		
		<p class='text-justify'>À des fins civiles, les Mayas utilisaient le calendrier Haab dans lequel l'année était divisée en 18 périodes nommées de 20 jours chacune, suivies de cinq jours Uayeb qui n'étaient considérés comme faisant partie d'aucune période. Dans ce calendrier, les dates s'écrivent sous la forme d'un numéro de jour (de 0 à 19 pour les périodes régulières et de 0 à 4 pour les jours de Uayeb) suivi du nom de la période. Ce calendrier n'a pas de concept de numéro d'année ; il se répète simplement à la fin du cycle complet de 365 jours. Par conséquent, il n'est pas possible, compte tenu d'une date dans le calendrier Haab, de déterminer le compte long ou l'année dans d'autres calendriers. Le cycle de 365 jours s'aligne mieux sur l'année solaire que le cycle de 360 jours du calendrier long, mais en l'absence d'un mécanisme d'année bissextile, le calendrier de Haab décalait d'un jour par rapport aux saisons tous les quatre ans environ.</p>
		
		<p class='text-justify'>La religion maya utilisait le calendrier tzolkinien, composé de 20 périodes nommées de 13 jours. Contrairement au calendrier Haab, dans lequel les nombres de jours s'incrémentent jusqu'à la fin de la période, moment auquel le nom de la période suivante est utilisé et le compte des jours remis à zéro, les noms et les nombres du calendrier tzolkinien avancent en parallèle. Chaque jour successif, le numéro du jour est incrémenté de 1, étant remis à 0 lorsqu'il atteint 13, et le suivant dans le cycle de vingt noms y est apposé. Puisque 13 ne divise pas 20 de façon égale, il y a donc un total de 260 noms de jours et de périodes avant que le calendrier ne se répète. Comme pour le calendrier Haab, les cycles ne sont pas comptés et on ne peut donc pas convertir une date tzolkine en une date unique dans d'autres calendriers. Le cycle de 260 jours constitue la base des événements religieux mayas et n'a aucun rapport avec l'année solaire ou le mois lunaire.</p>

		<p class='text-justify'>Les Mayas ont fréquemment spécifié les dates en utilisant les calendriers Haab et Tzolkin ; les dates de cette forme ne se répètent que toutes les 52 années solaires.</p>

		<h5 class="mt-5" id="CalendrierBahai">Calendrier Bahá'í</h5>
		
		<p class="text-justify">Le Calendrier Bahá'í est utilisé dans la Foi Bahá'íe. C'est un calendrier solaire avec des années normales de 365 jours et des années bissextiles de 366 jours. Dans ce calendrier, l'année est divisée en 19 mois de 19 jours, auxquels s'ajoutent des "Jours Intercalaires" (4 en année normale et 5 en année bissextile) placés entre les 18ème et 19ème mois, du 26 février au 1er mars inclus. L'année du Calendrier Bahá'í commence à l'équinoxe de printemps (habituellement le 21 mars du Calendrier grégorien). Les jours commencent la veille au coucher du soleil et s'achèvent au coucher du soleil du jour en question. Il est également appelé Calendrier badīʿ.</p>

		<form name="bahai" action="javascript:return false;" class="form-inline">

		<table class="ConvCal table table-bordered">
			<tr>
				<td>Date</td>
				<td>
					Kull-i-Shay<input type="text" name="kull_i_shay" value="" size="3" class="form-control ml-1 mt-1 mr-1"/>
					Váhid<input type="text" name="vahid" value="" size="3" class="form-control ml-1 mt-1 mr-1"/>
					<br />Année
						<select name="year" size="1" class="form-control ml-1 mt-1 mr-1">
							<option value="1">Alif</option>
							<option value="2">Bá'</option>
							<option value="3">Ab</option>
							<option value="4">Dál</option>
							<option value="5">Báb</option>
							<option value="6">Váv</option>
							<option value="7">Abad</option>
							<option value="8">Jád</option>
							<option value="9">Bahá</option>
							<option value="10">Hubb</option>
							<option value="11">Bahháj</option>
							<option value="12">Javáb</option>
							<option value="13">Ahad</option>
							<option value="14">Vahháb</option>
							<option value="15">Vidád</option>
							<option value="16">Badí'</option>
							<option value="17">Bahí</option>
							<option value="18">Abhá</option>
							<option value="19">Vahíd</option>
						</select>
					<br />
					Mois
						<select name="month" size="1" class="form-control ml-1 mt-1 mr-1">
							<option value="1">Bahá</option>
							<option value="2">Jalál</option>
							<option value="3">Jamál</option>
							<option value="4">`Azamat</option>
							<option value="5">Núr</option>
							<option value="6">Rahmat</option>
							<option value="7">Kalimát</option>
							<option value="8">Kamál</option>
							<option value="9">Asmá'</option>
							<option value="10">`Izzat</option>
							<option value="11">Mashíyyat</option>
							<option value="12">`Ilm</option>
							<option value="13">Qudrat</option>
							<option value="14">Qawl</option>
							<option value="15">Masáil</option>
							<option value="16">Sharaf</option>
							<option value="17">Sultán</option>
							<option value="18">Mulk</option>
							<option value="19">Ayyám-i-Há</option>
							<option value="20">`Alá'</option>
						</select>
					<br />
					Jour 
						<select name="day" size="1" class="form-control ml-1 mt-1 mr-1">
							<option value="1">Bahá</option>
							<option value="2">Jalál</option>
							<option value="3">Jamál</option>
							<option value="4">`Azamat</option>
							<option value="5">Núr</option>
							<option value="6">Rahmat</option>
							<option value="7">Kalimát</option>
							<option value="8">Kamál</option>
							<option value="9">Asmá'</option>
							<option value="10">`Izzat</option>
							<option value="11">Mashíyyat</option>
							<option value="12">`Ilm</option>
							<option value="13">Qudrat</option>
							<option value="14">Qawl</option>
							<option value="15">Masáil</option>
							<option value="16">Sharaf</option>
							<option value="17">Sultán</option>
							<option value="18">Mulk</option>
							<option value="19">`Alá'</option>
						</select>
					<br />
					Jour de la semaine<input type="text" name="weekday" value="" size="9" class="ctr form-control ml-1 mt-1 mr-1" readonly="readonly" />
					<br />
					<input type="text" name="leap" value="" size="12" class="ctr form-control ml-1 mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="button" value="Calculer" onclick="calcBahai();" class="btn btn-outline-secondary"/>
				</td>
			</tr>
		</table>
		</form>

		<h5 class="mt-5" id="CalendrierCivilIndien">Calendrier Civil Indien</h5>
		
		<p class="text-justify">Une variété ahurissante de calendriers ont été et continuent d'être utilisés dans le sous-continent indien. En 1957, le Comité de réforme du calendrier du gouvernement indien a adopté le calendrier national de l'Inde à des fins civiles et, en outre, a défini des directives pour normaliser le calcul du calendrier religieux, qui est basé sur des observations astronomiques. Le calendrier civil est aujourd'hui utilisé dans toute l'Inde à des fins administratives, mais divers calendriers religieux restent en usage. Nous vous présentons ici le calendrier civil.</p> 

		<form name="indiancivilcalendar" action="javascript:return false;" class="form-inline">
		<table class="ConvCal table table-bordered">
			<tr>
				<td>Date</td>
				<td>			
					<input type="text" name="year" value="" size="5" class="form-control"/>
					<select name="month" size="1" class="form-control">
						<option value="1">Caitra</option>
						<option value="2">Vaisakha</option>
						<option value="3">Jyaistha</option>
						<option value="4">Asadha</option>
						<option value="5">Sravana</option>
						<option value="6">Bhadra</option>
						<option value="7">Asvina</option>
						<option value="8">Kartika</option>
						<option value="9">Agrahayana</option>
						<option value="10">Pausa</option>
						<option value="11">Magha</option>
						<option value="12">Phalguna</option>
					</select>
					<input type="text" name="day" value="" size="3" class="form-control"/>	
					<br />		
					Jour de la semaine 
					<input type="text" name="weekday" value="" size="15" class="ctr form-control mt-1 mr-1" readonly="readonly" />		
					<br />		
					<input type="text" name="leap" value="" size="12" class="ctr form-control mt-1 mr-1" readonly="readonly" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="button" value="Calculer" onclick="calcIndianCivilCalendar();" class="btn btn-outline-secondary"/>
				</td>
			</tr>
		</table>
		</form>
			
		<p class='text-justify'>Le calendrier national de l'Inde est composé de 12 mois. Le premier mois, Caitra, est de 30 jours en année normale et de 31 jours en année bissextile. Suivent cinq mois consécutifs de 31 jours, puis six mois de 30 jours. Les années bissextiles du calendrier indien se produisent les mêmes années que celles du calendrier grégorien ; les deux calendriers ont donc une précision identique et restent synchronisés.</p>
		
		<p class='text-justify'>Dans le calendrier indien, les années sont comptées à partir du début de l'ère Saka, l'équinoxe du 22 mars de l'année 79 dans le calendrier grégorien, désigné comme le 1er jour du mois Caitra de l'année 1 de l'ère Saka. Le calendrier a été officiellement adopté le 1er Caitra de l'ère Saka de 1879 ou le 22 mars 1957 du calendrier grégorien. Comme l'année 1 du calendrier indien diffère de l'année 1 du calendrier grégorien, pour déterminer si une année du calendrier indien est une année bissextile, il faut ajouter 78 à l'année de l'ère Saka puis appliquer la règle du calendrier grégorien à la somme.</p>
		
		<h5 class="mt-5" id="CalendrierRepublicain">Calendrier Républicain</h5>
		
		<p class='text-justify'>Le calendrier républicain français a été adopté par un décret de la Convention nationale le 5 octobre 1793 et est entré en vigueur le 24 novembre suivant, date à laquelle Fabre d'Églantine a proposé à la Convention les noms des mois. Il incarne l'esprit révolutionnaire de "Sortez avec les vieux ! qui a donné naissance en 1795 au système métrique des poids et mesures qui s'est avéré plus durable que le calendrier républicain.</p>
		
		<form name="french" action="javascript:return false;" class="form-inline">
		<table class="ConvCal table table-bordered" class="l">
			<tr>
				<td>Date</td>
				<td>
					Année
					<input type="text" name="an" value="" size="5" class="form-control mt-1 mr-1"/>
					de la République<br /> Mois de
					<select name="mois" size="1" class="form-control mt-1 mr-1">
						<option value="1">Vendémiaire</option>
						<option value="2">Brumaire</option>
						<option value="3">Frimaire</option>
						<option value="4">Nivôse</option>
						<option value="5">Pluviôse</option>
						<option value="6">Ventôse</option>
						<option value="7">Germinal</option>
						<option value="8">Floréal</option>
						<option value="9">Prairial</option>
						<option value="10">Messidor</option>
						<option value="11">Thermidor</option>
						<option value="12">Fructidor</option>
						<option value="13">(Sans-culottides)</option>
					</select>
					<br />
					Décade
					<select name="decade" size="1" class="form-control mt-1 mr-1">
						<option value="1">I</option>
						<option value="2">II</option>
						<option value="3">III</option>
					</select>
					Jour
						<select name="jour" size="1" class="form-control mt-1 mr-1">
						<option value="1">du Primidi</option>
						<option value="2">du Duodi</option>
						<option value="3">du Tridi</option>
						<option value="4">du Quartidi</option>
						<option value="5">du Quintidi</option>
						<option value="6">du Sextidi</option>
						<option value="7">du Septidi</option>
						<option value="8">du Octidi</option>
						<option value="9">du Nonidi</option>
						<option value="10">du Décadi</option>
						<option value="11">------------</option>
						<option value="12">de la Vertu</option>
						<option value="13">du Génie</option>
						<option value="14">du Travail</option>
						<option value="15">de l'Opinion</option>
						<option value="16">des Récompenses</option>
						<option value="17">de la Révolution</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="button" value="Calculer" onclick="calcFrench();" class="btn btn-outline-secondary"/>
				</td>
			</tr>
		</table>
		</form>

		<p class='text-justify'>Le calendrier se compose de 12 mois de 30 jours chacun, suivis d'une période de vacances de cinq ou six jours, les jours complémentaires ou sans-culottides. Les mois sont regroupés en quatre saisons ; les trois mois de chaque saison se terminent par les mêmes lettres et riment entre eux. Le calendrier commence à la date grégorienne du 22 septembre 1792, l'équinoxe de septembre et date de la fondation de la Première République. Ce jour est désigné comme le premier jour du mois de Vendémiaire de l'année 1 de la République. Les années suivantes commencent le jour de l'équinoxe de septembre, tel qu'il est calculé au méridien de Paris. Les jours commencent à minuit solaire vrai. La période des sans-culottides compte cinq ou six jours selon la date réelle de l'équinoxe. Par conséquent, il n'y a pas de règle des années bissextiles en soi : les années de 366 jours ne se répètent pas de façon régulière mais suivent plutôt les dictats de l'astronomie. Le calendrier reste donc parfaitement aligné sur les saisons. Aucune tentative n'est faite pour synchroniser les mois avec les phases de la Lune.</p>
		
		<p class='text-justify'>Le calendrier républicain est rare dans la mesure où il n'a pas le concept de semaine de sept jours. Chaque mois de trente jours est divisé en trois décades de dix jours chacune, dont la dernière, décadi, était le jour de repos. (Le mot "décade" peut prêter à confusion pour les anglophones ; le nom français désignant dix ans est "décennie"). Les noms des jours de la décade sont dérivés de leur nombre dans la séquence de dix jours. Les cinq ou six jours des sans-culottides ne portent pas les noms de la décade. Au contraire, chacun de ces jours fériés commémore un aspect de l'esprit républicain. Le dernier, le jour de la Révolution, n'a lieu que les années de 366 jours.</p>
		
		<p class='text-justify'>Napoléon abolit le calendrier républicain au profit du calendrier grégorien le 1er janvier 1806. La France, l'un des premiers pays à adopter le <a href="#CalendrierGregorien">calendrier grégorien</a> (en décembre 1582), est ainsi devenue le seul pays à l'abandonner puis à le réadopter par la suite. Pendant la période du soulèvement de la Commune de Paris en 1871, le calendrier républicain a de nouveau été brièvement utilisé.</p>
		
		<p class='text-justify'>Le décret initial qui a établi le calendrier républicain contenait une contradiction : il définissait l'année comme commençant le jour du véritable équinoxe d'automne à Paris, mais prescrivait en outre un cycle de quatre ans appelé la Franciade, dont la quatrième année se terminerait par le jour de la Révolution et qui comprendrait donc 366 jours. Ces deux spécifications sont incompatibles, car les années de 366 jours définies par l'équinoxe ne se répètent pas selon un cycle régulier de quatre ans. Ce problème a été reconnu peu après la proclamation du calendrier, mais celui-ci a été abandonné cinq ans avant que le premier conflit ne survienne et la question n'a jamais été formellement résolue. Nous supposons ici que la règle de l'équinoxe prévaut, car un cycle rigide de quatre ans ne serait pas plus précis que le calendrier julien, ce qui ne pourrait être l'intention de ses concepteurs républicains éclairés.</p>
		
		<h5 class="mt-5" id="Jour">Semaine et jour, et jour de l'année (norme ISO-8601)</h5>

		<p class='text-justify'>L'Organisation internationale de normalisation (ISO) a publié la norme ISO 8601, "Représentation des dates" en 1988, qui remplace la norme ISO 2015. L'essentiel de la norme consiste en des normes pour la représentation des dates dans le calendrier grégorien, y compris la forme "AAAA-MM-JJ", fortement recommandée, qui est sans ambiguïté, exempte de préjugés culturels, peut être triée dans l'ordre sans réarrangement et est conforme à l'an 9K. En outre, la norme ISO 8601 définit formellement la "semaine calendaire" que l'on rencontre souvent dans les transactions commerciales en Europe. La première semaine civile d'une année : la semaine 1, est celle qui contient le premier jeudi de l'année (ou, de manière équivalente, la semaine qui inclut le 4 janvier de l'année ; le premier jour de cette semaine est le lundi précédent). La dernière semaine : la semaine 52 ou 53, selon la date du lundi de la première semaine, est celle qui contient le 28 décembre de l'année. La première semaine civile ISO d'une année donnée commence par un lundi qui peut être aussi tôt que le 29 décembre de l'année précédente ou aussi tard que le 4 janvier de l'année en cours ; la dernière semaine civile peut se terminer aussi tard que le dimanche 3 janvier de l'année suivante. Les dates ISO 8601 sous forme d'année, de semaine et de jour s'écrivent avec un "W" précédant le numéro de semaine, qui porte un zéro de tête si celui-ci est inférieur à 10. Par exemple, le 29 février 2000 s'écrit 2000-02-29 sous forme d'année, de mois, de jour et 2000-W09-2 sous forme d'année, de semaine, de jour ; comme le nombre de jours ne peut jamais dépasser 7, un seul chiffre est nécessaire. Les traits d'union peuvent être supprimés par souci de concision et le numéro du jour peut être omis s'il n'est pas nécessaire. Vous verrez fréquemment des codes de date de fabrication tels que "00W09" estampillés sur les produits ; il s'agit d'une abréviation de 2000-W09, la neuvième semaine de l'an 2000.</p>

		<form name="isoweek" action="javascript:return false;" class="form-inline">

		<table class="table table-bordered">

		<tr>
		<td class="text-center">
			Jour 
			<input type="text" name="day" value="" size="3" class="form-control"/> 
			de la semaine
			<input type="text" name="week" value="" size="3" class="form-control"/>
			de l'année
			<input type="text" name="year" value="" size="5" class="form-control"/>
		</td>
		</tr>
		<tr>
		<td class="text-center">
			<input type="button" value="Calculer" onclick="calcIsoWeek();" class="btn btn-outline-secondary"/>
		</td>
		</tr>
		</table>
		</form>

		<p class='text-justify'>Dans les calendriers solaires tels que le calendrier grégorien, seuls les jours et les années ont une signification physique : les jours sont définis par la rotation de la Terre, et les années par son orbite autour du Soleil. Les mois, découplés des phases de la Lune, ne sont qu'un souvenir des calendriers lunaires oubliés, tandis que les semaines de sept jours sont entièrement une construction sociale. Alors que la plupart des calendriers utilisés aujourd'hui adoptent un cycle de sept jours de noms ou de nombres, des calendriers avec des cycles de noms allant de quatre à soixante jours ont été utilisés par d'autres cultures dans l'histoire./p>

		<p class='text-justify'>La norme ISO 8601 nous permet de nous débarrasser du bagage historique et culturel des semaines et des mois et d'exprimer une date simplement par le numéro de l'année et du jour au cours de cette année, allant de 001 pour le 1er janvier à 365 (366 dans une année bissextile) pour le 31 décembre. Ce format permet de faire facilement des calculs arithmétiques avec des dates à l'intérieur d'une année, et n'est que légèrement plus compliqué pour les périodes qui s'étendent sur plusieurs années. Vous verrez cette représentation utilisée dans la planification des projets et pour spécifier les dates de livraison. Dans ce format, les dates ISO s'écrivent "AAAA-JJJ", par exemple 2000-060 pour le 29 février 2000 ; les zéros de tête sont toujours écrits dans le numéro du jour, mais le trait d'union peut être omis pour des raisons de concision.</p>

		<form name="isoday" action="javascript:return false;" class="form-inline">
		<table class="table table-bordered">

		<tr>
		<td class="text-center">
			Jour <input type="text" name="day" value="" size="3"  class="form-control"/> de
			l'année <input type="text" name="year" value="" size="5"  class="form-control"/>
		</td>
		</tr>

		<tr>
		<td class="text-center">
		<input type="button" value="Calculate" onclick="calcIsoDay();"  class="btn btn-outline-secondary"/>
		</td>
		</tr>
		</table>
		</form>

		<p class='text-justify'>La norme ISO 8601 nous permet de nous débarrasser du bagage historique et culturel des semaines et des mois et d'exprimer une date simplement par le numéro de l'année et du jour au cours de cette année, allant de 001 pour le 1er janvier à 365 (366 dans une année bissextile) pour le 31 décembre. Ce format permet de faire facilement des calculs arithmétiques avec des dates à l'intérieur d'une année, et n'est que légèrement plus compliqué pour les périodes qui s'étendent sur plusieurs années. Vous verrez cette représentation utilisée dans la planification des projets et pour spécifier les dates de livraison. Dans ce format, les dates ISO s'écrivent "AAAA-JJJ", par exemple 2000-060 pour le 29 février 2000 ; les zéros de tête sont toujours écrits dans le numéro du jour, mais le trait d'union peut être omis pour des raisons de concision.</p>

		<h5 class="mt-5" id="Unix">Heure Unix (ou heure Posix)</h5>

		<p class='text-justify'>Le développement du système d'exploitation Unix a commencé aux Laboratoires Bell en 1969 par Dennis Ritchie et Ken Thompson, la première version du PDP-11 étant devenue opérationnelle en février 1971. Unix a judicieusement adopté la convention selon laquelle toutes les dates et heures internes (par exemple, l'heure de création et de dernière modification des fichiers) étaient conservées en temps universel, et converties en heure locale sur la base d'une spécification du fuseau horaire par utilisateur. Ce choix clairvoyant a permis d'intégrer beaucoup plus facilement les systèmes Unix dans des réseaux étendus sans avoir à gérer un chaos de paramètres horaires contradictoires.</p>

		<form name="unixtime" action="javascript:return false;" class="form-inline">
			<table class="table table-bordered">

			<tr>
			<td class="text-center">
				<b>Heure Unix (ou heure Posix)</b>
				<input type="text" name="time" value="" size="14" class="form-control"/>
			</td>
			</tr>
			<tr>
			<td colspan="2" class="text-center">
			<input type="button" value="Calculer" onclick="calcUnixTime();" class="btn btn-outline-secondary"/>
			</td>
			</tr>
			</table>
		</form>

		<p class='text-justify'>De nombreuses machines sur lesquelles Unix a été initialement largement déployé ne pouvaient pas supporter l'arithmétique sur des entiers de plus de 32 bits sans un coûteux calcul de précision multiple dans les logiciels. La représentation interne du temps a donc été choisie pour être le nombre de secondes écoulées depuis 00:00 temps universel le 1er janvier 1970 dans le calendrier grégorien (jour julien 2440587.5), le temps étant stocké sous forme d'un entier signé de 32 bits (long dans les premières implémentations C).</p>

		<p class='text-justify'>L'influence de la représentation du temps sous Unix s'est étendue bien au-delà d'Unix puisque la plupart des bibliothèques C et C++ sur d'autres systèmes fournissent des fonctions de date et d'heure compatibles avec Unix. Le principal inconvénient de la représentation du temps sous Unix est que, si elle est conservée sous forme de quantité signée 32 bits, le 19 janvier 2038, elle deviendra négative, ce qui entraînera le chaos dans les programmes non préparés à cette fin. Les implémentations Unix et C définissent judicieusement (pour les raisons décrites ci-dessous) le résultat de la fonction time() comme étant de type time_t, ce qui laisse la porte ouverte à la remédiation (en changeant la définition en un entier de 64 bits, par exemple) avant que l'horloge ne fasse tic-tac de la redoutable seconde du jugement dernier.</p>

		<p class='text-justify'>Les compilateurs C sur les systèmes Unix antérieurs à la 7e édition n'avaient pas le type long 32 bits. Sur les systèmes antérieurs, time_t, la valeur renvoyée par la fonction time(), était un tableau de deux ints de 16 bits qui, concaténés, représentaient la valeur de 32 bits. C'est la raison pour laquelle time() accepte un argument de pointeur vers le résultat (avant la 7ème édition, elle retournait un statut, et non le temps 32 bits) et ctime() nécessite un pointeur vers son argument d'entrée. Merci à Eric Allman (auteur de sendmail) de nous avoir signalé ces pépites historiques.</p>

		<h5 class="mt-5" id="ExcelSerialDay">Excel Serial Day Number</h5>

		<p class='text-justify'>Vous seriez donc en droit de penser que la conversion entre les valeurs de série PC Excel et les numéros de jours juliens se ferait simplement en ajoutant ou en soustrayant le numéro de jour julien du 31 décembre 1899 (puisque les jours PC Excel sont numérotés à partir de 1). Mais comme il s'agit d'un calendrier Microsoft, il faut d'abord s'assurer qu'il ne contient pas une de ces gaffes caractéristiques de Microsoft. Comme c'est généralement le cas, il ne faut pas chercher bien loin. Si vous avez une copie de PC Excel, allumez-le, formatez une cellule comme contenant une date, et tapez 60 dans celle-ci : la sortie apparaît "29 février 1900". Les nouvelles voyagent apparemment très lentement de Rome à Redmond. Depuis que le pape Grégoire a révisé le calendrier en 1582, les années divisibles par 100 ne sont pas des années bissextiles, et par conséquent l'année 1900 ne contient pas de 29 février. En raison de la perte de ce morceau d'information entre le Saint-Siège et le monopole de l'infernale Seattle, tous les nombres de jours Excel pour les jours postérieurs au 28 février 1900 sont supérieurs d'un jour au nombre réel de jours à partir du 1er janvier 1900. En outre, il convient de noter que tout calcul du nombre de jours d'une période qui commence en janvier ou février 1900 et se termine dans un mois ultérieur sera décalé d'un jour - le nombre de jours sera supérieur d'un jour au nombre réel de jours écoulés.</p>

		<form name="excelserial1900" action="javascript:return false;">
			<table class="table table-bordered">
			<tr>
			<td class="text-center">
				<strong>1900 Date System (PC)</strong>
				<br />
				<b>Excel serial day:</b>

				<input type="text" name="day" value="" size="16" class="form-control"/>
			</td>
			</tr>
			<tr>
			<td colspan="2" class="text-center">
			<input type="button" value="Calculer" onclick="calcExcelSerial1900();"  class="btn btn-outline-secondary"/>
			</td>
			</tr>
			</table>
		</form>

		<p class='text-justify'>Au moment où la bévue de 1900 a été découverte, les utilisateurs d'Excel avaient créé des millions de feuilles de calcul contenant des numéros de jour incorrects. Microsoft a donc décidé de laisser l'erreur en place plutôt que de forcer les utilisateurs à convertir leurs feuilles de calcul, et l'erreur demeure à ce jour. Notez cependant que seule l'année 1900 est concernée ; alors que la première version d'Excel a probablement aussi bousillé toutes les années divisibles par 100 et a donc mis en place un calendrier purement julien, les versions contemporaines comptent correctement les jours en 2000 (qui est une année bissextile, étant divisible par 400), 2100, et les années suivantes de fin de siècle.</p>

		<p class='text-justify'>Les numéros de jour PC Excel ne sont valables qu'entre le 1er (1er janvier 1900) et le 2958465 (31 décembre 9999). Bien qu'un système de comptage de jours en série n'ait aucune difficulté à s'adapter à des plages de dates arbitraires ou à des jours précédant le début de l'époque (étant donné la précision suffisante dans la représentation des nombres), Excel ne le fait pas. Le jour 0 est considéré comme le stupide 0 janvier 1900 (au moins dans Excel 97), et les jours négatifs et ceux en Y10K et au-delà ne sont pas du tout traités. De plus, les anciennes versions d'Excel faisaient de l'arithmétique de date en utilisant des quantités de 16 bits et ne supportaient pas les nombres de jours supérieurs à 65380 (31 décembre 2078) ; je ne sais pas dans quelle version d'Excel cette limitation a été corrigée.</p>

		<p class='text-justify'>Il ne suffisait pas à Microsoft d'imposer à chaque utilisateur de PC Excel un système de numérotation des dates défectueux - rien ne l'est jamais. Ensuite, ils ont procédé à la sortie d'une version Macintosh d'Excel qui utilise un système de numérotation des jours entièrement différent, basé sur le format d'heure natif de MacOS qui compte les jours écoulés depuis le 1er janvier 1904. Pour compliquer encore les choses, sur le Macintosh, ils ont choisi de numéroter les jours à partir de zéro plutôt que de 1, de sorte que minuit le 1er janvier 1904 a la valeur 0,0. En commençant en 1904, ils ont évité de bousiller 1900 comme ils l'ont fait sur le PC. Aujourd'hui, les utilisateurs d'Excel qui échangent des données doivent donc faire face à deux schémas incompatibles pour compter les jours, l'un pensant que 1900 était une année bissextile et l'autre ne remontant pas si loin. Pour compliquer encore les choses, vous pouvez maintenant sélectionner l'un ou l'autre système de date sur l'une ou l'autre des plateformes, de sorte que vous ne pouvez pas être certain que les dates sont compatibles même lorsque vous recevez des données d'un autre utilisateur avec le même type de machine que vous utilisez. Je suis sûr que tout cela a été fait dans l'intérêt de l'"efficacité" dont Microsoft est si friand. Comme nous le savons tous, il faudrait presque une éternité à un ordinateur pour ajouter ou soustraire quatre données afin que tout soit parfaitement interchangeable.</p>

		<form name="excelserial1904" action="javascript:return false;">
			<table class="table table-bordered">
			<tr>
			<td class="text-center">
				<strong>1904 Date System (Macintosh)</strong>
				<br />
				<b>Excel serial day:</b>

				<input type="text" name="day" value="" size="16" class="form-control"/>
			</td>
			</tr>
			<tr>
			<td colspan="2" class="text-center">
			<input type="button" value="Calculer" onclick="calcExcelSerial1904();" class="btn btn-outline-secondary"/>
			</td>
			</tr>
			</table>
		</form>

		<p class='text-justify'>Les nombres de jours sur Macintosh Excel ne sont valables qu'entre 0 (1er janvier 1904) et 2957003 (31 décembre 9999). Bien qu'un système de comptage de jours en série n'ait aucune difficulté à s'adapter à des plages de dates arbitraires ou à des jours précédant le début de l'époque (étant donné la précision suffisante dans la représentation des nombres), Excel ne le fait pas. Les jours négatifs et ceux en Y10K et au-delà ne sont pas du tout traités. De plus, les anciennes versions d'Excel faisaient de l'arithmétique de date en utilisant des quantités de 16 bits et ne supportaient pas les nombres de jours supérieurs à 63918 (31 décembre 2078) ; je ne sais pas dans quelle version d'Excel cette limitation a été corrigée.</p>

		<script>
		<!--
			if (location.search != "") {
				presetDataToRequest(location.search.substring(1));
			} else {
				calcGregorian();                  // Calculate today's values in other calendars
			}
		// -->
		</script>

		</article>  
		
		<aside class="col-md-3">
					
			<?php include('include/aside-fourmilab.php');?>
			
		</aside>
 	
 	</section>
 	
 	<div class="row">
 		<div class="col-12">
 		
 	 	</div> 	
 	</div>
 	
 	<footer class="row">
 	 	<?php include('include/footer.php'); ?>	
 	</footer>
 	
</div>

<!-- code piwik pour les stats -->
		
<?php include('include/piwik.php'); ?>

</body>
</html>