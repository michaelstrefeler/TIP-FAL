<?php
	$active = $_GET['page'];
	if(session_status() == 1) {
    	session_start();
	}
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navigation">
						<a class="navbar-brand" href="../../../TIP-FAL/php/FR/index.php?page=Accueil">
							<img src="../../../TIP-FAL/images/logo.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto main-nav ">
								<li class="nav-item <?php if ($active=="Accueil")echo 'active' ?>">
									<a class="nav-link" href="../../../TIP-FAL/php/FR/index.php?page=Accueil">Accueil</a>
								</li>
								<li class="nav-item <?php if ($active=="Livres")echo 'active' ?>">
									<a class="nav-link" href="../../../TIP-FAL/php/FR/books.php?page=Livres">Livres en vente</a>
								</li>
								<?php
									if(isset($_SESSION['username'])){
										if ($active=="Tableau de bord")
										{
											echo '<li class="nav-item active"><a class="nav-link" href="../../../TIP-FAL/php/FR/dashboard.php?page=Tableau de bord&action=0">Tableau de bord</a></li>';
										}else
										{
											echo '<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/FR/dashboard.php?page=Tableau de bord&action=0">Tableau de bord</a></li>';
										}
									}
								?>
									<?php 
										if(isset($_SESSION['username'])){
											if ($active=="Utilisateur"){
												echo '<li class="nav-item active"><a class="nav-link" href="../../../TIP-FAL/php/FR/user-profile.php?page=Utilisateur">Profil utilisateur</a></li>';
											}else{
												echo '<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/FR/user-profile.php?page=Utilisateur">Profil utilisateur</a></li>';
											}
										}
									?>
								</li>
							</ul>
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<?php
									if(isset($_SESSION['username'])){
										echo'<a class="nav-link login-button" href="../../../TIP-FAL/php/FR/logout.php?page=Se déconnecter">Se déconnecter</a>';
									}else{
										echo'<a class="nav-link login-button" href="../../../TIP-FAL/php/FR/login.php?page=Se connecter">Se connecter</a>';
									}	
									?>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</section>