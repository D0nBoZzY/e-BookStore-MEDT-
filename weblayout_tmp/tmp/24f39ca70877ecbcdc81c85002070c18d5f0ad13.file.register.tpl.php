<?php /* Smarty version Smarty-3.1.17, created on 2015-05-18 02:13:11
         compiled from "tpl/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:367831168555099dab07d01-35686358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24f39ca70877ecbcdc81c85002070c18d5f0ad13' => 
    array (
      0 => 'tpl/register.tpl',
      1 => 1431907260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '367831168555099dab07d01-35686358',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_555099dab432e7_00053258',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555099dab432e7_00053258')) {function content_555099dab432e7_00053258($_smarty_tpl) {?>
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
                        <td align="center" colspan="2"><input type="submit" name="register" value="register" class="inputs_register" /></td>
                    </tr>
                </table>   
                </form>             
            </div>
        </center>
    </div>
<?php }} ?>
