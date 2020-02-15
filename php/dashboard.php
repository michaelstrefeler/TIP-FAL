<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'include/header.php'; ?>
</head>

<body class="body-wrapper">
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

		if(isset($_GET['action'])){
			$action = $_GET['action'];
		}
		else{
			$action = 1;
		}
	?>

	<section class="dashboard section">
		<!-- Container Start -->
		<div class="container">
			<!-- Row Start -->
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
					<div class="sidebar">
						<!-- User Widget -->
						<div class="widget user-dashboard-profile">
							<!-- User Image -->
							<div class="profile-thumb">
								<?php
									echo'<img src="../images/user/'. $photo .'" alt="photo de profile" class="rounded-circle">';
								?>
							</div>
							<!-- User Name -->
							<?php
								echo'<h5 class="text-center">'. $firstName .' '. $lastName .' </h5>';
								echo'<p>Pseudo : '. $username .'</p>';
							?>
							<a href="../php/user-profile.php?page=Utilisateur" class="btn btn-main-sm">Modifier votre profil</a>
						</div>
						<!-- Dashboard Links -->
						<div class="widget user-dashboard-menu">
							<ul>
								<?php
									switch($action){
										default:
											echo '<li class="active"><a href="../php/dashboard.php?page=Tableau de bord&action=1"><i class="fa fa-plus-circle"></i>Vendre un livre</a></li>
												  <li><a href="../php/dashboard.php?page=Tableau de bord&action=2"><i class="fa fa-edit"></i>Modifier un livre</a></li>
												  <li><a href="../php/dashboard.php?page=Tableau de bord&action=3"><i class="fa fa-file-archive-o"></i>Livres vendus</a></li>';
											break;
										case 1:
											echo '<li class="active"><a href="../php/dashboard.php?page=Tableau de bord&action=1"><i class="fa fa-plus-circle"></i>Vendre un livre</a></li>
												  <li><a href="../php/dashboard.php?page=Tableau de bord&action=2"><i class="fa fa-edit"></i>Modifier un livre</a></li>
												  <li><a href="../php/dashboard.php?page=Tableau de bord&action=3"><i class="fa fa-file-archive-o"></i>Livres vendus</a></li>';
											break;
										case 2:
											echo '<li><a href="../php/dashboard.php?page=Tableau de bord&action=1"><i class="fa fa-plus-circle"></i>Vendre un livre</a></li>
												  <li class="active"><a href="../php/dashboard.php?page=Tableau de bord&action=2"><i class="fa fa-edit"></i>Modifier un livre</a></li>
												  <li><a href="../php/dashboard.php?page=Tableau de bord&action=3"><i class="fa fa-file-archive-o"></i>Livres vendus</a></li>';	
											break;
										case 3:
											echo '<li><a href="../php/dashboard.php?page=Tableau de bord&action=1"><i class="fa fa-plus-circle"></i>Vendre un livre</a></li>
												  <li><a href="../php/dashboard.php?page=Tableau de bord&action=2"><i class="fa fa-edit"></i>Modifier un livre</a></li>
												  <li class="active"><a href="../php/dashboard.php?page=Tableau de bord&action=3"><i class="fa fa-file-archive-o"></i>Livres vendus</a></li>';	
											break;
									}
								?>
							</ul>
						</div>
					</div>
				</div>

				<?php
					switch($action){
						default:
							include_once 'include/add-book-form.php';
							break;
						case 1:
							include_once 'include/add-book-form.php';
							break;
						case 2:
							include_once 'include/edit-book-form.php';
							break;
						case 3:
							include_once 'include/sold-books.php';
							break;
					}
				?>
			</div>
		</div>
	</section>

	<!-- Pied de page -->
	<?php include_once "include/footer.php"; ?>

	<!-- JAVASCRIPT -->
	<?php include_once "include/scripts.php"; ?>

</body>

</html>