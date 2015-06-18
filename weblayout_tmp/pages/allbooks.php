
<?php
require_once '/home/ebibliothek/vendor/autoload.php';
require_once '/home/ebibliothek/proj/generated-conf/config.php';
  $bq = BookQuery::create();
  /**$books = array();
  $title = array();
  for($x = 1; $x<9; $x ++){
    $book = $bq->findOneByBookId($x);
    array_push($books, $book);
    array_push($title, $book->getTitle());
  }**/
  $book = $bq->findOneByBookId(1); //Statisch gesetzt, da es Probleme beim auslesen gab, daran wird gerade gearbeitet
  $title = $book->getTitle();
  $content = $book->getContent();
  $path = $book->getPath();
  $author = $book->getAuthor();
  $smarty->assign("title", $title);
  $smarty->assign("content", $content);
  $smarty->assign("path", $path);
  $smarty->assign("author", $author);
?>
