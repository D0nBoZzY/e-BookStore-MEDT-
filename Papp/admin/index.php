
<html>
<head> <link rel="stylesheet" href="btn.css" type="text/css"> </head>
<body>




<?php
    error_reporting(E_ALL);
    include("../mysql.php");
    include("../functions.php");
	

    session_start();
    include("../autologout.php");

    // Prüfen, ob der User den Adminbereich betreten darf
    if(!isset($_SESSION['Rechte']) OR !in_array('Adminbereich', $_SESSION['Rechte']))
        die("Sie haben keine Berechtigung, diese Seite zu betreten!\n");
	// Prüfen, ob der User ein Moderator ist
	if(in_array('Moderieren', $_SESSION['Rechte']))
		die("Du bist ein Moderator!\n");

    // Array für die Bereiche anlegen
    $page = array();
    $page['user'] = "user/index.php";

    // Prüfen, ob die als $_GET['page'] übergebene Seite existiert
    if(isset($_GET['page']) AND isset($page[$_GET['page']]))
        include $page[$_GET['page']];
    // Ansonsten wird das Menu angezeigt
    else
        echo "<a href=\"index.php?page=user\" class='myButton'>User administrieren</a>\n";

    echo "<p>Zurück zur <a href=\"../index.php\" class='myButton' >Startseite</a></p>";
?>

</body>
</html>