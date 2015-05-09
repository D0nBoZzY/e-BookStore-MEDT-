<?php
/**
 * Upload Funktion: Ein User gibt den Titel des Buches an, zu diesem Titel wird eine
 * AmazonWebServide-Such-URL erstellt, welche weitere Informationen wie Autor, Genre, Bild, ...
 * über das Buch herausfindet. Danach werden diese Informationen,
 * zusammen mit dem Pfad zur .epub Datei, welche ebenfalls der User hochlädt, 
 * in die DB gespeichert.
 * 
 * @author Schwarz Stephan
 * @version 2015-05-09
 */ 
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once ("/home/schueler/propelProjects/vendor/autoload.php");
require_once ("/home/schueler/propelProjects/ebookstore/generated-conf/config.php");

// Variablen
$AWS_ACCESS_KEY_ID = "";
$AWS_SECRET_ACCESS_KEY = "";
$ASSOCIATE_TAG = "";
$title = "";
$url = "";

/**
 * Erstellt einen neune Eintrag für das hochgeladene Buch in der DB 
 * und schreibt auch den Pfad der EPUB Datei in die DB
 */ 
function write_in_db() {
    $book = new Book();
    $book->setTitle($title);
    $book->setAuthor('aut');
    $book->setGenre('ger');
    $book->setPublisher('pub');
    $book->setLanguage('ger');
    $book->setContent('das ist ein toller content');
    $book->setPath('/upload-books/dateiname.pub');
    $book->setYear('2011-11-11');
    $book->setUserId(1);

    $book->save();
}

/**
 * Erstellt die URL die AmazonWebServices verlangt um weiter Informationen
 * über das Buch mit dem eingegebenen Titel herauszufinden
 */ 
function create_url() {
    // Base URL, die geändert wird
    $base_url = "http://webservices.amazon.com/once/xml?";
    
    // Parameter der URL
    $url_params = array('Operation'=>"ItemSearch",'Service'=>"AWSECommerceService",
     'AWSAccessKeyId'=>$AWS_ACCESS_KEY_ID,'AssociateTag'=>$ASSOCIATE_TAG,
     'ResponseGroup'=>"Small",'SearchIndex'=>"Books",'Title'=>$title);
    
    // Timestamp
    $url_params['Timestamp'] = date("Y-m-d\TH:i:s\Z");
    
    // Sortieren nach byte value
    $url_parts = array();
    foreach(array_keys($url_params) as $key)
        $url_parts[] = $key."=".$url_params[$key];
    sort($url_parts);
    
    // string für die unterschrift
    $string_to_sign = "GET\nwebservices.amazon.com\n/onca/xml\n".implode("&",$url_parts); // \n, für die verlangeten l$
    $string_to_sign = str_replace('+', '%20', $string_to_sign);
    $string_to_sign = str_replace(':', '%3A', $string_to_sign);
    $string_to_sign = str_replace(';', urlencode(';'), $string_to_sign);
    
    // unterschrift
    $sign = hash_hmac("sha256", $string_to_sign, $AWS_SECRET_ACCESS_KEY, TRUE);
    
    // Base64 verschlüsseln
    $sign = base64_encode($sign);
    $sign = str_replace('+', '%2B', $sign);
    $sign = str_replace('=', '%3D', $sign);
    
    // fertige URL
    $url_string = implode("&", $url_parts);
    $url = $base_url.$url_string."&Signature=".$sign;
    return $url;
}

if(isset($_POST['upload'])){
    $url = create_url($AWS_ACCESS_KEY_ID, $AWS_SECRET_ACCESS_KEY, $ASSOCIATE_TAG, $title);
    echo($url);
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>upload</title>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="generator" content="Webocton - Scriptly (www.scriptly.de)" />

    <script src="js/jquery.js" type="text/javascript"></script>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <script type="text/javascript">    
    </script>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Set a Title:
        <input type="test" name="title" class="input_text"><br />
        Select a book to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Book" name="upload">
    </form>
</body>
</html>
