<?php
//Zweck : Steuerfile fue Registrierung
//Autor: Gligorevic Nenad
//Datum 20150505
//Autor Nenad Gligorevic


session_start();
$Fm = '';   //Fehlermeldungen
$Hm = '';   //Hinweismeldungen

// setup the autoloading
require_once '../vendor/autoload.php';
// setup Propel
require_once '../generated-conf/config.php';

/**
* Benutzer registrieren
* @param $bname, $pw  Benutzername und Passwort
*
*/

function Benutzer_registrieren($bname,$pw) {
	$user = new User();
	
	$user -> setBenutzername($bname);
	$user -> setPasswort($pw);
	$user -> setRolle(0);
	//Speichert alle Aenderungen
	$user -> save();
}

if (isset($_POST['reg_btn'])) {
	//Eingaben in Variablen speichern
	$bname = ($_POST['reg_bname']);
	//In Session Variable speichern
	$_SESSION['reg_bname'] = $bname;
	$pw1 = ($_POST['reg_pw']);
	$pw2 = ($_POST['reg_pw2']);
	$userquery = new UserQuery();	
	//Falls es bereits den selben Benutzer gibt
	//soll in die Vaariable $Fm geschrieben werden.
	$Fm = "".$userquery->findOneByBenutzername($bname);


	
	//Wenn die $Fm nicht leer ist dann gibt
	//es bereits einen Benutzer
	if ($Fm != "") {
			$Fm = "Dieser Benutzername existiert bereits<br><br>";
			session_destroy();
	 }
	
	//Nichts darf leer sein
	if ($_SESSION['reg_bname'] != "" && $pw1 != "" && $pw2 != ""){

			//Passwoerter muessen uebereinstimmen
			if ($pw1 == $pw2) {
				//es wird ueberprueft ob PW 
				//mehr als 6 zeichen hat
				//und Bname mehr als 4 Zeichen
				if (strlen($pw1) > 6 && strlen($pw1) > 4)  {
				
				$regexp = "/^[a-zA-Z0-9]*$/";

				if (preg_match($regexp, $bname)) {
					//Benutzer wird registriert in DB
					Benutzer_registrieren($bname, $pw1);
					//Nachdem der Benutzer erfolgreich registriert
					//wurde wird er auf die naechste Seite geschickt.
					header('location: erfolgreich_reg.html');
				} else {
					//Hinweismeldung ausgeben das die Eingaben
					//auf die Richtlinien angepasst werden.
					$Hm = "Nur Buchstaben und Zahlen<br>";
					session_destroy();
					include 'form.html';
				}
				} else {
					//Hinweismeldung ausgeben das die Eingaben
					//auf die Richtlinien angepasst werden.
					$Hm = "Passw&ouml;rt mind. 6 Zeichen<br>Benutzername mind. 4 Zeichen<br>";
					session_destroy();
					include 'form.html';
				}
				
			} else {
				//Wenn die Passwoerter nicht uebereinstimmen
				//den bekommt der Benutzer eine Hinweismeldung und
				//es wird ein css File includiert welches die Felder
				//rot umrandet damit der Benutzer sieht wo der Fehler liegt.
				$Hm = "Passw&ouml;rter stimmen nicht &uuml;ber ein!<br><br>";
				?>
				<style>
				<?php include 'css/error.css'; ?>
				</style>
				<?php
				include 'form.html';
			}
	} else {
		//Falls die Eingaben leer sind kriegt der
		//Benutzer eine Hinweis Meldung
		$Hm = "Eingaben sind leer<br><br>";
		include 'form.html';
		
	}	
	
} else {
//Wenn Button nicht gedrückt wird soll Html Seite
//trotzdem includet werden
	include 'form.html';
}



?>