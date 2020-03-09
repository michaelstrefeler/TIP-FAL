<?php
    include_once 'include/objDB.php';
	$objDB = new objDB();
	if(session_status() == 1) {
        session_start();
    }
?>
<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
	<div class="widget dashboard-container my-adslist">
		<h3 class="widget-header">Mes livres vendus</h3>
        <?php
             $userBooks = $objDB->getBooksSoldByUser($_SESSION['username']);
            $bookCount= count($userBooks);
            if($bookCount == 0){
                echo'<span><strong>Vous n\'avez vendu aucun livre</strong></span>';
            }else{
                echo'<table class="table table-responsive product-dashboard-table">
			        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Informations utiles</th>
                            <th class="text-center">Genre</th>
                            <th class="text-center">Prix</th>
                        </tr>
                    </thead>
                    <tbody>';
                // boucle pour afficher tous les livres vendus par l'utilisateur
                for($index = 0; $index<$bookCount; $index++){
                    echo'
                    <tr>
                        <td class="product-thumb">
                            <img width="100px" height="auto" style="padding-right:5%;" src="../images/books/'.$userBooks[$index]['bookImagePath'].'" alt="photo du livre">
                        </td>
                        <td class="product-details">
                            <h3 class="title">'.$userBooks[$index]['title'].'</h3>
                            <span class="add-id"><strong>Édition:</strong>'.$userBooks[$index]['editor'].'</span>
                            <span><strong>Langue: </strong>'.$userBooks[$index]['language'].'</span>
                            <span><strong>Paru le: </strong><time>'.$userBooks[$index]['releaseDate'].'</time></span>
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