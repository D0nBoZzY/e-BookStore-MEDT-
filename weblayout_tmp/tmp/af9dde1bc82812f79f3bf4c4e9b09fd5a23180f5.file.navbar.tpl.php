<?php /* Smarty version Smarty-3.1.17, created on 2015-05-29 15:47:05
         compiled from "sites/navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19659375635560a055aa0136-56051661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af9dde1bc82812f79f3bf4c4e9b09fd5a23180f5' => 
    array (
      0 => 'sites/navbar.tpl',
      1 => 1432907094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19659375635560a055aa0136-56051661',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5560a055aa2623_80689426',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560a055aa2623_80689426')) {function content_5560a055aa2623_80689426($_smarty_tpl) {?><div class="navbar navbar-inverse navbar-fixed-top" id="header">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?page=home">
                        <img height= "16" width = "16" alt="Brand" src="img/logo_tmp.ico"/>e-Library</a>         
                </div>
                
                
                
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="?page=home">Home</a></li>
			<!-- <li><a href="?page=signup"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</a></li> -->
                	<li><a href="?page=categories">Categories</a></li>
                	<li><a href="?page=authors">Authors</a></li>
                	<li><a href="?page=allbooks">All Books</a></li>
                    </ul>
                
                    <form class="navbar-form navbar-right" action="" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Username" name="uname" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="pw" class="form-control" />
                        </div>    
                        <div class="form-group">
                            <a href="?page=signup" class="navbar-link">?</a>
                            <input type="submit" name="log_btn" class="btn btn-success" value="Sign In">
			            </div>
                    </form>
                </div>
            </div>
        </div>
<?php }} ?>
