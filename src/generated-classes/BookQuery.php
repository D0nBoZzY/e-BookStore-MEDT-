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
    Delete-Funktion um ein File aus dem Server und den dazugehoerigen DB-Eintrag zu loeschen
    Autor: lzainzinger
    Version: 2015-05-08
  */
  function deleteFromServer($title){
    $book = BookQuery::create()->findOneByTitle($title);
    $file = $book->getPath(); // Pfad zum File am Server


  // Loeschen des Files vom Server
    if (!unlink($file)) // Loeschen des Files vom Server und ueberpruefung
    {
      echo ("Error deleting $file"); // Ausgabe bei Error
    }
    else
    {
      echo ("Deleted $file"); // Ausgabe wenn Erfolgreich

      // Loeschen des Datenbank - Eintrages
        $book->delete(); // Loeschen DB
    }
  }

  /*
    Download-Funktion um ein File aus dem Server und den dazugehoerigen DB-Eintrag zu loeschen
    Autor: lzainzinger
    Version: 2015-05-09
  */
  function downloadFromServer($title){
    $book = BookQuery::create()->findOneByTitle($title);
    $file = $book->getPath(); // Pfad zum File am Server
    echo '<a href="'.$file.'">zum Download</a>'; //Ausgabe des Pfades zum File fuer den Download
  }
}
