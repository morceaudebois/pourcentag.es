<?php
	$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

	putenv("LANG=$language");
	setlocale(LC_ALL, $language);

	$domain = "messages";

	bindtextdomain($domain, "locales");
	bind_textdomain_codeset($domain, 'UTF-8');

	textdomain($domain);
?>

<!DOCTYPE html>
<html lang="<?= $language ?>">
<head>

	<title><?= _('Calculate percentages') ?> · pourcentag.es</title>
	<meta name="description" content="<?= _('Calculate percentages in a minimalist modern interface. Use common phrases to add a percentage, calculate values and evolutions.') ?>" />
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
	
    <meta property="og:title" content="pourcentag.es · <?= _('Simple and efficient percentage calculator') ?>">
    <meta property="og:description" content="<?= _('Calculate percentages in a minimalist modern interface. Use common phrases to add a percentage, calculate values and evolutions.') ?>">
    <meta property="og:image" content="https://pourcentag.es/src/images/preview.jpg">
    <meta property="og:type" content="website"/>

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:description" content="<?= _('Calculate percentages in a minimalist modern interface. Use common phrases to add a percentage, calculate values and evolutions.') ?>">
    <meta property="twitter:title" content="pourcentag.es · <?= _('Simple and efficient percentage calculator') ?>">
	<meta property="twitter:image" content="https://pourcentag.es/src/images/preview.jpg">
</head>

