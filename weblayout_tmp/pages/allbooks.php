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
  $title = array();
  $content = array();
  $path = array();
  $author = array();
  $x = 1;
  while($x < 9){
    $book = $bq->findOneByBookId($x);
    array_push($title, $book->getTitle());
    array_push($content, $book->getTitle());
    array_push($path, $book->getTitle());
    array_push($author, $book->getTitle());
    $i++;
  }
  $smarty->assign("title", $title);
  $smarty->assign("content", $content);
  $smarty->assign("path", $path);
  $smarty->assign("author", $author);
?>
