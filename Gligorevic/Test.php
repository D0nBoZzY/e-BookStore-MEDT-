<?php


$zumtesten = "nenad123"; 
$testergebnis = filter_var($zumtesten, FILTER_VALIDATE_INT);
if ($testergebnis == false) 
{ 
    // invalide
    echo "Typ entspricht NICHT dem erwarteten"; 
} 
else 
{ 
    // valid
    echo "Typ korrekt"; 
}

?>