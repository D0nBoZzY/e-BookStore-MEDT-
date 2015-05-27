<?php
/**
 * Zweck: Steuerfile für Registrierung
 * Autor: Gligorevic Nenad
 * Datum: 2015-05-05
 * Überarbeitet: sschwarz, 23.05.2015
**/

function register($uname, $pw) {
	$user = new User();

	$user -> setName($uname);
	$user -> setPw($pw);
	$user -> setRole(0);
	//Speichert alle Aenderungen
	$user -> save();
}

if (isset($_POST['reg_btn'])) {
	//Eingaben in Variablen speichern
	$uname = ($_POST['uname']);
	$pw1 = ($_POST['pw1']);
	$pw2 = ($_POST['pw2']);
	$userquery = new UserQuery();	
	//Falls es bereits den selben Benutzer gibt
	//soll in die Variable $error geschrieben werden.
	$error = "".$userquery->findOneByName($uname);

	//Nichts darf leer sein
	if ($uname != "" && $pw1 != "" && $pw2 != ""){
		//Wenn die $error nicht leer ist dann gibt
		//es bereits einen Benutzer
		if ($error != "") {
			$error = "A User with this Username already Exists";
		} else {
			//Passwoerter muessen uebereinstimmen
			if ($pw1 == $pw2) {
				//Benutzer wird registriert in DB
				register($uname, $pw1);
				$notice = "Succesfully Registered";
			} else {
				$error = "Passwords do not Match";
			}
		}
	} else {
		$error = "Please fill out Everything";
	}
}
?>
