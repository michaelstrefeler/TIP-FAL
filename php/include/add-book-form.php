<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
	<!-- Recently Favorited -->
	<div class="widget dashboard-container my-adslist">
		<h3 class="widget-header">Vendre un livre</h3>
		<form method="post" enctype="multipart/form-data" action="../sell-a-book.php">
			<div class="form-group">
				<label for="title">Titre du livre</label>
				<input type="text" class="form-control" id="title" name="title" required>
			</div>

			<div class="form-group">
				<label for="title">Édition</label>
				<input type="text" class="form-control" id="editor" name="editor" required>
			</div>
			
			<div class="form-group">
				<label for="title">Langue</label>
				<input type="text" class="form-control" id="language" name="language" required>
			</div>

			<div class="form-group">
				<label for="title">Année de sortie</label>
				<input type="text" class="form-control" id="releaseYear" name="releaseYear" required>
			</div>

			<div class="form-group">
				<label for="title">Date de sortie</label>
				<input type="text" class="form-control" id="releaseDate" name="releaseDate" required>
			</div>

			<div class="form-group">
				<label for="title">Genre</label>
				<input type="text" class="form-control" id="genre" name="genre" required>
			</div>

			<div class="form-group choose-file">
				<i class="fa fa-book text-center"></i>
				<input type='hidden' name='MAX_FILE_SIZE' value='1048576'/>
				<label for="input-file">Photo du livre</label>
				<input type="file" class="form-control-file d-inline" id="input-file" name="input-file" required>
			</div>
			<button class="btn btn-transparent">Mettre un livre en vente</button>
		</form>			
	</div>
</div>