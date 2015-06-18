<?php
require_once '/home/schueler/propel/vendor/autoload.php';
require_once '/home/schueler/propelProjects/weblayout_tmp/generated-conf/config.php';

$bq = BookQuery::create();

$book = bq->findOneByBookId($id)
$title = $book->getTitle();
$author = $book->getAuthor();
$content = $book->getContent();
$language = $book->getLanguage();
$year = $book->getYear();
$publisher = $book->getPublisher();
$id = $_POST["id"];//noch unklar wegen implementierung Luki

$smarty->assign("id",$id); // macht Varaible global
$smarty->assign("title", $title);//macht Variable global
$smarty->assign("author", $author);//macht Variable global
$smarty->assign("content", $content);//macht Variable global
$smarty->assign("language", $language);//macht Variable global
$smarty->assign("year", $year);//macht Variable global
$smarty->assign("publisher", $publisher);//macht Variable global
?>
