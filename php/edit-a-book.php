<?php
 include_once 'include/objDB.php';
	$objDB = new objDB();
	if(session_status() == 1) {
        session_start();
    }
    
$bookData = array(
    ':title'          => $_POST["title"],
    ':editor'         => $_POST["editor"],
    ':language'       => $_POST["language"],
    ':releaseYear'    => $_POST["releaseYear"],
    ':releaseDate'    => $_POST["releaseDate"],
    ':genre'          => $_POST["genre"],
    ':price'          => $_POST["price"],
    ':sold'           => $_POST["sold"],
);
$idBook = $_POST['idBook'];
$editBook = $objDB->editBook($idBook, $bookData);
 echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/dashboard.php?page=Tableau de bord&action=0');</script>";
?>