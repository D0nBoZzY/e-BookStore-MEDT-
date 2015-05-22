<?php /* Smarty version Smarty-3.1.17, created on 2015-05-18 02:01:02
         compiled from "tpl/html.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20507274515506d9429e8918-28760840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1191222eba2eaee63426c2861c89f36fe9919feb' => 
    array (
      0 => 'tpl/html.tpl',
      1 => 1431907260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20507274515506d9429e8918-28760840',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5506d942a5a471_23934324',
  'variables' => 
  array (
    'error' => 0,
    'notice' => 0,
    'pagetpl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5506d942a5a471_23934324')) {function content_5506d942a5a471_23934324($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>GameViewer</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />

    <link rel="stylesheet" href="styles/01start.css" type="text/css" />
    
</head>

<body>
    <div id="wrapper">
        <div id="header">

        <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
        
        <?php echo $_smarty_tpl->tpl_vars['notice']->value;?>
        

        </div>

        <div id="navi">
            
            <?php echo $_smarty_tpl->getSubTemplate ("navi.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            
			<div class="clear"></div>
        </div>  
        
        <div id="contentcontainer">
            <div id="content">
    
                <div id="content2">
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['pagetpl']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
    
    
                <div class="clear"></div>
    
            </div>
            
            <div id="footer">
    			<div><span>&copy; 2015 GameViewer</span></div>
    			<div>
                    <ul>                                         
                        <li><a href="?page=download">Download</a></li>
                        <li><a href="#">Reddit</a></li>
                        <li><a href="https://www.facebook.com/pages/GameViewer/790478701031526?fref=tsGameViewer">Facebook</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a href="#">Steamgroup</a></li>
                        <li><a href="?page=faq">Contact</a></li>
                        <li><a href="#">Donation</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>&nbsp;</li>
                    </ul>
                </div>
    		</div>
		</div>
    </div>
</body>
</html>
<?php }} ?>
