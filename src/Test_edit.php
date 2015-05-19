<?php
error_reporting(E_ALL);//zeigt alle Erros an
ini_set('display_errors', 1);
//Einbinden von Propel
require_once '/home/ebibliothek/vendor/autoload.php';
require_once '/home/ebibliothek/proj/generated-conf/config.php';

  echo 'Test';
  $book = BookQuery::create()->findOneByBookId($book_id);
  echo $book;
  $bookedit = new BookQuery();
  try{
  $bookedit->editFromServer(1,"neu","neu","neu","neu","neu","neu",2015);
}catch(Exception $e){
  echo 'gefangen, ' . $e->getMessage();
}
  



?>
