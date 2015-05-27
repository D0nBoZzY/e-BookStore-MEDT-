<?php

require_once "/home/ebibliothek/vendor/autoload.php";
require_once "/home/ebibliothek/ebibliothek/generated-conf/config.php";

function downloadFromServer($title){
    $book = BookQuery::create()->findOneByTitle($title);
    $file = $book->getPath(); // Pfad zum File am Server
    echo '<a href="'.$file.'">zum Download</a>'; //Ausgabe des Pfades zum File fuer den Download
}

?>
