<?php
/*
  Delete-Funktion um ein File aus dem Server und den dazugehörigen DB-Eintrag zu löschen
  Autor: lzainzinger
  Version: 2015-05-04
*/

include("import/config.php");

class Buchfunktionen{

  function delete($title){
    $book = BookQuery::create()->findOneByTitle($title);
    $file = $book->getPath(); // Pfad zum File am Server

  // Löschen des Datenbank - Eintrages
    $book->delete(); // Löschen DB


  // Löschen des Files vom Server
    if (!unlink($file)) // Löschen des Files vom Server und Überprüfung
    {
      echo ("Error deleting $file"); // Ausgabe bei Error
    }
    else
    {
      echo ("Deleted $file"); // Ausgabe wenn Erfolgreich
    }
  }
}

?>
