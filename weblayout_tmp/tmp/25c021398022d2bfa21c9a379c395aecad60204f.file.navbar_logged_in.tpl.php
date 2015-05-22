<?php /* Smarty version Smarty-3.1.17, created on 2015-05-22 17:53:02
         compiled from "sites\navbar_logged_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30591555f50dee9c954-28121505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25c021398022d2bfa21c9a379c395aecad60204f' => 
    array (
      0 => 'sites\\navbar_logged_in.tpl',
      1 => 1432308962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30591555f50dee9c954-28121505',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_555f50dee9e5c1_96212181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555f50dee9e5c1_96212181')) {function content_555f50dee9e5c1_96212181($_smarty_tpl) {?><div class="navbar navbar-inverse navbar-fixed-top" id="header">
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
                <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Authors</a></li>
                <li><a href="#">All Books</a></li>
            </ul>

            <form class="navbar-form navbar-right" action="">
                <button type="submit" class="btn btn-success" name="log_btn">Logout</button>
            </form>
            <p class="navbar-text navbar-right" style="font-size: 14px;">Signed in as <a href="#" class="navbar-link">Peter Enis</a></p>
        </div>
        
    </div>
</div><?php }} ?>
