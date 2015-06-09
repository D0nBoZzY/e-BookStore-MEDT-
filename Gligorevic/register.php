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

require_once 'register.fnc.php';

if (isset($_POST['reg_btn'])) {
	//Eingaben in Variablen speichern
	$bname = ($_POST['reg_bname']);
	//In Session Variable speichern
//	$_SESSION['reg_bname'] = $bname;
	$pw1 = ($_POST['reg_pw']);
	$pw2 = ($_POST['reg_pw2']);
	
	
	if (Benutzer_exist($bname) == true) {
		$Fm = "Dieser Benutzername existiert bereits<br><br>";
		unset($bname);
	}else{
		$regstatus = Reg_richtigkeit_ueberprufen($bname, $pw1, $pw2);
		
		switch($regstatus){
			case REG_FEHLER_LEER:
					//Falls die Eingaben leer sind kriegt der
					//Benutzer eine Hinweis Meldung
					$Hm = "Eingaben sind leer<br><br>";

				break;
				
			case REG_FEHLER_UNGLEICHPW:
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

				break;
				
			case REG_FEHLER_LAENGE:
				//Hinweismeldung ausgeben das die Eingaben
				//auf die Richtlinien angepasst werden.
				$Hm = "Passw&ouml;rt mind. 6 Zeichen<br>Benutzername mind. 4 Zeichen<br>";

				break;
				
			case REG_FEHLER_ZEICHENUNG:
				//Hinweismeldung ausgeben das die Eingaben
				//auf die Richtlinien angepasst werden.
				$Hm = "Nur Buchstaben und Zahlen<br>";
				unset($bname);

				break;
				
			case REG_ERFOLGREICH:
				//Benutzer wird registriert in DB
				Benutzer_registrieren($bname, $pw1);
				//Nachdem der Benutzer erfolgreich registriert
				//wurde wird er auf die naechste Seite geschickt.
				header('location: erfolgreich_reg.html');
				break;
		}
	
	}
}


//Wenn Button nicht gedrückt wird soll Html Seite
//trotzdem includet werden
include 'form.html';


?>