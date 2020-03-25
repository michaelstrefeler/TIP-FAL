<?php
    session_start();
    session_destroy();
    header("Location: ../DE/index.php?seite=Startseite&lange=DE");
?>