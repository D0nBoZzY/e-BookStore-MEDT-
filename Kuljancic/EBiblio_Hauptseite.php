<?php
//Hauptseite das es jeder verwenden kann und das jeder auf den aktuellen user($user) zugreifen kann
//damit das PHP am Server eine Session anlegt damit wir was einspeichern können
session_start();
// setup the autoloading
require_once '/vendor/autoload.php';

// setup Propel
require_once '/generated-conf/config.php';
//Einbindung des Files
require_once 'libs/Smarty.class.php';
//Legen uns das Smarty Objekt an
$smarty = new Smarty();

//Überprüfen ob der Benutzer eingeloggt ist
if(!isset($_SESSION['user'])){
	//Benutzer ist nicht eingeloggt, darf die Seite nicht sehen. Verweis auf login.php
	header('Location: login.php');
	//beenden
	die();
}
//Wir holen den Benutzer aus der Session, damit wir das abgespeicherte Objekt bekommen müssen wir unserilisieren
//mit unserialize wird es wieder in ein Objekt umgewandelt
$user = unserialize($_SESSION['user']);
//Der User der gerade angemeldet ist
//Stellen dem Template die Variable User zur Verfügung
$smarty->assign('user', $user);
//Wir sagen der Engine das sie das Template form.tpl anzeigen soll
$smarty->display('form_logout.tpl');

?>