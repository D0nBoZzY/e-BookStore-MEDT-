<!--
Dieses File ist fuer die Suche zustaendig.
-->
<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
require_once ("/home/ebookstore/vendor/autoload.php");
require_once ("/home/ebookstore/proj/generated-conf/config.php");

$suchergebnis;//Variable in die alle Suchergebnisse gespeichert weren
$bookquery = new BookQuery();


if(isset($_POST['suchen'])){
    $suchbegriff = $_POST['begriff'];
    $suchergebnis = $bookquery->findByTitle("%". $_POST['begriff'] . "%");
        foreach($suchergebnis as $key){
            echo $key . "<br />";
        }
}
?>
<html>
  <head></head>
  <body>
    <form action="search.php" method="post">
      <input type="text" name="begriff" value="Affe" >
      <input type="submit" value="Suchen" name="suchen"/>
    </form>
 </body>
</html>
