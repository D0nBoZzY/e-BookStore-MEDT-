<?php

use Base\BookQuery as BaseBookQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'book' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class BookQuery extends BaseBookQuery
{

  /*
    Delete-Funktion um ein File aus dem Server und den dazugehörigen DB-Eintrag zu löschen
    Autor: lzainzinger
    Version: 2015-05-04
  */
  function delete($title){
    $book = BookQuery::create()->filterByTitle($title);
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
