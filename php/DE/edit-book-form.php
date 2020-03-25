<?php
    include_once 'include/objDB.php';
	$objDB = new objDB();
	if(session_status() == 1) {
        session_start();
    }
?>
<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
	<div class="widget dashboard-container my-adslist">
		<form method="post">
            <label for="idBook">Ein Buch bearbeiten</label>
                <select style="width:90%; height:auto;" id="idBook" name="idBook" onchange="this.form.submit()">
                    <option disabled selected>Bücherliste ▼</option>
                    <?php
						$userBooks = $objDB->getAllBooksByUser($_SESSION['username']);
                    	$bookCount= count($userBooks);

						for($x = 0;$x < $bookCount; $x++){
							echo'<option value='.$userBooks[$x]["idBook"].'>'.$userBooks[$x]["title"].'</option>';
						}
                    ?>
                </select>
        </form>
		<?php
			if(isset($_POST['idBook'])) {
				$bookData = $objDB->getBookData($_POST['idBook']);
				$bookData = $bookData[0];
				echo'<br><br>
				<form method="post" action="edit-a-book.php">
					<div class="form-group">
						<label for="title">Titel</label>
						<input type="text" class="form-control" id="title" name="title" value="'.$bookData['title'].'" required>
					</div>
					<div class="form-group">
						<label for="editor">Verlag</label>
						<input type="text" class="form-control" id="editor" name="editor" value="'.$bookData['editor'].'" required>
					</div>
					<div class="form-group">
						<label for="language">Sprache</label>
						<input type="text" class="form-control" id="language" name="language" value="'.$bookData['language'].'" required>
					</div>
					<div class="form-group">
						<label for="releaseYear">Erscheinungsjahr</label>
						<input type="text" class="form-control" id="releaseYear" name="releaseYear" value="'.$bookData['releaseYear'].'" required>
					</div>
					<div class="form-group">
						<label for="releaseDate">Erscheinungsdatum</label>
						<input type="text" class="form-control" id="releaseDate" name="releaseDate" value="'.$bookData['releaseDate'].'" required>
					</div>
					<div class="form-group">
						<label for="genre">Genre</label>
						<input type="text" class="form-control" id="genre" name="genre" value="'.$bookData['genre'].'" required>
					</div>
					<div class="form-group">
						<label for="price">Preise</label>
						<input type="number" step="0.01" min="0.05" max="250" class="form-control" id="price" name="price" value="'.$bookData['price'].'" required>
					</div>
					<div class="form-group">
						<label for="sold">Verkauft? 0=zu verkaufen 1=verkauft</label>
						<input type="number" min="0" max="1" class="form-control" id="sold" name="sold" value="'.$bookData['sold'].'"required>
					</div>
					<input type="hidden" id="idBook" name="idBook" value="'.$bookData['idBook'].'">
					<button class="btn btn-transparent">Bearbeiten</button>
				</form>';
			}			
		?>
	</div>
</div>

