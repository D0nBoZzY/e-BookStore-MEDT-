<?php
//Hauptseite das es jeder verwenden kann und das jeder auf den aktuellen user($user) zugreifen kann
//damit das PHP am Server eine Session anlegt damit wir was einspeichern können
session_start();
// setup the autoloading
require_once '/vendor/autoload.php';

// setup Propel
require_once '/generated-conf/config.php';

//Überprüfen ob der Benutzer eingeloggt ist
if(!isset($_SESSION['user'])){
	//Benutzer ist nicht eingeloggt, darf die Seite nicht sehen. Verweis auf login.php
	header('Location: login.php');
	//beenden
	die();
}
//Wir holen den Benutzer aus der Session, damit wir das abgespeicherte Objekt bekommen müssen wir unserilisieren
$user = unserialize($_SESSION['user']);

include 'form_logout.html';

?>