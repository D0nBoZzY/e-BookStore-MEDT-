<?php /* Smarty version Smarty-3.1.17, created on 2014-12-01 22:00:55
         compiled from "tpl\me.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20152547ce5173383c2-02843549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '457d46c0fa4ab195092d507130f3b3c85d228e6f' => 
    array (
      0 => 'tpl\\me.tpl',
      1 => 1417367480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20152547ce5173383c2-02843549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mybets' => 0,
    'bet' => 0,
    'steamprofile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_547ce517372d59_46697470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547ce517372d59_46697470')) {function content_547ce517372d59_46697470($_smarty_tpl) {?>
<table align="center" class="bettable">

<tr>
    <td width="150" colspan="2">who</td>
    <td width="130">when</td>
    <td width="50">betid</td>
    <td width="70">lucky</td>
    <td width="70">target</td>
    <td width="80">bet</td>
    <td width="80">payout</td>
    <td width="80">profit</td>
</tr>

<?php  $_smarty_tpl->tpl_vars['bet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mybets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bet']->key => $_smarty_tpl->tpl_vars['bet']->value) {
$_smarty_tpl->tpl_vars['bet']->_loop = true;
?>

<tr>
    <td width="20"><img src="<?php echo $_smarty_tpl->tpl_vars['bet']->value['img'];?>
" width="20" height="20" alt="avatar" /></td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['zeit'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['luckynumber'];?>
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
    <td><?php echo 99/$_smarty_tpl->tpl_vars['bet']->value['chance'];?>
x</td>
    <td><?php echo $_smarty_tpl->tpl_vars['bet']->value['profit'];?>
</td>
</tr>

<?php }
if (!$_smarty_tpl->tpl_vars['bet']->_loop) {
?>

<tr>

<td colspan="8">

<?php if ($_smarty_tpl->tpl_vars['steamprofile']->value=='') {?>
Please log in to see your bets.
<?php } else { ?>
You have no bets.
<?php }?>

</td>

</tr>

<?php } ?>
</table><?php }} ?>
