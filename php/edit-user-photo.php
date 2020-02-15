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
                $destinDirectory = "../images/user/";
                $destinName= $_FILES["input-file"]["name"];
                // renommage et copie du fichier dans le dossier final définit plus haut
                if (move_uploaded_file($_FILES["input-file"]["tmp_name"],
                    $destinDirectory.$destinName)) {
                    $neededData = array(
                        ':path'     => $destinName,
                        ':username' => $username
                    );

                    $changeImage=$objDB->editUserImage($neededData);
                    echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/user-profile.php?page=Utilisateur');</script>";
                }
            }else{
                echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/user-profile.php?page=Utilisateur'); alert('type de fichier non accepté! Veuillez mettre un .PNG/.jpg/.tiff ou un .JPEG');</script>";
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
        echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/user-profile.php?page=Utilisateur'); alert('". $error ."');</script>";
    }  
?>