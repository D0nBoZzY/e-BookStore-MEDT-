<?php
//Zweck : Steuerfile fue Registrierung
//Autor: Gligorevic Nenad
//Datum 20150505

session_start();
$Fm = '';   //Fehlermeldungen
$Hm = '';   //Hinweismeldungen
// setup the autoloading
require_once '../vendor/autoload.php';
// setup Propel
require_once '../generated-conf/config.php';

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
	$pw1 = ($_POST['reg_pw']);
	$pw2 = ($_POST['reg_pw2']);
	$userquery = new UserQuery();	
	//Falls es bereits den selben Benutzer gibt
	//soll in die Vaariable $Fm geschrieben werden.
	$Fm = "".$userquery->findOneByBenutzername($bname);
	
	//Nichts darf leer sein
	if ($bname != "" && $pw1 != "" && $pw2 != ""){
		//Wenn die $Fm nicht leer ist dann gibt
		//es bereits einen Benutzer
		if ($Fm != "") {
			$Fm = "Dieser Benutzername existiert bereits<br>";
			include 'form.html';
		} else {
			//Passwoerter muessen uebereinstimmen
			if ($pw1 == $pw2) {
				//Benutzer wird registriert in DB
				Benutzer_registrieren($bname, $pw1);
				//Nachdem der Benutzer erfolgreich registriert
				//wurde wird er auf die naechste Seite geschickt.
				header('location: erfolgreich_reg.html');
			} else {
				//Wenn die Passwoerter nicht uebereinstimmen
				//den bekommt der Benutzer eine Hinweismeldung und
				//es wird ein css File includiert welches die Felder
				//rot umrandet damit der Benutzer sieht wo der Fehler liegt.
				$Hm = "Passw&ouml;rter stimmen nicht &uuml;ber ein!<br>";
				?>
				<style>
				<?php include 'css/error.css'; ?>
				</style>
				<?php
				include 'form.html';
			}
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