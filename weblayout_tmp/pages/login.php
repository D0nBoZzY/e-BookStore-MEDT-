<?php
//damit das PHP am Server eine Session anlegt damit wir was einspeichern können
session_start();

// setup the autoloading
require_once '/vendor/autoload.php';

// setup Propel
require_once '/generated-conf/config.php';
//Einbindung des Files
require_once 'libs/Smarty.class.php';

require_once 'login.fnc.php';
//Legen uns das Smarty Objekt an
$smarty = new Smarty();

if(isset($_POST['log_btn'])) {

//Das was wir im Post haben, haben wir in diese Variablen gegeben, dass wir das nicht jedes mal schreiben muessen
	$username = $_POST['log_bname'];
	$passwort = $_POST['log_pw'];
	
	//rufen die Funktion aus dem File login.fnc.php aus
	$status = Benutzer_Login($username,$passwort);
	
	//is_a prueft ob das Objekt von dieser Klasse ist
	if (is_a($status,'User')){
		//wir wissen das die Var status den User enthaelt
		$user = $status;
	
		//Daten korrekt, Login wird ausgefuehrt
		//Um zu zeigen welcher Benutzer eingeloggt ist speichern wir den Benutzer in die Session
		//Damit wir das Objekt speichern koennen muessen wir serealisieren. Speichert Benutzername, Passwort und Klasse ab 
		$_SESSION['user'] = serialize($user);
		//Verweis auf das File
		header('Location: EBiblio_Hauptseite.php');
		//beenden
		die();
	}elseif($status == LOGIN_PWFALSE){
		//Das Passwort passt nicht zum Benutzer
		//Wir stellen dem Template die Variable pwfalsch zur Verfügung
		$smarty->assign('passwfalsch', true);

	}else{
	//Es wurde kein Benutzer mit dem Namen $user gefunden usernotfound
	//Wir stellen dem Template die Variable pwfalsch zur Verfügung
		$smarty->assign('usernotfound', true);
	}	
 }
//Wir sagen der Engine das sie das Template form.tpl anzeigen soll
$smarty->display('form.tpl');

?>