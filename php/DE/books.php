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

			
			$bookLinks = false;
			if(isset($_SESSION['username'])) {
				$bookLinks = true;
			}
		?>
		<section class="section-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="category-search-filter">
							<div class="row">
								<div class="col-md-6">
									<strong>Sortieren</strong>
									<select id="sort" onchange="sortBooks()">
										<option disabled selected>---</option>
										<option value="0">Standard</option>
										<option value="1">Günstigste</option>
										<option value="2">Teuerste</option>
										<option value="3">Sprache</option>
									</select>
									<script>
										function sortBooks() {
											var x = parseInt(document.getElementById("sort").value);
											
											switch (x){
												case 0:
													location.replace("http://127.0.0.1:8080/TIP-FAL/php/DE/books.php?seite=Bucher&lang=DE");
													break;
												case 1:
													location.replace("http://127.0.0.1:8080/TIP-FAL/phpp/DE/books.php?seite=Bucher&lang=DE&f=pra");
													break;
												case 2:
													location.replace("http://127.0.0.1:8080/TIP-FAL/phpp/DE/books.php?seite=Bucher&lang=DE&f=prd");
													break;
												case 3:
													location.replace("http://127.0.0.1:8080/TIP-FAL/phpp/DE/books.php?seite=Bucher&lang=DE&f=lang");
													break;
											}
										}	
									</script>
								</div>
							</div>
						</div>
						<div class="product-grid-list">
							<div class="row mt-30">
							<?php
								$filter = "book.idBook ASC";
								if(isset($_GET['f'])){
									switch($_GET['f']){
										case "pra":
											$filter = "price ASC";
											$allBookData = $objDB->getAllBookData($filter);
										break;
										case "prd":
											$filter = "price DESC";
											$allBookData = $objDB->getAllBookData($filter);
										break;
										case "lang":
											$filter = "language";
											$allBookData = $objDB->getAllBookData($filter);
									}
								}else{
									$allBookData = $objDB->getAllBookData($filter);
								}
								
								for($x = 0; $x < count($allBookData); $x++){
									$id = $allBookData[$x]['idBook'];
									$title = $allBookData[$x]['title'];
									$editor = $allBookData[$x]['editor'];
									$language = $allBookData[$x]['language'];
									$releaseYear = $allBookData[$x]['releaseYear'];
									$releaseDate = $allBookData[$x]['releaseDate'];
									$genre = $allBookData[$x]['genre'];
									$price = $allBookData[$x]['price'];
									$image= $allBookData[$x]['bookImagePath'];
									$seller = $allBookData[$x]['username'];

									echo'<div class="col-sm-12 col-lg-4 col-md-6">
											<div class="product-item bg-light">
												<div class="card" style="height:500px !important;">
													<div class="thumb-content">
														<div class="price">'.$price.' CHF</div>';
														
													if($bookLinks == true){
														echo'<a href="book.php?seite=Bücher&id='.$id.'">
																<img class="bookImage" src="../../images/books/'.$image.'">
															</a>
															</div>
													<div class="card-body" style="height:100% !important;">
														<h4 class="card-title"><a href="book.php?seite=Bücher&id='.$id.'">'.substr($title, 0, 66).'</a></h4>';
													}else{
														echo'<img class="bookImage" src="../../images/books/'.$image.'">
														</div>
													<div class="card-body" style="height:100% !important;">
													<h4 class="card-title">'.substr($title, 0, 66).'</h4>';
													}
													echo'
														<ul class="list-inline product-meta">
															<li class="list-inline-item">
																<p><i class="fa fa-info"></i> '.$genre.'</p>
															</li>
															<li class="list-inline-item">
																<p><i class="fa fa-calendar"></i> Erscheinungsdatum: '.$releaseDate.'</p>
															</li>
															<li class="list-inline-item">
																<p><i class="fa fa-book"></i> Sprache: '.$language.'</p>
															</li>
															<li class="list-inline-item">
																<p class="card-text">Verlag: '.$editor.'</p>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>';
										}
									?>
					</div>
				</div>
			</div>
		</section>
		<script src="../../plugins/jquery/jquery.min.js"></script>
		<?php include_once "include/footer.php"; ?>
		<?php include_once "include/scripts.php"; ?>
	</body>
</html>