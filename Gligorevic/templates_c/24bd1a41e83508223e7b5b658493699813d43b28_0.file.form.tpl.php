<?php /* Smarty version 3.1.25, created on 2015-06-16 17:08:45
         compiled from "C:\WebServ\httpd\eBibliothek\e-BookStore-MEDT-\form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:664755803bfdc46b73_40803180%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24bd1a41e83508223e7b5b658493699813d43b28' => 
    array (
      0 => 'C:\\WebServ\\httpd\\eBibliothek\\e-BookStore-MEDT-\\form.tpl',
      1 => 1434467322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '664755803bfdc46b73_40803180',
  'variables' => 
  array (
    'bname' => 0,
    'Hm' => 0,
    'Fm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.25',
  'unifunc' => 'content_55803bfdc8deb6_40400153',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55803bfdc8deb6_40400153')) {
function content_55803bfdc8deb6_40400153 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '664755803bfdc46b73_40803180';
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
          <form class="navbar-form navbar-right">
			<div class="form-group">
              <input type="text" placeholder="Benutzername" value="test" name="log_bname" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" name="log_pw" class="form-control">
            </div>
			<div class="form-group">
              <a href="">?</a>
            </div>
            <button type="submit" class="btn btn-success" name="log_btn">Sign in</button>
          </form>
	  </div>
    </nav>
	<p>
	
<div class="jumbotron"  id="hintergrund_main">
    <div class="container" id="picture">
      <!-- Example row of columns -->
	   <div class="row">
		<div class="col-md-7" id="picture">
			<img src="Logo.png">
		</div>
		
<div class="container" id="picture">
	   <div class="row">
	   
        <div class="col-md-4">
		<h2>Registrierung</h2>
          <p>
		  
<form action="register.php" method="post">
	<div class="form-group">	  
		<input type="text" class="form-control input-lg" name="reg_bname" value="<?php if (isset($_smarty_tpl->tpl_vars['bname']->value)) {
echo $_smarty_tpl->tpl_vars['bname']->value;
}?>" placeholder="Benutzername">
	</div>
	<div class="form-group">	
		<input type="password" class="form-control input-lg" name="reg_pw" id="reg_pw" placeholder="Passwort">
    </div>
    <div class="form-group">
		<input type="password" class="form-control input-lg" name="reg_pw2" id="reg_pw2" placeholder="Passwort wiederholen">
    </div>
			
			<?php if ($_smarty_tpl->tpl_vars['Hm']->value != '') {
echo $_smarty_tpl->tpl_vars['Hm']->value;
}?>
			<?php if ($_smarty_tpl->tpl_vars['Fm']->value != '') {
echo $_smarty_tpl->tpl_vars['Fm']->value;
}?>
    <button type="submit" class="btn btn-success btn-lg" name="reg_btn">Registrieren</button>
</form>
       </div>
      </div>
	  </div>
      <hr>
		<center>
      <footer>
        <p>&copy; TGM , Wexstrasse 19-23</p>
      </footer>
	  
    </div> <!-- /container -->

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