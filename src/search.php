<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
require_once ("/home/ebookstore/vendor/autoload.php");
require_once ("/home/ebookstore/proj/generated-conf/config.php");

$suchergebnis="";//Variable in die alle Suchergebnisse gespeichert weren
$bookquery = new BookQuery();


if(isset($_POST['suchen'])){
    $suchbegriff = $_POST['begriff'];
    /*Variante 1 funktioniert nicht
    $suchergebnis+=bookquery->findByTitle($suchbegriff);
    $suchergebnis+=bookquery->findByAuthor($suchbegriff);
    $suchergebnis+=bookquery->findByPublisher($suchbegriff);
    */
    /*Variante 2 funktioniert auch noch nicht.FUnktioniert nur mit find ONE TITLE
    $buch = $bookquery->findByTitle($suchbegriff);
        for each($buch as $b){
            echo $b->getTitle();
        }  
    */
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
