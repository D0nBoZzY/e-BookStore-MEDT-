<?php

/**
* Benutzer registrieren
* @param $bname, $pw  Benutzername und Passwort
*
*/

function Benutzer_registrieren($bname,$pw) {
	$user = new User();
	
	$user -> setBenutzername($bname);
	$user -> setPasswort(crypt($pw));
	$user -> setRolle(0);
	//Speichert alle Aenderungen
	$user -> save();
}

/**
* Benutzername auf existenz ueberprufen
* @param $bname Benutzername
*
*/
function Benutzer_exist($bname) {
	$userquery = new UserQuery();
	///Falls es bereits den selben Benutzer gibt
	//soll in die Vaariable $Fm geschrieben werden.
	$Fm = "".$userquery->findOneByBenutzername($bname);
	//Wenn die $Fm nicht leer ist dann gibt
	//es bereits einen Benutzer
	if ($Fm != "") {
		//$Fm = "Dieser Benutzername existiert bereits<br><br>";

		return true;
	 } else {
		return false;
	 }
}

define('REG_ERFOLGREICH', 0);
define('REG_FEHLER_LEER', 1);
define('REG_FEHLER_UNGLEICHPW', 2);
define('REG_FEHLER_LAENGE', 3);
define('REG_FEHLER_ZEICHENUNG', 4);

function Reg_richtigkeit_ueberprufen($bname, $pw1, $pw2) {
	//Nichts darf leer sein
	if ($bname == "" || $pw1 == "" || $pw2 == ""){
		return REG_FEHLER_LEER;
	}
				
	//es wird ueberprueft ob benutzername
	//nur aus gueltigen zeichen besteht
	$regexp = "/^[a-zA-Z0-9]*$/";
	if (!preg_match($regexp, $bname)) {
		return REG_FEHLER_ZEICHENUNG;
	}
	
	//es wird ueberprueft ob PW 
	//mehr als 6 zeichen hat
	//und Bname mehr als 4 Zeichen
	if (strlen($pw1) < 6 || strlen($bname) < 4)  {
		return REG_FEHLER_LAENGE;
	}
	
	//Passwoerter muessen uebereinstimmen
	if ($pw1 != $pw2) {
		return REG_FEHLER_UNGLEICHPW;
	}

	// gueltiegen benutzernamen und passwort
	return REG_ERFOLGREICH;
}

?>