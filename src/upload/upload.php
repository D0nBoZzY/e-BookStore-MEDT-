<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
// setup the autoloading
require_once '/home/ubuntu/propel/vendor/autoload.php';
// setup Propel
require_once '/home/ubuntu/propelprojects/ebookstore/generated-conf/config.php';
//Variablen
$title = "";
$url = "";
$tf =false;
/**
 * Erstellt einen neune Eintrag für das hochgeladene Buch in der DB
 * und schreibt auch den Pfad der EPUB Datei in die DB
 */
function write_in_db($title,$author,$picture,$publisher,$language,$content,$year,$userId) {
    $book = new Book();
    $book->setTitle($title);
    $book->setAuthor($author);
    $book->setPictureUrl($picture);
    $book->setPublisher($publisher);
    $book->setLanguage($language);
    $book->setContent($content);
    $book->setPath('/upload-books/dateiname.pub');
    $book->setYear($year);
    $book->setUserId($userId);
    $book->save();
}
/**
 * Erstellt die URL die AmazonWebServices verlangt um weiter Informationen
 * über das Buch mit dem eingegebenen Titel herauszufinden
 */
function create_url($AWS_AKI, $AWS_SAK, $AT, $title) {
    // Base URL, die geändert wird
    $base_url = "http://webservices.amazon.com/onca/xml?";
    //ersetzt
    $title = str_replace(' ', '%20', $title);
    // Parameter der URL
    $url_params = array('Operation'=>"ItemSearch",'Service'=>"AWSECommerceService",
     'AWSAccessKeyId'=>$AWS_AKI,'AssociateTag'=>$AT,
     'ResponseGroup'=>"Medium",'SearchIndex'=>"Book",'Title'=>$title);
    // Timestamp
    $url_params['Timestamp'] = date("Y-m-d\TH:i:s\Z");
    // Sortieren nach byte value
    $url_parts = array();
    foreach(array_keys($url_params) as $key)
        $url_parts[] = $key."=".$url_params[$key];
    sort($url_parts);
    // string für die unterschrift
    $string_to_sign = "GET\nwebservices.amazon.com\n/onca/xml\n".implode("&",$url_parts); // \n, für die verlanget$
    $string_to_sign = str_replace('+', '%20', $string_to_sign);
    $string_to_sign = str_replace(':', '%3A', $string_to_sign);
    $string_to_sign = str_replace(';', urlencode(';'), $string_to_sign);
    // unterschrift
    $sign = hash_hmac("sha256", $string_to_sign, $AWS_SAK, TRUE);
    // Base64 verschlüsseln
    $sign = base64_encode($sign);
    $sign = str_replace('+', '%2B', $sign);
    $sign = str_replace('=', '%3D', $sign);
    // fertige URL
    $url_string = implode("&", $url_parts);
    $url = $base_url.$url_string."&Signature=".$sign;
    return $url;
}
function create_url2($title, $AT){
      $title = str_replace(' ', '%20', $title);
      $url = "http://aws.ocrs.at/request.php?Service=AWSECommerceService&Version=2011-08-01&Operation=ItemSearch&SearchIndex=Books&AssociateTag=twitchtvd4rko-20&IncludeReviewsSummary=no&ResponseGroup=Large&Title=".$title;
      return $url;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    $title = $_POST['title_input'];
    $url = create_url2($title,$ASSOCIATE_TAG);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitiona$
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>upload</title>

    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="generator" content="Webocton - Scriptly (www.scriptly.de)" />


    <link href="style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>

    <script type="text/javascript" src= "jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
       var url = "<?php echo $url ?>";
       function write(data){
            var title = get1(data, "Title");
            var author = get1(data, "Author");
            var publisher = get1(data,"Publisher");
            var picture = get2(data,"MediumImage");
            var language = get2(data, "Language");
            var content =  get1(data,"Content");
            var year = get1(data,"PublicationDate");
		    
	    
	    <?php $tf=true; ?>
            $.post('upload.php',{title:title,author:author,publisher:publisher,picture:picture,language:language,content:content,year:year},
            function(data){
                $('#result').html(data);
            });
        }
        function get1(data,name){
            var get = data.getElementsByTagName(name)[0].childNodes[0].nodeValue;
            return get;
        }
        function get2(data,name){
            var get = data.getElementsByTagName(name)[0].firstChild.textContent;
            return get;
        }
        $(document).ready(function(){
        $.ajax({
        url:url,
        dataType:"xml",
        success: write
        });
        });
        </script>

        <?php
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $picture = $_POST['picture'];
        $language = $_POST['language'];
        $content = $_POST['content'];
        $year = $_POST['year'];
	if($tf==true){
	   if($title!=''){
	   
	      write_in_db($title,$author,$picture,$publisher,$language,$content,$year,2);
	      $tf=false;
	   }
        }
        ?>
     <div id ="result">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Set a Title:
        <input type="text" name="title_input" class="input_text" value=""/><br />
        Select a book to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" />
        <input type="submit" value="Upload Book" name="upload"/>

    </form>
    </div>

</body>
</html>