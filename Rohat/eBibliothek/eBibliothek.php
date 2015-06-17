<em><?php
// Datum:	15052015
// Autor:	ANIR
// Zweck:	Anzeigen aller User in der Tabelle

// 1.) Variablen initialisieren
session_start();
error_reporting(0);	

if (!isset($_SESSION['order'])) $_SESSION['order'] = '1';

$err = '';
$msg = '';
$tab = '';
	
if (!isset($_POST['user'])) {
	$user= '';
} else {
	$user = $_POST['user'];
}


// Sortierung der Ausgabe bestimmen
if (!isset($_GET['order'])) {
	// Erstaufruf: Ausgabe immer Spalte 1 + "aufsteigend"
	$order = '1';
	$dir = 'ASC';
} else {
	$order = $_GET['order'];
	if ($_SESSION['order'] != $order) {
		// bei Wechsel der Sortierung immer "aufsteigend"
		$dir = 'ASC';
	} else {
		if (!isset($_GET['dir'])) {
			// ohne Parameter ist "aufsteigend" gemeint
			$dir = 'ASC';
		} else {
			if ($_GET['dir'] == 'DESC') {
				$dir = 'DESC';
			} else {
				$dir = 'ASC';
			}
		}
	}
}
$_SESSION['order'] = $order;

$radiobutton="";	
// 2.) Verbindung zum DB-Server aufbauen
$link = mysqli_connect('localhost', 'root', 'admin', 'ebib');
if (!$link) {
    $err .= 'MySQL Error: ' . mysqli_connect_errno() . "<br>\n";
} else {
    // $msg .= 'Success... ' . mysqli_get_host_info($link) . "<br>\n";
	if(isset($_POST['loeschen'])){
	
	    $query = 'DELETE FROM user WHERE UserID='.$_POST['radiobutton'].';';
		
	   	$res = mysqli_query($link, $query);
}
    // 3.) Query ausführen
   
	$query = 'SELECT * FROM user';
    
	// $msg .= $query . "<br>\n";
    $res = mysqli_query($link, $query);
    if (!$res) {
        $err .= 'MySQL Error: ' . mysqli_error($link) . "<br>\n";
    } else {
        // $msg .= 'Success... rows: ' . mysqli_num_rows($res) . "<br>\n";
        
        while ($row = mysqli_fetch_assoc($res)) {
            $tab .= '<tr>'
				 .	'<td>'
				 .  '<input type="radio" name="radiobutton" value="'.$row['UserID'].'">'
              	 .	'</td>'
				 .	'<td>'
                 .	$row['benutzername']
                 .  '</td>'
				 .	'<td>'
                 .	$row['passwort']
                 .  '</td>'
                 .  '</tr>'
                 .  "\n";
        }
    }
    
    // 4.) Verbindung zum Server abbauen
    mysqli_close($link);
}

// 5.) HTML-Dokument mit dynamischen Inhalten generieren bzw. ergänzen
// ev. Sortierrichtung wechseln 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">
<html lang="de">
    <head>
        <title>eBibliothek</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	</head>
    <body>
		<h1>eBibliothek</h1>
        <?php if ($err != '') echo '<span style="color:red">'  . $err . '</span>'; ?>
        <?php if ($msg != '') echo '<span style="color:blue">' . $msg . '</span>'; ?>
		<form action ="" method="post">
			
			<table border="1">
				<tr>
                	
					<th>
                    <input type="submit" name="loeschen" value="Delete User">
                   
                    </th>
                    <th>
						User
					</th>
					<th>
						Passwort
					</th>
				</tr>
				<?php if ($tab != '') echo $tab; ?>
			</table>
		</form>	
    </body>
</html>
</em>