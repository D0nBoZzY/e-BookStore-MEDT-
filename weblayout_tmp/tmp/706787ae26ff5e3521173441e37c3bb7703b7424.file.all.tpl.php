<?php /* Smarty version Smarty-3.1.17, created on 2015-01-19 13:47:49
         compiled from "tpl\all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57135478b2a9527a05-10469843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '706787ae26ff5e3521173441e37c3bb7703b7424' => 
    array (
      0 => 'tpl\\all.tpl',
      1 => 1417820505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57135478b2a9527a05-10469843',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5478b2a9527a01_95924388',
  'variables' => 
  array (
    'bets' => 0,
    'bet' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5478b2a9527a01_95924388')) {function content_5478b2a9527a01_95924388($_smarty_tpl) {?>
<table align="center" class="bettable">

<tr>
    <td width="20">&nbsp;</td>
    <td width="130">who</td>
    <td width="130">when</td>
    <td width="50">betid</td>
    <td width="70">lucky</td>
    <td width="70">target</td>
    <td width="80">bet</td>
    <td width="80">payout</td>
    <td width="80">profit</td>
</tr>

<?php  $_smarty_tpl->tpl_vars['bet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bet']->key => $_smarty_tpl->tpl_vars['bet']->value) {
$_smarty_tpl->tpl_vars['bet']->_loop = true;
?>

<tr>
    <td width="20"><a target="_blank" href="http://steamcommunity.com/profiles/<?php echo $_smarty_tpl->tpl_vars['bet']->value['steam64'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['bet']->value['img'];?>
" width="20" height="20" alt="avatar" /></a></td>
    <td><a target="_blank" href="http://steamcommunity.com/profiles/<?php echo $_smarty_tpl->tpl_vars['bet']->value['steam64'];?>
"><?php echo $_smarty_tpl->tpl_vars['bet']->value['name'];?>
</a></td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['zeit'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['id'];?>
</td>
    <td style="font-size: larger;"><?php echo $_smarty_tpl->tpl_vars['bet']->value['luckynumber'];?>
</td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['bet']->value['targetlo']) {?>
            &lt; <?php echo $_smarty_tpl->tpl_vars['bet']->value['chance'];?>

        <?php } else { ?>
            &gt; <?php echo 100-$_smarty_tpl->tpl_vars['bet']->value['chance']-0.0001;?>

        <?php }?>
    </td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['quantity'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['payout'];?>
x</td>
    <td style="font-weight: bold; font-size:large; color: <?php if ($_smarty_tpl->tpl_vars['bet']->value['win']==1) {?>#008800<?php } else { ?>#BD1D1D<?php }?>;"><?php if ($_smarty_tpl->tpl_vars['bet']->value['win']==1) {?>+<?php } elseif ($_smarty_tpl->tpl_vars['bet']->value['profit']==0) {?>-<?php }?><?php echo $_smarty_tpl->tpl_vars['bet']->value['profit'];?>
</td>
</tr>

<?php } ?>


</table><?php }} ?>
