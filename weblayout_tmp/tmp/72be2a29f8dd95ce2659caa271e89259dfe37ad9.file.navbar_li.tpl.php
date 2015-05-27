<?php /* Smarty version Smarty-3.1.17, created on 2015-05-23 21:59:39
         compiled from "sites/navbar_li.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3669167245560da10629b99-93629003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72be2a29f8dd95ce2659caa271e89259dfe37ad9' => 
    array (
      0 => 'sites/navbar_li.tpl',
      1 => 1432411176,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3669167245560da10629b99-93629003',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5560da10633070_27369987',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560da10633070_27369987')) {function content_5560da10633070_27369987($_smarty_tpl) {?><div class="navbar navbar-inverse navbar-fixed-top" id="header">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="img/logo_tmp.ico"/>
                e-Library
            </a>
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
</div>
<?php }} ?>
