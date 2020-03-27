<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Titre du site-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GünstiBuch - Startseite</title>

	<!-- PLUGINS CSS STYLE -->
	<link href="../../plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="../../plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Owl Carousel -->
	<link href="../../plugins/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="../../plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
	<!-- Fancy Box -->
	<link href="../../plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
	<link href="../../plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="../../plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
	<!-- CUSTOM CSS -->
	<link href="../../css/style.css" rel="stylesheet">

	<!-- FAVICON -->
	<link href="../../img/favicon.png" rel="shortcut icon">

	<!-- Besoin de ça pour internet explorer -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="body-wrapper">
	<?php 
		include_once '../DE/include/nav.php';
		include_once '../DE/include/objDB.php';
		$connection = new objDB();
	?>

	<section class="hero-area bg-1 text-center overly">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content-block">
						<h1>Hören Sie auf, Ihre Bücher zu verschwenden!</h1>
						<p>Verkauf deine Bücher!</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
        <div class="text-center">
            <div class="section-title">
				<h2>Website-Präsentation</h2>
			</div>
			<h4>Wer sind wir?</h4>
            <p>Wir sind ein Verein, der aus vier Schülern besteht und versucht, Studenten dabei zu helfen, <br>Kosten für Lehrbücher zu reduzieren. Unsere Idee ist eine Internetseite, auf der die Studenten gebrauchte Bücher kaufen und verkaufen können.</p>
        </div>  
    </section>
	<section class="section bg-gray">
		<div class="section-title">
			<h2>Was spricht dafür?</h2>
		</div>
		<div class="text-center">
            <p>Wir sind fest davon überzeugt, dass Bücher weiterverwendet werden können. Generell verliert der Wissensschatz eines Buchs nicht innerhalb eines Jahres seinen Wert.<br> Wir beobachten, dass weit zu viele Bücher weggeworfen werden. Inbesondere die Standardwerke unserer genormten Lehrpläne und der Wissenschaft sind zeitlos.<br> Der Wissensschatz lässt sich besser erhalten, wenn man die Bücher einfach weiterverkauft.</p>
		</div>
	</section>
	<section class="section">
		<div class="section-title">
			<h2>Öko – logisch!</h2>
		</div>
		<div class="text-center">
			<p>Für uns ist das Klima eine äußerst wichtige Sache. Unsere Website soll die Wiederverwendung von Materialien fördern und somit helfen, Abfall zu vermeiden.<br> Wir möchten unseren Kohlenstoffverbrauch aktiv verlangsamen, indem wir gebrauchte Gegenstände gegenüber der Neuherstellung bevorzugen.</p>
		</div>
	</section>
	<section class="section bg-gray">
		<div class="section-title">
			<h2>Unsere Politik</h2>
		</div>
		<div class="text-center">
			<p>Wir möchten diese Seite machen, um Hilfe zu bieten. Wir möchten einen respektvollen Austausch und guten Willen zwischen den Menschen sichern. Das heißt: Wir erlauben kein Modell, in dem ein Buch am Ende dem Höchstbietenden gehört.<br> Ein solches Modell wäre nicht fair.Die Preise der Bücher dürfen nicht überteuert sein. Keinesfalls dürfen sie die Ladenpreise überschreiten. Wer diese Regeln nicht einhält, der riskiert, für immer von der Website verbannt zu sein.</p>
		</div>
	</section>
	<?php
		include_once "../DE/include/footer.php";
		include_once "../DE/include/scripts.php";
	?>
</body>
</html>