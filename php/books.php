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
		?>
		<section class="section-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="category-search-filter">
							<div class="row">
								<div class="col-md-6">
									<strong>Trier</strong>
									<select id="sort" onchange="sortBooks()">
										<option disabled selected>---</option>
										<option value="0">Par défaut</option>
										<option value="1">Prix croissant</option>
										<option value="2">Prix décroissant</option>
										<option value="3">Langue</option>
									</select>
									<script>
										function sortBooks() {
											var x = parseInt(document.getElementById("sort").value);
											
											switch (x){
												case 0:
													location.replace("http://127.0.0.1:8080/TIP-FAL/php/books.php?page=Livres");
													break;
												case 1:
													location.replace("http://127.0.0.1:8080/TIP-FAL/php/books.php?page=Livres&f=pra");
													break;
												case 2:
													location.replace("http://127.0.0.1:8080/TIP-FAL/php/books.php?page=Livres&f=prd");
													break;
												case 3:
													location.replace("http://127.0.0.1:8080/TIP-FAL/php/books.php?page=Livres&f=lang");
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
														<div class="price">'.$price.' CHF</div>
														<a href="book.php?page=Livres&id='.$id.'">
															<img class="bookImage" src="../images/books/'.$image.'">
														</a>
													</div>
													<div class="card-body" style="height:100% !important;">
														<h4 class="card-title"><a href="book.php?page=Livres&id='.$id.'">'.substr($title, 0, 66).'</a></h4>
														<ul class="list-inline product-meta">
															<li class="list-inline-item">
																<p><i class="fa fa-info"></i> '.$genre.'</p>
															</li>
															<li class="list-inline-item">
																<p><i class="fa fa-calendar"></i> Paru le: '.$releaseDate.'</p>
															</li>
															<li class="list-inline-item">
																<p><i class="fa fa-book"></i> Langue: '.$language.'</p>
															</li>
															<li class="list-inline-item">
																<p class="card-text">Édition: '.$editor.'</p>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>';
										}
									?><!--
						<div class="pagination justify-content-center">
							<nav aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">Previous</span>
										</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item active"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item">
										<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>-->
					</div>
				</div>
			</div>
		</section>
		<script src="../../plugins/jquery/jquery.min.js"></script>
		<?php include_once "include/footer.php"; ?>
		<?php include_once "include/scripts.php"; ?>
	</body>
</html>