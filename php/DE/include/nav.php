<?php
	$active = $_GET['seite'];
	if(session_status() == 1) {
    	session_start();
	}
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navigation">
						<a class="navbar-brand" href="../../../TIP-FAL/php/DE/index.php?seite=Startseite&lang=DE">
							<img src="../../../TIP-FAL/images/logo.png" style="max-height:50px; width:auto;" alt="logo">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto main-nav ">
								<li class="nav-item <?php if ($active=="Startseite")echo 'active' ?>">
									<a class="nav-link" href="../../../TIP-FAL/php/DE/index.php?seite=Startseite&lang=DE">Startseite</a>
								</li>
								<li class="nav-item <?php if ($active=="Bucher")echo 'active' ?>">
									<a class="nav-link" href="../../../TIP-FAL/php/DE/books.php?seite=Bucher&lang=DE">Bücher zum Verkauf</a>
								</li>
								<?php
									if(isset($_SESSION['username'])){
										if ($active=="Handlungen")
										{
											echo '<li class="nav-item active"><a class="nav-link" href="../../../TIP-FAL/php/DE/dashboard.php?seite=Handlungen&action=0&lang=DE">Handlungen</a></li>';
										}else
										{
											echo '<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/DE/dashboard.php?seite=Handlungen&action=0&lang=DE">Handlungen</a></li>';
										}
									}
								?>
									<?php 
										if(isset($_SESSION['username'])){
											if ($active=="Konto"){
												echo '<li class="nav-item active"><a class="nav-link" href="../../../TIP-FAL/php/DE/user-profile.php?seite=Konto&lang=DE">Konto</a></li>';
											}else{
												echo '<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/DE/user-profile.php?seite=Konto&lang=DE">Konto</a></li>';
											}
										}
									?>
								</li>
							</ul>
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<?php
										if(isset($_GET['lang'])){
											if($_GET['lang'] == 'FR'){
												echo'<li class="nav-item" style="text-decoration: underline;"><a class="nav-link" href="../../../TIP-FAL/php/FR/index.php?seite=Accueil&lang=FR">FR</a></li>';
												echo'<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/DE/index.php?seite=StartSeite&lang=DE">DE</a></li>';
											}elseif($_GET['lang'] == 'DE'){
												echo'<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/FR/index.php?seite=Accueil&lang=FR">FR</a></li>';
												echo'<li class="nav-item" style="text-decoration: underline;"><a class="nav-link" href="../../../TIP-FAL/php/DE/index.php?seite=StartSeite&lang=DE">DE</a></li>';
											}	
										}else{
											echo'<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/FR/index.php?seite=Accueil&lang=FR">FR</a></li>';
											echo'<li class="nav-item"><a class="nav-link" href="../../../TIP-FAL/php/DE/index.php?seite=StartSeite&lang=DE">DE</a></li>';
										}
									?>
								</li>
							</ul>
							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<?php
									if(isset($_SESSION['username'])){
										echo'<a class="nav-link login-button" href="../../../TIP-FAL/php/DE/logout.php?seite=Abmelden&lang=DE">Abmelden</a>';
									}else{
										echo'<a class="nav-link login-button" href="../../../TIP-FAL/php/DE/login.php?seite=Anmelden&lang=DE">Anmelden</a>';
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