<?php /* Smarty version 3.1.25, created on 2015-06-16 14:49:53
         compiled from "C:\Program Files (x86)\Server\Apache2.2\htdocs\E-BIBLIOTHEK\E_Biblio\form_logout.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:926455803791b52e77_45335289%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79c4c9526d1bc3892c6c08844fd16897d306d9dd' => 
    array (
      0 => 'C:\\Program Files (x86)\\Server\\Apache2.2\\htdocs\\E-BIBLIOTHEK\\E_Biblio\\form_logout.tpl',
      1 => 1434466056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '926455803791b52e77_45335289',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.25',
  'unifunc' => 'content_55803791bb8792_25374480',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55803791bb8792_25374480')) {
function content_55803791bb8792_25374480 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '926455803791b52e77_45335289';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>EBibliothek</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of -HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>

  <body>



     <nav class="navbar navbar-inverse navbar-fixed-top" id="test">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a  id="header" class="navbar-brand" href="login.html">e-Library</a>
		  <!-- <a  id="header" class="navbar-brand" href="login.html"><img src="C:/Users/Nenad/Desktop/4YHIT/ITP/Students_Diary/Login/Logo.png" width="80" height="40"></img></a> -->
</ul>
		</div>
        <div id="navbar" class="navbar-collapse collapse">
		<!--action wurde gemacht um hinzuverlinken wo der logout passiert-->
          <form class="navbar-form navbar-right" action="logout.php">
		  <div class="form-group">
		
		 <!--Benutzername wird ausgegeben des eingeloggten Benutzers-->
		 <!--Benutzername kann ausgegeben werden weil er nur SIchere zeichen enthaelt-->
		  <?php echo $_smarty_tpl->tpl_vars['user']->value->getBenutzername();?>

		  

		  </div>
            <button type="submit" class="btn btn-success" id="btn_logout" name="btn_logout">Log out</button>
          </form>
	  </div>
    </nav>
	<p>
	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
?>