<body>
	<?php include "counter.php" ?>

	<picture id="logo">
		<source srcset="src/images/nightlogo.svg" media="(prefers-color-scheme: dark)" />
		<img src="src/images/logo.svg"  alt="logo">
	</picture>

	<h1><?= _('Simple and efficient percentage calculator') ?></h1>

	<section>
		<h3><?= _('Add a percentage') ?></h3>
		<div class="calcul ajout">			
			<span class="input" id="x" placeholder="100" contenteditable="true"></span>
			<span>+</span>
			<span class="input pourcent" id="y" placeholder="20" contenteditable="true"></span>

			<span><?= _('is') ?></span>

			<span id="resultat" class="resultat"></span>
		</div>
	</section>

	<section>
		<h3><?= _('Deduct a percentage') ?></h3>
		<div class="calcul retrait">			
			<span class="input" id="x" placeholder="100" contenteditable="true"></span>
			<span>-</span>
			<span class="input pourcent" id="y" placeholder="20" contenteditable="true"></span>

			<span><?= _('is') ?></span>

			<span id="resultat" class="resultat"></span>
		</div>
	</section>

	<section>
		<h3><?= _('Value calculation') ?></h3>
		<div class="calcul solde">
			<span class="input pourcent" id="x" placeholder="10" contenteditable="true" ></span>

			<span><?= _('of') ?></span>

			<span class="input" id="y" placeholder="80" contenteditable="true"></span>

			<span><?= _('is') ?></span>

			<span id="resultat" class="resultat"></span>
		</div>
	</section>

	<section>
		<h3><?= _('Quantity calculation') ?></h3>
		<div class="calcul quant">
			<span class="input" id="x" placeholder="24" contenteditable="true"></span>
			<span><?= _('is') ?></span>
			<span id="resultat" class="resultat"></span>
			<span><?= _('of') ?></span>
			<span class="input" id="y" placeholder="120" contenteditable="true"></span>
		</div>
	</section>

	<section>
		<h3><?= _('Evolution calculation') ?></h3>
		<div class="calcul evo">
			<span id="phrase"><?= _('There\'s a variation of') ?> </span>
			<span id="resultat" class="resultat"></span>
			<span><?= _('between') ?></span>
			<span class="input" id="x" placeholder="23" contenteditable="true"></span>
			<span><?= _('and') ?></span>
			<span class="input" id="y" placeholder="46" contenteditable="true"></span>
		</div>
	</section>

	

	<footer>
		<p><?= _('You\'re visitor n°') ?></p>
		<div class="compteur"><span><?= $count ?></span></div>

		<p><?= _('pourcentag.es is a') ?> <a href="https://dribbble.com/tags/neomorphism" target="_blank" ><?= _('neumorphic ') ?></a><?= _('experiment, a combination of interfaces from the') ?> <a href="https://fr.wikipedia.org/wiki/Skeuomorphisme" target="_blank"><?= _('past') ?></a> <?= _('and the') ?> <a href="https://fr.wikipedia.org/wiki/Flat_design" target="_blank"><?= _('present') ?></a>.</p>

		<p><?= _('If you like the idea or find it useful, you can') ?> <a href="https://ko-fi.com/tahoe" target="_blank"><?= _('buy me a coffee') ?></a>. ☕️</p>

		<a href="https://github.com/morceaudebois/pourcentag.es" id="link" target="_blank">
			<svg width="18" height="18" viewBox="0 0 1024 1024" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8C0 11.54 2.29 14.53 5.47 15.59C5.87 15.66 6.02 15.42 6.02 15.21C6.02 15.02 6.01 14.39 6.01 13.72C4 14.09 3.48 13.23 3.32 12.78C3.23 12.55 2.84 11.84 2.5 11.65C2.22 11.5 1.82 11.13 2.49 11.12C3.12 11.11 3.57 11.7 3.72 11.94C4.44 13.15 5.59 12.81 6.05 12.6C6.12 12.08 6.33 11.73 6.56 11.53C4.78 11.33 2.92 10.64 2.92 7.58C2.92 6.71 3.23 5.99 3.74 5.43C3.66 5.23 3.38 4.41 3.82 3.31C3.82 3.31 4.49 3.1 6.02 4.13C6.66 3.95 7.34 3.86 8.02 3.86C8.7 3.86 9.38 3.95 10.02 4.13C11.55 3.09 12.22 3.31 12.22 3.31C12.66 4.41 12.38 5.23 12.3 5.43C12.81 5.99 13.12 6.7 13.12 7.58C13.12 10.65 11.25 11.33 9.47 11.53C9.76 11.78 10.01 12.26 10.01 13.01C10.01 14.08 10 14.94 10 15.21C10 15.42 10.15 15.67 10.55 15.59C13.71 14.53 16 11.53 16 8C16 3.58 12.42 0 8 0Z" transform="scale(64)"/>
			</svg>
		</a>
	</footer>

	<hr id="sep">

	<div class="obj"></div>

	<div id="notAIGeneratedText">
		<h2>You don't wanna read this.</h2>

		<p><i>Google won't reference well small websites like these unless they have tons of text and keywords. I'm not really into those since pourcentag.es is made to be easy to use and not get in your way. This is some AI generated text you shouldn't read but should please the SEO gods. Please hide it using the big red button and it won't appear anymore.</i></p>

		<button class="pushable">
			<span class="shadow"></span>
			<span class="edge"></span>
			<span class="front">Click here!</span>
		</button>

		<p>Our percentage calculator tool, pourcentag.es, is efficient and powerful. With it, you can quickly and easily calculate percentages, making complex math problems a breeze. Whether you're a student, a teacher, or just someone who needs to do some quick math, pourcentag.es is the tool for you.easy and efficient to use, you'll wonder how you ever got by without it. Whether you're a math enthusiast or just someone who likes to be prepared, this tool is perfect for you. With its sleek and minimal design, it's also a great addition to your desk.</p>

		<p>I have been using pourcentag.es for a while now and I can't stress enough how valuable this tool has become. Not only is it an extremely efficient percentage calculator, but it is also very minimalistic. This means that you don't need to clutter your screen with a bunch of different numbers and calculations - everything is displayed in one clear and concise interface.</p>

		<p>This makes pourcentag.es an absolute essential for anyone who often has to work with percentages and numbers. Even if you're not a math person, this tool will make your life so much easier. So if you're looking for a percentage calculator, look no further - pourcentag.es is the way to go!</p>

		<p>A lot of people find numbers and maths daunting, but I think that with the right tools, everyone can become a math whiz! Pourcentages is one of those tools that makes math fun and easy. It's a minimalistic percentage calculator that allows you to do all kinds of calculations with ease. Plus, it looks great and is really easy to use. I highly recommend it for anyone who wants to improve their math skills!</p>

		<p>pourcentag.es is a simple and efficient percentage calculator that will make your life easier. With its easy-to-use interface and beautiful design, pourcentag.es will help you get the most out of your calculations.</p>

		<p>pourcentag.es is the percentage calculator that will make your life easier. With its simple and efficient design, it is perfect for anyone who wants to improve their math skills. Just enter two numbers and let pourcentag.es do the rest.</p>
	</div>


	<script src="src/js/scripts.js"></script>

</body>
</html>