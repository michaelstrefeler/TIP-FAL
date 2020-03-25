<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Entête -->
		<?php include 'include/header.php'; ?>
	</head>

	<body class="body-wrapper">
		<!-- Barre de navigation -->
		<?php
			include 'include/nav.php'; 
			include_once 'include/objDB.php';
			$objDB = new objDB();

			// book data
			$bookData = $objDB->getBookData($_GET['id']);
			$title = $bookData[0]['title'];
			$editor = $bookData[0]['editor'];
			$language = $bookData[0]['language'];
			$releaseYear = $bookData[0]['releaseYear'];
			$releaseDate = $bookData[0]['releaseDate'];
			$genre = $bookData[0]['genre'];
			$price = $bookData[0]['price'];
			$image= $bookData[0]['bookImagePath'];
			$seller = $bookData[0]['username'];
			
			// seller data
			$userData = $objDB->getSingleUserInfo($seller);
			$userImage = $userData[0]['userImagePath'];
			$firstName = $userData[0]['firstName'];
			$lastName = $userData[0]['lastName'];
			$contactInfo = $userData[0]['contactInfo'];
			$meansOfContact = $userData[0]['meansOfContact'];
		?>
		<section class="section bg-gray">
			<!-- Container Start -->
			<div class="container">
				<div class="row">
					<!-- Left sidebar -->
					<div class="col-md-8">
						<div class="product-details">
							<h1 class="product-title"><?php echo $title; ?></h1>
							<div class="product-meta">
								<ul class="list-inline">
									<li class="list-inline-item"><i class="fa fa-user-o"></i> Mis en vente par: <?php echo $seller; ?></li>
									<li class="list-inline-item"><i class="fa fa-list"></i> Genre: <?php echo $genre; ?></li>
								</ul>
							</div>
							<div class="content" style="">
								<div class="tab-content" id="pills-tabContent">
									<div class="tab-pane fade show active" id="pills-home" role="tabpanel"
										aria-labelledby="pills-home-tab">
										<h3 class="tab-title">Informations utiles</h3>
										<?php
											echo'<img src="../../images/books/'. $image .'" style="float:left; max-width:150px; height:auto;" alt="photo du livre">';
										?>	
										<p style="padding-left:25%;"> Édition: <?php echo $editor; ?></p>
										<p style="padding-left:25%;"> Année de parution: <?php echo $releaseYear; ?></p>
										<p style="padding-left:25%;"> Date de parution: <?php echo $releaseDate; ?></p>
										<p style="padding-left:25%;"> Langue: <?php echo $language; ?></p>
										<br><br>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="sidebar">
							<div class="widget price text-center">
								<h4>Prix</h4>
								<p><?php echo $price.' CHF';?></p>
							</div>
							<!-- User Profile widget -->
							<div class="widget user">
								<?php
									echo'<img src="../../images/user/'. $userImage .'" style="max-width: 30%; height:auto; float:right;" alt="photo de profile" class="rounded-circle">';
								?>
								<h2>Vendeur</h2>
								<h3><?php echo $firstName.' '.$lastName ; ?></h3>
								<h4><?php echo 'Contactez cet utilisateur par '. $meansOfContact.': '.$contactInfo ; ?></h4>
							</div>
						</div>
					</div>
				</div>
			</div>>
		</section>
		<?php include_once "include/footer.php"; ?>
		<?php include_once "include/scripts.php"; ?>
	</body>
</html>