
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Einbinden von Propel
require_once '/home/ebibliothek/vendor/autoload.php';
require_once '/home/ebibliothek/proj/generated-conf/config.php';

  echo 'Test';
  $bookquery = new BookQuery();
  $bookquery->downloadFromServer("Affe");
  echo 'aus';

?>
