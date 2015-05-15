<?php
//damit das PHP am Server eine Session anlegt damit wir was einspeichern können
session_start();

// setup the autoloading
require_once '/vendor/autoload.php';

// setup Propel
require_once '/generated-conf/config.php';
function Benutzer_login($bname,$pw) {
//erstellen ein Objekt dieser Klasse um auf die Methoden zuzugreifen
$userq = new UserQuery();
}

if(isset($_POST['log_btn'])) {

//Das was wir im Post haben, haben wir in diese Variablen gegeben, dass wir das nicht jedes mal schreiben müssen
	$username = $_POST['log_bname'];
	$passwort = $_POST['log_pw'];
	
//Wir suchen den Benutzer mit dem Namen $username aus der Datenbank
	$userQ = new UserQuery();
	$user = $userQ->findOneByBenutzername($username);
	
	if(!is_null($user)){
		if ($user->getPasswort() == $passwort){
		//Daten korrekt, Login wird ausgeführt
		//Um zu zeigen welcher Benutzer eingeloggt ist speichern wir den Benutzer in die Session
		//Damit wir das Objekt speichern können müssen wir serealisieren. Speichert Benutzername, Passwort und Klasse ab 
			$_SESSION['user'] = serialize($user);
			//Verweis auf das File
			header('Location: EBiblio_Hauptseite.php');
			//beenden
			die();
		}else{
		//Das Passwort passt nicht zum Benutzer
			$passwfalsch=true;
		}
	}else{
	//Es wurde kein Benutzer mit dem Namen $user gefunden
		$usernotfound=true;
	}	
 }
include'form.html';

?>