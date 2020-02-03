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
		if(session_status() == 1) {
			session_start();
		}
		$username = $_SESSION['username'];
		$userInfo = $objDB->getSingleUserInfo($username);
		$firstName = $userInfo[0]['firstName'];
		$lastName = $userInfo[0]['lastName'];
		$contactInfo = $userInfo[0]['contactInfo'];
		$meansOfContact = $userInfo[0]['meansOfContact'];
	?>
	<!--==================================
	=         Profile utilsateur         =
	===================================-->
	<section class="user-profile section">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
					<div class="sidebar">
						<!-- "widget" utilisateur -->
						<div class="widget user-dashboard-profile">
							<!-- photo de profil -->
							<div class="profile-thumb">
								<img src="../images/user/user-thumb.jpg" alt="" class="rounded-circle">
							</div>
							<!-- nom complet et pseudo -->
							<?php
								echo'<h5 class="text-center">'. $firstName .' '. $lastName .' </h5>';
								echo'<p>Pseudo : '. $username .'</p>';
							?>
						</div>
						<!-- Liens du tableau de bord -->
						<div class="widget user-dashboard-menu">
							<ul>
								<li>
									<a href="dashboard.php?page=Tableau de bord&action=1"><i class="fa fa-book"></i>Livres en vente</a></li>
								<li>
									<a href="dashboard-archived-ads.php"><i class="fa fa-file-archive-o"></i>Livres vendus<!--<span>0</span>--></a>
								</li>
								<li>
									<a href="logout.php"><i class="fa fa-sign-out"></i>Se déconnecter</a>
								</li>
								<li>
									<!-- TODO: Créer une fonction php pour supprimer le compte
									<a href="delete-account.php"><i class="fa fa-power-off"></i>Supprimer le compte</a>
									-->
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
					<!-- Modifier vos informations personnelles -->
					<div class="widget personal-info">
						<h3 class="widget-header user">Modifier vos informations personnelles</h3>
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="first-name">Prénom</label>
								<input type="text" class="form-control" id="first-name" value="<?php echo $firstName ?>">
							</div>
							<div class="form-group">
								<label for="last-name">Nom</label>
								<input type="text" class="form-control" id="last-name" value="<?php echo $lastName ?>">
							</div>
							<!-- File chooser -->
							<div class="form-group choose-file">
								<i class="fa fa-user text-center"></i>
								<input type="file" class="form-control-file d-inline" id="input-file">
							</div>
							<!-- Submit button -->
							<button class="btn btn-transparent">Enregistrer les modifications</button>
						</form>
					</div>
					<!-- Modifier le mot de passe -->
					<div class="widget change-password">
						<h3 class="widget-header user">Changer de mot de passe</h3>
						<form method="post">
							<div class="form-group">
								<label for="current-password">Mot de passe actuel</label>
								<input type="password" class="form-control" id="current-password">
							</div>
							<div class="form-group">
								<label for="new-password">Nouveau mot de passe</label>
								<input type="password" class="form-control" id="new-password">
							</div>
							<div class="form-group">
								<label for="confirm-password">Confirmation du nouveau mot de passe</label>
								<input type="password" class="form-control" id="confirm-password">
							</div>
							<button class="btn btn-transparent">Changer de mot de passe</button>
						</form>
					</div>
					<!-- Changer de moyen de contact -->
					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Changer de moyen de contact</h3>
						<form method="post">
							<div class="form-group">
								<select id="meansofcontact" name="meansOfContact" class="border p-3 w-100 my-2" required>
									<option disabled>Moyen de contact</option>
									<?php
										switch($meansOfContact){	
											case "tel":
												echo'<option value="tel" selected>Téléphone</option>
												<option value="email">Email</option>
												<option value="autre">Autre</option>';
											break;
											case "email":
												echo'<option value="tel">Téléphone</option>';
												echo'<option value="email" selected>Email</option>';
												echo'<option value="autre">Autre</option>';
											break;
											case "autre":
												echo'<option value="tel">Téléphone</option>
												<option value="email">Email</option>
												<option value="autre" selected>Autre</option>';
											break;
										}
									?>
								</select> 
							</div>
							<div class="form-group">
								<label for="contactInfo">Téléphone ou E-mail</label>
								<input type="text" class="form-control" id="contactInfo" value="<?php echo $contactInfo; ?>">
							</div>
							<button class="btn btn-transparent">Changer de moyen de contact</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Pied de page -->
	<?php include_once "include/footer.php"; ?>

	<!-- JAVASCRIPT -->
	<?php include_once "include/scripts.php"; ?>

</body>

</html>