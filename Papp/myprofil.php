<?php
    error_reporting(E_ALL);
    include("mysql.php");
    include("functions.php");

    session_start();
    include("autologout.php");

    if(!isset($_SESSION['UserID'])) {
         echo "Sie sind nicht eingeloggt.<br>\n".
              "Bitte <a href=\"login.php\">loggen</a> Sie sich zuerst ein.\n";
    }
    else{
        // Avatar hochladen
        if(isset($_POST['submit']) AND $_POST['submit'] == "Avatar hochladen") {
            $errors = array();
            // Uploadfehler pr�fen
            switch ($_FILES['pic']['error']){
                case 1: $errors[] = "Bitte w�hlen Sie eine Datei aus, die kleiner als 20 KB ist.";
                                    break;
                case 2: $errors[] = "Bitte w�hlen Sie eine Datei aus, die kleiner als 20 KB ist.";
                                    break;
                case 3: $errors[] = "Die Datei wurde nur teilweise hochgeladen.";
                                    break;
                case 4: $errors[] = "Es wurde keine Datei ausgew�hlt.";
                                    break;
                default : break;
            }
            // Pr�fen, ob eine Grafikdatei vorliegt
            if(!@getimagesize($_FILES['pic']['tmp_name']))
                $errors[] = "Ihre Datei ist keine g�ltige Grafikdatei.";
            else {
                // Mime-Typ pr�fen
                $erlaubte_typen = array('image/pjpeg',
                                        'image/jpeg',
                                        'image/gif',
                                        'image/png'
                                       );
                if(!in_array($_FILES['pic']['type'], $erlaubte_typen))
                    $errors[] = "Der Mime-Typ ihrer Datei ist verboten.";

                // Endung pr�fen
                $erlaubte_endungen = array('jpeg',
                                           'jpg',
                                           'gif',
                                           'png'
                                          );
                // Endung ermitteln
                $endung = strtolower(substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.')+1));
                    if(!in_array($endung, $erlaubte_endungen))
                        $errors[] = "Die Dateiendung muss .jpeg .jpg .gif oder .png lauten ";

                // Ausma�e pr�fen
                $size = getimagesize($_FILES['pic']['tmp_name']);
                    if ($size[0] > 150 OR $size[1] > 150)
                        $errors[] = "Die Datei darf maximal 150 Pixel breit und 150 Pixel hoch sein.";
            }
            // Dateigr��e pr�fen
            if($_FILES['pic']['size'] > 0.2*1024*1024)
                $errors[] = "Bitte w�hlen Sie eine Datei aus, die kleiner als 20 KB ist.";

            if(count($errors)){
                echo "Ihr Avatar konnte nicht gespeichert werden.<br>\n".
                     "<br>\n";
                foreach($errors as $error)
                    echo $error."<br>\n";
                echo "<br>\n".
                     "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
            }
            else {
                // Bild auf dem Server speichern
                $uploaddir = 'avatare/';
                // neuen Bildname erstellen
                $Name = "IMG_".substr(microtime(),-8).".".$endung;
                if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploaddir.$Name)) {
                    $sql = "UPDATE
                                    User
                            SET
                                    Avatar = '".mysql_real_escape_string(trim($Name))."'
                            WHERE
                                    ID = ".$_SESSION['UserID']."
                           ";
                    mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());

                    echo "Ihr Avatar wurde erfolgreich gespeichert.<br>\n".
                         "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
                }
                else {
                    echo "Es trat ein Fehler auf, bitte versuche es sp�ter erneut.<br>\n".
                         "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
                }
            }
        }
        // Avatar l�schen
        elseif(isset($_POST['submit']) AND $_POST['submit'] == 'Avatar l�schen'){
            // Bildname des Avatars aus der Datenbank holen
            $sql = "SELECT
                        Avatar
                    FROM
                        User
                    WHERE
                        ID = '".$_SESSION['UserID']."'
                   ";
            $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            $row = mysql_fetch_assoc($result);
            // Datei l�schen
            unlink('avatare/'.$row['Avatar']);
            // Bildname des Avatars als leeren String setzen
            $sql = "UPDATE
                        User
                    SET
                        Avatar = ''
                    WHERE
                        ID = '".$_SESSION['UserID']."'
                   ";
            mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            echo "Ihr Avatar wurde erfolgreich gel�scht.<br>\n".
                 "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
        }
        // Daten �ndern
        elseif(isset($_POST['submit']) AND $_POST['submit']=='Daten �ndern'){
            // Fehlerarray anlegen
            $errors = array();
            // Pr�fen, ob alle Formularfelder vorhanden sind
            if(!isset($_POST['Email'],
                      $_POST['Show_Email'],
                      $_POST['Homepage'],
                      $_POST['Wohnort'],
                      $_POST['ICQ'],
                      $_POST['AIM'],
                      $_POST['YIM'],
                      $_POST['MSN']))
                // Ein Element im Fehlerarray hinzuf�gen
                $errors = "Bitte benutzen Sie das Formular aus Ihrem Profil";
            else{
                $emails = array();
                $sql = "SELECT
                               Email
                        FROM
                               User
                       ";
                $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
                while($row = mysql_fetch_assoc($result))
                    $emails[] = $row['Email'];
                // momentane Email-Adresse ausfiltern
                $sql = "SELECT
                               Email
                        FROM
                               User
                        WHERE
                               ID = '".mysql_real_escape_string($_SESSION['UserID'])."'
                       ";
                $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
                $row = mysql_fetch_assoc($result);

                if(trim($_POST['Email'])=='')
                    $errors[]= "Bitte geben Sie Ihre Email-Adresse ein.";
                elseif(!preg_match('�^[\w\.-]+@[\w\.-]+\.[\w]{2,4}$�', trim($_POST['Email'])))
                    $errors[]= "Ihre Email Adresse hat eine falsche Syntax.";
                elseif(in_array(trim($_POST['Email']), $emails) AND trim($_POST['Email'])!= $row['Email'])
                    $errors[]= "Diese Email-Adresse ist bereits vergeben.";
                }
                if(count($errors)){
                    echo "Ihre Daten konnten nicht bearbeitet werden.<br>\n".
                         "<br>\n";
                    foreach($errors as $error)
                        echo $error."<br>\n";
                    echo "<br>\n".
                         "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
                }
                else{
                $sql = "UPDATE
                                User
                        SET
                                Email =  '".mysql_real_escape_string(trim($_POST['Email']))."',
                                Show_Email = '".mysql_real_escape_string(trim($_POST['Show_Email']))."',
                                Wohnort = '".mysql_real_escape_string(trim($_POST['Wohnort']))."',
                                Homepage = '".mysql_real_escape_string(trim($_POST['Homepage']))."',
                                ICQ = '".mysql_real_escape_string(trim($_POST['ICQ']))."',
                                AIM = '".mysql_real_escape_string(trim($_POST['AIM']))."',
                                YIM = '".mysql_real_escape_string(trim($_POST['YIM']))."',
                                MSN = '".mysql_real_escape_string(trim($_POST['MSN']))."'
                        WHERE
                                ID = '".mysql_real_escape_string($_SESSION['UserID'])."'
                       ";
                mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
                echo "Ihre Daten wurden erfolgreich gespeichert.<br>\n".
                     "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
            }
        }
        // Passwort �ndern
        elseif(isset($_POST['submit']) AND $_POST['submit'] == 'Passwort �ndern') {
            $errors=array();
            // Altes Passwort zum Vergleich aus der Datenbank holen
            $sql = "SELECT
                        Passwort
                    FROM
                        User
                    WHERE
                        ID = '".$_SESSION['UserID']."'
                   ";
            $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            $row = mysql_fetch_assoc($result);
            if(!isset($_POST['Passwort'],
                      $_POST['Passwortwiederholung'],
                      $_POST['Altes_Passwort']))
                $errors[]= "Bitte benutzen Sie das Formular aus Ihrem Profil.";
            else {
                if(trim($_POST['Passwort'])=="")
                    $errors[]= "Bitte geben Sie Ihr Passwort ein.";
                elseif(strlen(trim($_POST['Passwort'])) < 6)
                    $errors[]= "Ihr Passwort muss mindestens 6 Zeichen lang sein.";
                if(trim($_POST['Passwortwiederholung'])=="")
                    $errors[]= "Bitte wiederholen Sie Ihr Passwort.";
                elseif(trim($_POST['Passwort']) != trim($_POST['Passwortwiederholung']))
                    $errors[]= "Ihre Passwortwiederholung war nicht korrekt.";
                // Kontrolle des alten Passworts
                if(trim($row['Passwort']) != md5(trim($_POST['Altes_Passwort'])))
                    $errors[]= "Ihr altes Passwort ist nicht korrekt.";
            }
            if(count($errors)){
                echo "Ihr Passwort konnte nicht gespeichert werden.<br>\n".
                     "<br>\n";
                 foreach($errors as $error)
                     echo $error."<br>\n";
                 echo "<br>\n".
                      "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
            }
            else{
                $sql = "UPDATE
                                User
                        SET
                                Passwort ='".md5(trim($_POST['Passwort']))."'
                        WHERE
                                ID = '".$_SESSION['UserID']."'
                       ";
                mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
                echo "Ihr Passwort wurde erfolgreich gespeichert.<br>\n".
                     "Zur�ck zum <a href=\"".$_SERVER['PHP_SELF']."\">Profil</a>\n";
            }
        }
        else {
            $sql = "SELECT
                         Nickname,
                         Email,
                         Show_Email,
                         Wohnort,
                         Homepage,
                         ICQ,
                         AIM,
                         YIM,
                         MSN,
                         Avatar
                     FROM
                         User
                     WHERE
                         ID = '".mysql_real_escape_string($_SESSION['UserID'])."'
                    ";
            $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            $row = mysql_fetch_assoc($result);
            echo "<form ".
                 " name=\"Daten\" ".
                 " action=\"".$_SERVER['PHP_SELF']."\" ".
                 " method=\"post\" ".
                 " accept-charset=\"ISO-8859-1\">\n";
            echo "<h5>Obligatorische Angaben</h5>\n";
            echo "<span>\n".
                 "Nickname :\n".
                 "</span>\n";
            echo htmlentities($row['Nickname'], ENT_QUOTES)."\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\" ".
                 " title=\"Ihre.Adresse@Ihr-Anbieter.de\">\n".
                 "Email-Adresse:\n".
                 "</span>\n";
            echo "<input type=\"text\" name=\"Email\" maxlength=\"70\" value=\"".htmlentities($row['Email'], ENT_QUOTES)."\">\n";
            echo "<br>\n";
            echo "<span>\n".
                 "Email-Adresse anzeigen:\n".
                 "</span>\n";
            if($row['Show_Email']==1){
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"1\" checked> ja\n";
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"0\"> nein\n";
            }
            else{
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"1\"> ja\n";
                echo "<input type=\"radio\" name=\"Show_Email\" value=\"0\" checked> nein\n";
            }
            echo "<h5>Freiwillige Angaben</h5>\n";
            echo "<span style=\"font-weight:bold;\">\n".
                 "Homepage :\n".
                 "</span>\n";
            echo "<input type=\"text\" name=\"Homepage\" maxlength=\"70\" value=\"".htmlentities($row['Homepage'], ENT_QUOTES)."\">\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\">\n".
                 "Wohnort :\n".
                 "</span>\n";
            echo "<input type=\"text\" name=\"Wohnort\" maxlength=\"70\" value=\"".htmlentities($row['Wohnort'], ENT_QUOTES)."\">\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\">\n".
                 "ICQ :\n".
                 "</span>\n";
            echo "<input type=\"text\" name=\"ICQ\" maxlength=\"20\" value=\"".htmlentities($row['ICQ'], ENT_QUOTES)."\">\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\">\n".
                 "AIM :\n".
                 "</span>\n";
            echo "<input type=\"text\" name=\"AIM\" maxlength=\"70\" value=\"".htmlentities($row['AIM'], ENT_QUOTES)."\">\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\">\n".
                 "YIM :\n".
                 "</span>\n";
            echo "<input type=\"text\" name=\"YIM\" maxlength=\"70\" value=\"".htmlentities($row['YIM'], ENT_QUOTES)."\">\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\">\n".
                 "MSN :\n".
                 "</span>\n";
            echo "<input type=\"text\" name=\"MSN\" maxlength=\"70\" value=\"".htmlentities($row['MSN'], ENT_QUOTES)."\">\n";
            echo "<br>\n";
            echo "<input type=\"submit\" name=\"submit\" value=\"Daten �ndern\">\n";
            echo "</form>\n";

            echo "<form ".
                 " name=\"Passwort\" ".
                 " action=\"".$_SERVER['PHP_SELF']."\" ".
                 " method=\"post\" ".
                 " accept-charset=\"ISO-8859-1\">\n";
            echo "<span style=\"font-weight:bold;\" ".
                 " title=\"min.6\">\n".
                 "Altes Passwort :\n".
                 "</span>\n";
            echo "<input type=\"password\" name=\"Altes_Passwort\">\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\" ".
                 " title=\"min.6\">\n".
                 "Neues Passwort :\n".
                 "</span>\n";
            echo "<input type=\"password\" name=\"Passwort\">\n";
            echo "<br>\n";
            echo "<span style=\"font-weight:bold;\" ".
                 " title=\"min.6\">\n".
                 "Neues Passwort wiederholen:\n".
                 "</span>\n";
            echo "<input type=\"password\" name=\"Passwortwiederholung\">\n";
            echo "<br>\n";
            echo "<input type=\"submit\" name=\"submit\" value=\"Passwort �ndern\">\n";
            echo "</form>\n";

            // Avatar
            echo "<form ".
                 " name=\"Avatar\" ".
                 " action=\"".$_SERVER['PHP_SELF']."\" ".
                 " method=\"post\" ".
                 " enctype=\"multipart/form-data\" ".
                 " accept-charset=\"ISO-8859-1\">\n";
            echo "<span style=\"font-weight:bold;\" ".
                 " title=\"max. 20kb\nmax 150x150 Pixel\n .jpg .gif oder .png\">\n".
                 "Avatar :\n".
                 "</span>\n";
            if($row['Avatar']=='')
                echo "Kein Avatar vorhanden.\n";
            else
                echo "<img src=\"avatare/".htmlentities($row['Avatar'], ENT_QUOTES)."\">\n";
            if($row['Avatar']=='') {
                echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".(0.02*1024*1024)."\">";
                echo "<input name=\"pic\" type=\"file\">\n";
                echo "<input type=\"submit\" name=\"submit\" value=\"Avatar hochladen\">\n";
            }
            else
                echo "<input type=\"submit\" name=\"submit\" value=\"Avatar l�schen\">\n";
            echo "</form>\n";
        }
    }
?>