<?php
//damit das PHP am Server eine Session anlegt damit wir was einspeichern k�nnen
session_start();

//l�scht die Session vom Server, somit ist der Benutzer nicht mehr eingeloggt
session_destroy();
//Verweis auf das File
header('Location: login.php');
//beenden
die();




?>