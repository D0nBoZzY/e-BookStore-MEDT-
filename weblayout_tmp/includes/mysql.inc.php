<?php

//$mysqli = new mysqli("localhost", "root", "123456", "csgodice") or die("Konnte keine Verbindung zum Datenbankserver aufbauen!");
$mysqli = new mysqli("localhost", "gucci", "gucci", "gameviewer") or die("Konnte keine Verbindung zum Datenbankserver aufbauen!");
mysqli_set_charset($mysqli, "utf8");
$mysqli->autocommit(false);

?>