<html>
<head>  <link rel="stylesheet" href="btn.css" type="text/css"> </head>
<body>


<?php
    error_reporting(E_ALL);
    // Pr�fen, ob der User den Adminbereich betreten darf
    if(!in_array('User administrieren', $_SESSION['Rechte']))
        die("Sie haben keine Berechtigung, diese Seite zu betreten!\n");

    switch(isset($_GET['action'])?$_GET['action']:''){

        case 'edit':
            include 'user/edit.php';
                    echo "Zur�ck zum <a href=\"index.php?page=user\" class='myButton' >User-Menu</a>\n";
                         break;

         case 'delete':
            include 'user/delete.php';
                    echo "Zur�ck zum <a href=\"index.php?page=user\" class='myButton' >User-Menu</a>\n";
                         break;
						 
		// Hier muss noch die Sperrfunktion implementiert werden.	
		
		case 'block':
            include 'user/block.php';
                    echo "Zur�ck zum <a href=\"index.php?page=user\" class='myButton' >User-Menu</a>\n";
                         break;	 

         default:
                         $actions = array('edit' => 'bearbeiten',
                                   'delete' => 'l�schen',
								   'block' => 'Sperren');

                         foreach($actions as $action => $name)
                    echo "<a href=\"index.php?page=user&action=".$action."\" class='myButton'>".$name."  </a><br><br>\n";
                 break;
    }

    echo "<p>Zur�ck zum <a href=\"index.php\" class='myButton' >Adminbereich</a></p>";
?>

</body>
</html>