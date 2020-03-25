<?php
    require "include/objDB.php";
    $objDB = new objDB();
    if(session_status() == 1) {
            session_start();
    }

    $username = $_SESSION['username'];

    if(isset($_FILES['input-file'])){
        if ($_FILES['input-file']['error'] == 'UPLOAD_ERR_OK')
        {
            // recherche de l'extension du nom de fichier pour la reprendre
            // lors du renommage futur du fichier :
            $originalName = $_FILES['input-file']['name'];
            $originalPath = pathinfo($originalName); $fileExtension = $originalPath['extension'];

            if($fileExtension=="PNG" || $fileExtension=="png" || $fileExtension=="jpg" || $fileExtension=="tiff" || $fileExtension=="JPEG")
            {
                //Enlève l'extension de fichier sans cette ligne ça donnerait document.txt29123.txt
                $nameWithoutExtension = str_replace('.'.$fileExtension, '', $originalName);
                $newName = $_Files['input-file']['name']= $nameWithoutExtension.''. uniqid().'.'.$fileExtension;

                //Renommage du fichier et définition du dossier
                $_FILES['input-file']['name'] = $newName;
                $destinDirectory = "../images/books/";
                $destinName= $_FILES["input-file"]["name"];
                // renommage et copie du fichier dans le dossier final définit plus haut
                if (move_uploaded_file($_FILES["input-file"]["tmp_name"],
                    $destinDirectory.$destinName)) {
                
                    $bookData = array(
                        ':title'          => $_POST["title"],
                        ':editor'         => $_POST["editor"],
                        ':language'       => $_POST["language"],
                        ':releaseYear'    => $_POST["releaseYear"],
                        ':releaseDate'    => $_POST["releaseDate"],
                        ':genre'          => $_POST["genre"],
                        ':bookImagePath'  => $destinName,
                        ':price'          => $_POST["price"],
                        ':sold'           => 0,
                    );

                    $bookId = intval($objDB->getBookTableLength()[0]["COUNT(*)"])+1;

                    $addBook = $objDB->addBook($bookData);

                    $sellerInfo = array(
                        ':username'   => $username,
                        ':idBook'     => $bookId,
                    );

                    $addtoSellsTable = $objDB->addtoSellsTable($sellerInfo);
                    echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/FR/book.php?page=Livres&id=". $bookId ."&lang=FR');</script>";
                }
            }else{
                echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/FR/dashboard.php?page=Tableau de bord&action=1&lang=FR'); alert('type de fichier non accepté! Veuillez mettre un .PNG/.jpg/.tiff ou un .JPEG');</script>";
            }
    } else {
        $error = "";
        switch ($_FILES['input-file']['error']) {
            case UPLOAD_ERR_NO_FILE:
                $error = "Vous n'avez pas envoyé de ficher.";
                break;
            case UPLOAD_ERR_INI_SIZE:
                $error = 'Fichier trop grand.';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $error = 'Fichier trop grand.';
                break;
            }
        }
        echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/FR/dashboard.php?page=Tableau de bord&action=1&lang=FR'); alert('". $error ."');</script>";
    }  