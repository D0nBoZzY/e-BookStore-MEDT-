<?php /* Smarty version Smarty-3.1.17, created on 2015-05-19 13:11:30
         compiled from "tpl\banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2232754d8b397d780f0-42817990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39ef5ce84c000261c4e4c55c79798307acd60d30' => 
    array (
      0 => 'tpl\\banner.tpl',
      1 => 1431951052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2232754d8b397d780f0-42817990',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_54d8b397dd51b2_97000934',
  'variables' => 
  array (
    'bannerurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d8b397dd51b2_97000934')) {function content_54d8b397dd51b2_97000934($_smarty_tpl) {?><div id="home">
        <center>
            <div class="header">
                design your banner
            </div>
        </center>

        <center>
            <div id="example_banner" class="image_popup">
                <table>
                    <tr>
                        <td>
                            <p class="heading">that's how it could look like</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style='height:100%; width:100%;'>
                                <img src="images/example-banner.jpg" id="banner_example" alt="" />
                            </div>
                        </td>
                    </tr>

                </table>

            </div>
        

            <div id="create_banner">
			<form action="" method="POST">
                <table>
                    <tr>
                        <td class="reg_td">IP</td>
                        <td>
                            <input name = "ip_in" class="inputs_txt" type="text" value =""/>
                        </td>
                        <td rowspan="4">

                        </td>
                    </tr>
                    <tr>
                        <td class="reg_td">PORT</td>
                        <td>
                            <input name = "port" class="inputs_txt" type="text" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td class="reg_td">GAME</td>
                        <td align="center">
                            <select class="inputs_dropdown" name="bg_game">
                                <option value="" selected disabled="disabled"></option>
                                <option value="csgo">Counter Strike: Global Offensive</option>
                                <option value="css">Counter Strike Source</option>
                                <option value="cs1.6">Counter Strike 1.6</option>
                                <option value="bc2">Battlefiel Bad Company 2</option>
                                <option value="bf3">Battlefield 3</option>
                                <option value="bf4">Battlefield 4</option>
                                <option value="rust">Rust</option>
                                <option value="gmod">Garry's Mod</option>
                                <option value="dayZ">DayZ</option>
                                <option value="minecraft">Minecraft</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="reg_td">COLOR</td>
                        <td align="center">
                            <select class="inputs_dropdown" name="hex">
                                <option value="" selected disabled="disabled"></option>
                                <option value="#00ff00">green</option>
                                <option value="#0000ff">blue</option>
                                <option value="#ff0000">red</option>
                                <option value="#ffffff">white</option>
                                <option value="#000000">black</option>
                                <option value="#f3ff00">yellow</option>
                                <option value="#aaaaaa">grey</option>
                                <option value="#00ffd6">cyan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3">
                            <input type="submit" name="create" value="create" class="inputs_register" />
                        </td>
                    </tr>
                </table>
				</form>
            </div>
            
            
            <?php if ($_smarty_tpl->tpl_vars['bannerurl']->value!='') {?>
            
            <input value="<img src='<?php echo $_smarty_tpl->tpl_vars['bannerurl']->value;?>
' />" readonly="readonly" class="inputs_txt" size="20" />
            <img src="<?php echo $_smarty_tpl->tpl_vars['bannerurl']->value;?>
" id="banner_example" alt="" />
             
            
            <?php }?>
            
            
            
            </center>
    </div><?php }} ?>
