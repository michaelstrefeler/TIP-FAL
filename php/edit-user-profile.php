<?php
    require "include/objDB.php";

    $objDB = new objDB();

    $userInfo = array(
        ':username'          => $_POST["username"],
        ':password'          => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ':firstName'         => $_POST["firstName"],
        ':lastName'          => $_POST["lastName"],
        ':meansOfContact'    => $_POST["meansOfContact"],
        ':contactInfo'       => $_POST["contactInfo"],
    );
    /*
    $addUser=$objDB->addNewUser($userInfo);

    header("Location: login.php?page=Se connecter");*/
?>