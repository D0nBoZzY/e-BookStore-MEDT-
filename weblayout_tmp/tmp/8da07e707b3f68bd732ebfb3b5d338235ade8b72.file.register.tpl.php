<?php /* Smarty version Smarty-3.1.17, created on 2015-05-19 13:08:26
         compiled from "tpl\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21215555b17d5d8f183-06650149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8da07e707b3f68bd732ebfb3b5d338235ade8b72' => 
    array (
      0 => 'tpl\\register.tpl',
      1 => 1432033704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21215555b17d5d8f183-06650149',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_555b17d5d941c2_31626563',
  'variables' => 
  array (
    'error' => 0,
    'notice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555b17d5d941c2_31626563')) {function content_555b17d5d941c2_31626563($_smarty_tpl) {?>
    <div id="home">
        <center>
            <div class="header">
                register your server
            </div>
        </center>
        
        <center>
            <div id="registration">
                <p>just fill out those </p>
                <form action="" method="post">
                <table>               
                    <tr>
                        <td class="reg_td">IP</td>
                        <td>
                            <input name="ip" class="inputs_txt" type="text" value=""/>
                        </td>                                                                    
                    </tr>
                    <tr>
                        <td class="reg_td">PORT</td>
                        <td align="center">
                            <input name="port" class="inputs_txt" type="text" value=""/>
                        </td>
                    </tr>
					<tr>
					<td align="center" colspan="2">
					<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

					<?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

					</td>
					</tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="register" value="register" class="inputs_register" /></td>
                    </tr>
                </table>   
                </form>             
            </div>
        </center>
    </div>
<?php }} ?>
