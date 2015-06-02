<?php /* Smarty version Smarty-3.1.17, created on 2015-05-29 15:47:05
         compiled from "sites/html.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18908566675560a055a765b1-51583070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad54feae093bd2634c5f8388035e47f757e60f56' => 
    array (
      0 => 'sites/html.tpl',
      1 => 1432907094,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18908566675560a055a765b1-51583070',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5560a055a9ce08_08680152',
  'variables' => 
  array (
    'error' => 0,
    'pagetpl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560a055a9ce08_08680152')) {function content_5560a055a9ce08_08680152($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="en">

<head>
    <title>e-Library</title>
        
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="startpage_layout for e-library" />
    <meta name="author" content="schwarz stephan" />
    <meta name="keywords" content="" />
    <meta name="generator" content="Webocton - Scriptly (www.scriptly.de)" />
    
    <!-- css -->
    <link href="styles/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="styles/00_start.css" rel="stylesheet" type="text/css" />
        
    <!-- jquery.js and bootstrap.js -->
    <script language="javascript" type="text/javascript" src="includes/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="includes/bootstrap.js"></script>
</head>

<body>
    <div class="container" id="page">
    
        <!-- header -->
        <div id="navbar">
	<?php echo $_smarty_tpl->getSubTemplate ("navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
        </div>
         
        <!-- content -->
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['pagetpl']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
        
        
        <!-- footer -->
        <div class="col-md-12"><hr /></div>        
        <div class="footer">
            <p id="footer">&copy; e-Library</p>
        </div>
    
    </div>
</body>
</html>                                
<?php }} ?>
