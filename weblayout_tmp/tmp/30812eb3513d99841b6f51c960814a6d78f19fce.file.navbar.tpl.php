<?php /* Smarty version Smarty-3.1.17, created on 2015-05-22 18:04:13
         compiled from "sites\navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8192555f4d01afce26-82018987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30812eb3513d99841b6f51c960814a6d78f19fce' => 
    array (
      0 => 'sites\\navbar.tpl',
      1 => 1432310648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8192555f4d01afce26-82018987',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_555f4d01afe7e7_25446620',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555f4d01afe7e7_25446620')) {function content_555f4d01afe7e7_25446620($_smarty_tpl) {?><div class="navbar navbar-inverse navbar-fixed-top" id="header">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?page=home">
                        <img alt="Brand" src="img/logo_tmp.ico"/>
                        e-Library
                    </a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="?page=home">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="?page=categories">Categories</a></li>
                        <li><a href="?page=authors">Authors</a></li>
                        <li><a href="?page=allbooks">All Books</a></li>
                    </ul>
                
                    <form class="navbar-form navbar-right" action="">
                        <div class="form-group">
                            <input type="text" placeholder="Username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control" />
                        </div>    
                        <div class="form-group">
                            <a href="?page=signup" class="navbar-link">?</a>
                            <button type="submit" class="btn btn-success" name="log_btn">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><?php }} ?>
