<?php
session_start(); 
?>
<?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
<a href="facebook/logout.php">Logout</a>
<?php else: ?>     <!-- Before login --> 
<a href="facebook/fbconfig.php"><img src="facebook.png"></img></a>
<?php endif ?>
