<?php
    session_start();
    session_destroy();
    header("Location: ../FR/index.php?page=Accueil");
?>