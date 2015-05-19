<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '/home/ebibliothek/vendor/autoload.php';
require_once '/home/ebibliothek/proj/generated-conf/config.php';
//include("/home/ebibliothek/proj/generated-conf/config.php");
//include("/home/ebibliothek/proj/generated-classes/Base/BookQuery.php");
//include("/home/ebibliothek/proj/generated-classes/BookQuery.php");
  echo 'Test';
  $bookquery = new BookQuery();
  $barray = $bookquery->search('Affe');

  foreach ($barray as &$value) {
    try{
      echo $value->getTitle();
    }catch(Exception $e){
        echo $e->getMessage();
    }
  }

  echo 'aus';

?>
