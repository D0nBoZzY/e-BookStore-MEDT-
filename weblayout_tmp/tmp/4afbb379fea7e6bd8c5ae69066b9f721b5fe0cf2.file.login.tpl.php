<?php /* Smarty version Smarty-3.1.17, created on 2014-12-01 20:37:14
         compiled from "tpl\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3188254791a12893551-66270007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4afbb379fea7e6bd8c5ae69066b9f721b5fe0cf2' => 
    array (
      0 => 'tpl\\login.tpl',
      1 => 1417225300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3188254791a12893551-66270007',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_54791a1289b250_66980341',
  'variables' => 
  array (
    'steamprofile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54791a1289b250_66980341')) {function content_54791a1289b250_66980341($_smarty_tpl) {?><div align="right" style="padding: 4px;">
<?php if ($_smarty_tpl->tpl_vars['steamprofile']->value=='') {?>
    <a href="?page=login"><img src="images/sits_small.png" width="154" height="23" alt="" /></a>
<?php } else { ?>
    Logged in as <?php echo $_smarty_tpl->tpl_vars['steamprofile']->value['personaname'];?>
 <a href="?page=logout">logout</a> 
<?php }?>
</div><?php }} ?>
