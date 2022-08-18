<!DOCTYPE html>
<html lang="fr">
<head>
	
	<title><?= _('Calculer un pourcentage'); ?> · pourcentag.es</title>
	<meta name="description" content="<?php _(`Calculez vos pourcentages dans une interface minimaliste et épurée. Ajoutez et soustrayez, calcul d'augmentation, de valeur et d'évolution.`); ?>" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link rel="stylesheet" href="src/css/style.css">

	<link rel="apple-touch-icon" sizes="180x180" href="src/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="src/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="src/images/favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">
	<link rel="canonical" href="https://pourcentag.es" />
	<link rel="mask-icon" href="src/images/safari-pinned-tab.svg" color="#9d79e7">
	<meta name="apple-mobile-web-app-title" content="pourcentag.es">
	<meta name="application-name" content="pourcentag.es">
	<meta name="msapplication-TileColor" content="#f1f4ff">
	<meta name="theme-color" content="#ffffff">

	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="pourcentag.es">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
	
    <meta property="og:title" content="pourcentag.es · <?= _('Modern percentage calculator') ?>">
    <meta property="og:description" content="<?= _('Calculate percentages in a minimalist modern interface. Use common phrases to add a percentage, calculate values and evolutions.') ?>">
    <meta property="og:image" content="https://pourcentag.es/src/images/preview.jpg">
    <meta property="og:type" content="website"/>

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:description" content="<?= _('Calcultate percentages in a minimalist modern interface. Use common phrases to add a percentage, calculate values and evolutions.') ?>">
    <meta property="twitter:title" content="pourcentag.es · <?= _('Modern percentage calculator') ?>">
	<meta property="twitter:image" content="https://pourcentag.es/src/images/preview.jpg">

    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136684433-4"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-136684433-4');
	</script>

</head>

<body>
	<?php include "counter.php"; ?>

	<picture id="logo">
		<source srcset="src/images/nightlogo.svg" media="(prefers-color-scheme: dark)" />
		<img src="src/images/logo.svg"  alt="logo">
	</picture>

	<h1 class="trn">Calcul de pourcentages simple et efficace</h1>

	<section>
		<h3 class="trn">Ajouter un pourcentage</h3>
		<div class="calcul ajout">			
			<span class="input" id="x" placeholder="100" contenteditable="true"></span>
			<span class="trn">+</span>
			<span class="input pourcent" id="y" placeholder="20" contenteditable="true"></span>

			<span class="trn">font</span>

			<span id="resultat" class="resultat"></span>
		</div>
	</section>

	<section>
		<h3 class="trn">Soustraire un pourcentage</h3>
		<div class="calcul retrait">			
			<span class="input" id="x" placeholder="100" contenteditable="true"></span>
			<span class="trn">-</span>
			<span class="input pourcent" id="y" placeholder="20" contenteditable="true"></span>

			<span class="trn">font</span>

			<span id="resultat" class="resultat"></span>
		</div>
	</section>

	<section>
		<h3 class="trn">Calcul de valeur</h3>
		<div class="calcul solde">
			<span class="input pourcent" id="x" placeholder="10" contenteditable="true" ></span>

			<span class="trn">de</span>

			<span class="input" id="y" placeholder="80" contenteditable="true"></span>

			<span class="trn">font</span>

			<span id="resultat" class="resultat"></span>
		</div>
	</section>

	<section>
		<h3 class="trn">Calcul de quantité</h3>
		<div class="calcul quant">
			<span class="input" id="x" placeholder="24" contenteditable="true"></span>
			<span class="trn">représente</span>
			<span id="resultat" class="resultat"></span>
			<span class="trn">de</span>
			<span class="input" id="y" placeholder="120" contenteditable="true"></span>
		</div>
	</section>

	<section>
		<h3 class="trn">Calcul d'évolution</h3>
		<div class="calcul evo">
			<span id="phrase" class="trn">Il y a une variation de </span>
			<span id="resultat" class="resultat"></span>
			<span class="trn">entre</span>
			<span class="input" id="x" placeholder="23" contenteditable="true"></span>
			<span class="trn">et</span>
			<span class="input" id="y" placeholder="46" contenteditable="true"></span>
		</div>
	</section>

	

	<footer>
		<p class="trn">Vous êtes le visiteur n°</p>
		<div class="compteur"><span><?= $count ?></span></div>
		<p class="trn">pourcentag.es est une expérience <a href="https://dribbble.com/tags/neomorphism" target="_blank" >neuomorphique</a>, un mariage d’interfaces du <a href="https://fr.wikipedia.org/wiki/Skeuomorphisme" target="_blank">passé</a> et du <a href="https://fr.wikipedia.org/wiki/Flat_design" target="_blank">présent</a>.</p>
		<p class="trn">Si vous aimez l’idée ou simplement que vous le trouvez utile, vous pouvez <a href="https://www.buymeacoffee.com/Tahoe" target="_blank">m’offrir un café</a>. ☕️</p>

		<a href="https://github.com/Tahoooe/pourcentage" id="link" target="_blank">
			<svg width="18" height="18" viewBox="0 0 1024 1024" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8C0 11.54 2.29 14.53 5.47 15.59C5.87 15.66 6.02 15.42 6.02 15.21C6.02 15.02 6.01 14.39 6.01 13.72C4 14.09 3.48 13.23 3.32 12.78C3.23 12.55 2.84 11.84 2.5 11.65C2.22 11.5 1.82 11.13 2.49 11.12C3.12 11.11 3.57 11.7 3.72 11.94C4.44 13.15 5.59 12.81 6.05 12.6C6.12 12.08 6.33 11.73 6.56 11.53C4.78 11.33 2.92 10.64 2.92 7.58C2.92 6.71 3.23 5.99 3.74 5.43C3.66 5.23 3.38 4.41 3.82 3.31C3.82 3.31 4.49 3.1 6.02 4.13C6.66 3.95 7.34 3.86 8.02 3.86C8.7 3.86 9.38 3.95 10.02 4.13C11.55 3.09 12.22 3.31 12.22 3.31C12.66 4.41 12.38 5.23 12.3 5.43C12.81 5.99 13.12 6.7 13.12 7.58C13.12 10.65 11.25 11.33 9.47 11.53C9.76 11.78 10.01 12.26 10.01 13.01C10.01 14.08 10 14.94 10 15.21C10 15.42 10.15 15.67 10.55 15.59C13.71 14.53 16 11.53 16 8C16 3.58 12.42 0 8 0Z" transform="scale(64)"/>
			</svg>
		</a>
	</footer>

	<script src="src/js/scripts.js"></script>

</body>
</html>