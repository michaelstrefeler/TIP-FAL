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
		$photo = $userInfo[0]['userImagePath'];
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
								<?php
									echo'<img src="../../images/user/'. $photo .'" alt="Benutzerfoto" class="rounded-circle">';
								?>
							</div>
							<?php
								echo'<h5 class="text-center">'. $firstName .' '. $lastName .' </h5>';
								echo'<p>Benutzername : '. $username .'</p>';
							?>
						</div>
						<!-- Liens du tableau de bord -->
						<div class="widget user-dashboard-menu">
							<ul>
								<li>
									<a href="dashboard.php?seite=Handlungen&action=0&lang=DE"><i class="fa fa-book"></i>Meine Bücher</a></li>
								<li>
									<a href="dashboard.php?seite=Handlungen&action=3&lang=DE"><i class="fa fa-file-archive-o"></i>Verkaufte Bücher</a>
								</li>
								<li>
									<a href="logout.php"><i class="fa fa-sign-out"></i>Abmelden</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
					<!-- Changer de photo -->
					<div class="widget personal-info">
						<h3 class="widget-header user">Benutzerfoto ändern</h3>
						<form method="post" enctype="multipart/form-data" action="edit-user-photo.php">
							<div class="form-group choose-file">
								<i class="fa fa-user text-center"></i>
								<input type='hidden' name='MAX_FILE_SIZE' value='1048576'/>
								<label for="input-file">Benutzerfoto</label>
								<input type="file" class="form-control-file d-inline" id="input-file" name="input-file" required>
							</div>
							<button class="btn btn-transparent">Benutzerfoto ändern</button>
						</form>
					</div>
					<!-- Modifier le mot de passe -->
					<div class="widget change-password">
						<h3 class="widget-header user">Passwort ändern</h3>
						<form method="post" action="edit-user-password.php">
							<div class="form-group">
								<label for="current-password">Aktuelles Passwort</label>
								<input type="password" class="form-control" id="current-password" name="current-password" required>
							</div>
							<div class="form-group">
								<label for="new-password">Neues Passwort</label>
								<input type="password" class="form-control" id="new-password" name="new-password" pattern="^.{8,60}$" title="Minimum 8 caractères" required>
							</div>
							<div class="form-group">
								<label for="confirm-password">neues Passwort bestätigen</label>
								<input type="password" class="form-control" id="confirm-password" name="confirm-password"  pattern="^.{8,60}$">
							</div>
							<script>
								var password = document.getElementById("new-password"),
									confirm_password = document.getElementById("confirm-password");

								function validatePassword() {
									if (password.value != confirm_password.value) {
									confirm_password.setCustomValidity("Les mots de passe ne correspondent pas!");
									} else {
									confirm_password.setCustomValidity('');
									}
								}
								password.onchange = validatePassword;
								confirm_password.onkeyup = validatePassword;
                			</script>
							<button class="btn btn-transparent" type="submit">Passwort ändern</button>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Pied de seite -->
	<?php include_once "include/footer.php"; ?>

	<!-- JAVASCRIPT -->
	<?php include_once "include/scripts.php"; ?>

</body>

</html>