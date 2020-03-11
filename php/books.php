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
		<!--lien vers 1 livre 
			"/php/book.php?page=Livres&id="
		-->
		<section class="page-search">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!-- TODO: Fonction PHP pour le tri -->
						<div class="advance-search">
							<form>
								<div class="form-row">
									<div class="form-group col-md-4">
										<input type="text" class="form-control" id="inputtext4"
											placeholder="Titre du livre">
									</div>
									<div class="form-group col-md-3">
										<input type="text" class="form-control" id="inputCategory4" placeholder="Genre">
									</div>
									<div class="form-group col-md-3">
										<input type="text" class="form-control" id="inputLocation4" placeholder="Langue">
									</div>
									<div class="form-group col-md-2">
										<button type="submit" class="btn btn-primary">Recherche</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="category-search-filter">
							<div class="row">
								<div class="col-md-6">
									<strong>Trier</strong>
									<select>
										<option>Date de mise en vente</option>
										<option value="1">Prix croissant</option>
										<option value="2">Prix décroissant</option>
										<option value="3">Langue</option>
									</select>
								</div>
							</div>
						</div>
						<div class="product-grid-list">
							<div class="row mt-30">
							<?php
								$allBookData = $objDB->getAllBookData();
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

									echo'<div class="col-sm-12 col-lg-4 col-md-6" style="height:20%;">
											<div class="product-item bg-light">
												<div class="card">
													<div class="thumb-content">
														<!--<div class="price">$200</div>-->
														<a href="book.php?page=Livres&id='.$id.'">
															<img class="bookImage" src="../images/books/'.$image.'">
														</a>
													</div>
													<div class="card-body">
														<h4 class="card-title"><a href="book.php?page=Livres&id='.$id.'">'.$title.'</a></h4>
														<ul class="list-inline product-meta">
															<li class="list-inline-item">
																<p><i class="fa fa-info"></i>'.$genre.'</p>
															</li>
															<li class="list-inline-item">
																<p><i class="fa fa-calendar"></i>Paru le: '.$releaseDate.'</p>
															</li>
														</ul>
														<p class="card-text">Édition: '.$editor.'</p>
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
		<?php include_once "include/footer.php"; ?>
		<?php include_once "include/scripts.php"; ?>
	</body>
</html>