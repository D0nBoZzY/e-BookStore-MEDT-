<em><?php
// Datum:	15052015
// Autor:	ANIR
// Zweck:	Anzeigen aller User in der Tabelle

// 1.) Variablen initialisieren
session_start();
if (!isset($_SESSION['order'])) $_SESSION['order'] = '1';

$err = '';
$msg = '';
$tab = '';
	
if (!isset($_POST['actor'])) {
	$actor= '';
} else {
	$actor = $_POST['actor'];
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
$link = mysqli_connect('localhost', 'root', 'admin', 'sakila');
if (!$link) {
    $err .= 'MySQL Error: ' . mysqli_connect_errno() . "<br>\n";
} else {
    // $msg .= 'Success... ' . mysqli_get_host_info($link) . "<br>\n";
	if(!isset($_POST['$radiobutton'])){
	    $query = 'DELETE FROM actor WHERE actor_id=' . $_POST['$radiobutton'] . ';';
	   	$res = mysqli_query($link, $query);
		echo($query);
}
    // 3.) Query ausführen
   
	$query = 'SELECT * FROM actor';
    echo "Europe/Vienna";
	// $msg .= $query . "<br>\n";
    $res = mysqli_query($link, $query);
    if (!$res) {
        $err .= 'MySQL Error: ' . mysqli_error($link) . "<br>\n";
    } else {
        // $msg .= 'Success... rows: ' . mysqli_num_rows($res) . "<br>\n";
        
        while ($row = mysqli_fetch_assoc($res)) {
            $tab .= '<tr>'
				 .	'<td>'
				 .  '<input type="radio" name="radiobutton" value="'.$row['actor_id'].'">'
              	 .	'</td>'
				 .	'<td>'
                 .	$row['first_name']
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
		<form action="eBibliothek.php" method="post">
			
			<table border="1">
				<tr>
                	
					<th>
                    <input type="submit" name="loeschen" value="User loeschen">
                   
                    </th>
                    <th>
						<input type="text" name="titel">
						<a href="?order=1<?php if ($order == '1') if ($dir == 'ASC') echo '&amp;dir=DESC'; ?>">Filmtitel</a>
					</th>
<!--					<th>
						<a href="?order=2<?php if ($order == '2') if ($dir == 'ASC') echo '&amp;dir=DESC'; ?>">Episodentitel</a>
						<input type="text" name="episode">
					</th>
					<th>
						<a href="?order=3<?php if ($order == '3') if ($dir == 'ASC') echo '&amp;dir=DESC'; ?>">Genre</a>
						<input type="text" name="genre">
						<input type="submit" name="suchen" value="Suchen">
					</th> -->
				</tr>
				<?php if ($tab != '') echo $tab; ?>
			</table>
		</form>	
    </body>
</html>
</em>