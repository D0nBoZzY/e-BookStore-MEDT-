<?php 
session_start();
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
header("Location: ../register.php");        // Nach Abmeldung in die Anmeldeseite gelangen
?>
