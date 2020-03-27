<?php
    require "include/objDB.php";
    $objDB = new objDB();
    if(session_status() == 1) {
		session_start();
    }
    
    $username = $_SESSION['username'];
    $userInfo = $objDB->getSingleUserInfo($username);
    $oldPassword = $userInfo[0]['password'];

    if(isset($_POST['current-password']) && isset($_POST['new-password'])){
        if(password_verify($_POST['current-password'], $oldPassword)){
            $neededData = array(
                        ':username' => $username,
                        ':password' => password_hash($_POST['new-password'], PASSWORD_DEFAULT),
                    );
            $changePassword = $objDB->changeUserPassword($neededData);
            
            echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/FR/user-profile.php?seite=Konto'); alert('Votre mot de passe a été modifié');</script>";

        }else{
            echo"<script>window.location.replace('http://127.0.0.1:8080/TIP-FAL/php/FR/user-profile.php?seite=Konto'); alert('Mot de passe erroné');</script>";  
        }
    }
?>