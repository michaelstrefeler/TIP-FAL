<?php
    include_once 'include/objDB.php';
	$objDB = new objDB();
	if(session_status() == 1) {
        session_start();
    }
?>
<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
	<div class="widget dashboard-container my-adslist">
		<h3 class="widget-header">Meine Bücher</h3>
        <?php
                    $userBooks = $objDB->getBooksByUser($_SESSION['username']);
                    $bookCount= count($userBooks);
                    if($bookCount == 0){
                        echo'<span><strong>Sie haben keine Bücher zu verkaufen</strong></span>';
                    }else{
                        echo'<table class="table table-responsive product-dashboard-table">
			                <thead>
                                <tr>
                                    <th>BuchFoto</th>
                                    <th>Spezifikationen</th>
                                    <th class="text-center">Genre</th>
                                    <th class="text-center">Preise</th>
                                </tr>
                            </thead>
                            <tbody>';
                        // boucle pour afficher tous les livres mis en vente par l'utilisateur
                        for($index = 0; $index<$bookCount; $index++){
                            echo'
                            <tr>
                                <td class="product-thumb">
                                    <img width="100px" height="auto" style="padding-right:5%;" src="../../images/books/'.$userBooks[$index]['bookImagePath'].'" alt="photo du livre">
                                </td>
                                <td class="product-details">
                                    <h3 class="title">'.$userBooks[$index]['title'].'</h3>
                                    <span class="add-id"><strong>Verlag:</strong>'.$userBooks[$index]['editor'].'</span>
                                    <span><strong>Sprache: </strong>'.$userBooks[$index]['language'].'</span>
                                    <span><strong><i class="fa fa-calendar"></i></strong><time>'.$userBooks[$index]['releaseDate'].'</time></span>
                                </td>
                                <td class="product-category"><span class="categories">'.$userBooks[$index]['genre'].'</span></td>
                                <td class="action">
                                    <span class="location">'.$userBooks[$index]['price'].' CHF</span>
                                </td>
                            </tr>';
                        }
                    }
                    
                ?>
			</tbody>
		</table>
	</div>
</div>