<?php /* Smarty version Smarty-3.1.17, created on 2015-05-29 15:32:16
         compiled from "sites/navbar_logged_in_tmp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16446920185566b054e092c3-65218663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd6a84d0e16fe5552b4bf99a4085834019530bb5' => 
    array (
      0 => 'sites/navbar_logged_in_tmp.tpl',
      1 => 1432906335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16446920185566b054e092c3-65218663',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5566b054e107c6_74524118',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5566b054e107c6_74524118')) {function content_5566b054e107c6_74524118($_smarty_tpl) {?><div class="navbar navbar-inverse navbar-fixed-top" id="header">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
               <img height= "16" width = "16" alt="Brand" src="img/logo_tmp.ico"/>e-Library</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=categories">Categories</a></li>
                <li><a href="?page=authors">Authors</a></li>
                <li><a href="?page=allbooks">All Books</a></li>
            </ul>

            <form class="navbar-form navbar-right" action="">
                <button type="submit" class="btn btn-success" name="log_btn">Logout</button>
            </form>
            <p class="navbar-text navbar-right" style="font-size: 14px;">Signed in as <a href="#" class="navbar-link">Peter Enis</a></p>
        </div>
        
    </div>
</div><?php }} ?>
