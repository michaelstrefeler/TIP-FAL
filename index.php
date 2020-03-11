<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Titre du site-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Foire aux livres - Acceuil</title>

	<!-- PLUGINS CSS STYLE -->
	<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Owl Carousel -->
	<link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
	<!-- Fancy Box -->
	<link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
	<link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
	<!-- CUSTOM CSS -->
	<link href="css/style.css" rel="stylesheet">

	<!-- FAVICON -->
	<link href="img/favicon.png" rel="shortcut icon">

	<!-- Besoin de ça pour internet explorer -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="body-wrapper">
	<?php 
		include_once "../TIP-FAL/php/include/nav.php"; 
		include_once '../TIP-FAL/php/include/objDB.php';
		$connection = new objDB();
	?>

	<section class="hero-area bg-1 text-center overly">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content-block">
						<h1>Arrêtez de gaspiller vos livres !</h1>
						<p>Aidez nous à diminuer le gaspillage de livres en vendant les vôtres à des futurs étudiants. Trop de livres sont gaspillés par an. Nous voulons que ce ne soit plus le cas.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
        <div class="text-center">
            <div class="section-title">
				<h2>Présentation du site</h2>
			</div>
			<h4>Qui sommes-nous?</h4>
            <p>Nous sommes une association formée de 5 élèves qui essaie d’aider les étudiants à réduire leur frais pour le matériel scolaire sur l’achat de livres,<br> en proposant un site qui leur permettrai d’acheter des livres d’anciens étudiants et de aussi les vendre à leur tour. </p>
            <h4>Quels sont nos buts?</h4>
            <p>Nous faisons ce site pour offrir une alternative aux écoliers, étudiants, apprentis, universitaires, avec des moyens limités.</p>
        </div>  
    </section>
	<section class="section bg-gray">
		<div class="section-title">
			<h2>Pourquoi utiliser ce site?</h2>
		</div>
		<div class="text-center">
			<p>Les livres après être acheté peuvent être utilisés plusieurs années mêmes une décennie si le programme scolaire ne change pas.<br>N’avez-vous jamais jeté des livres en fin d’années scolaire qui aurait pu servir à de future personne ? <br> N’avez-vous pas des vieux livres qui traînent dans vos armoires ou dans vos caves en attente d’être jetés ?<br><br>C’est l’occasion de les mettres en vente ! </p>
		</div>
	</section>
	<section class="section">
		<div class="section-title">
			<h2>Écologie!</h2>
		</div>
		<div class="text-center">
			<p>Pour nous le climat est une cause qui nous tient à cœur, par le biais de ce site nous voulons promouvoir la réutilisation de matériel, ainsi qu’éviter le gaspillage.<br> Nous devons freiner notre consommation de Carbone en arrêtant de fabriquer de nouveaux objets et privilégier les articles de seconde main.  </p>
		</div>
	</section>
	<section class="section bg-gray">
		<div class="section-title">
			<h2>Notre politique</h2>
		</div>
		<div class="text-center">
			<p>Nous faisons ce site pour rendre service, les échanges entre les personnes doivent se faire dans le respect et la bonne volonté.<br> La surenchère ou "au plus offrants" ne sont pas permis.<br> Les prix ne doivent pas être excessif et ne doivent pas dépasser les prix en magasins.<br> Toutes personnes qui ne respectent pas le règlement, peuvent se faire bannir définitivement du site. </p>
		</div>
	</section>
	<?php include_once "../TIP-FAL/php/include/footer.php"; ?>
	<?php include_once "../TIP-FAL/php/include/scripts.php"; ?>
</body>
</html>