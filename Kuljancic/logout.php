<?php
//damit das PHP am Server eine Session anlegt damit wir was einspeichern können
session_start();

//löscht die Session vom Server, somit ist der Benutzer nicht mehr eingeloggt
session_destroy();
//Verweis auf das File
header('Location: login.php');
//beenden
die();




?>