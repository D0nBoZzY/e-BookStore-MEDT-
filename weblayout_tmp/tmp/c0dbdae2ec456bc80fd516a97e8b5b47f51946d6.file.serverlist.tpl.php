<?php /* Smarty version Smarty-3.1.17, created on 2015-05-18 02:01:02
         compiled from "tpl/serverlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1341758715506d96c761680-29193052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0dbdae2ec456bc80fd516a97e8b5b47f51946d6' => 
    array (
      0 => 'tpl/serverlist.tpl',
      1 => 1431907260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1341758715506d96c761680-29193052',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5506d96c792fc3_60246104',
  'variables' => 
  array (
    'servername' => 0,
    'map' => 0,
    'ip' => 0,
    'serverlist' => 0,
    'server' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5506d96c792fc3_60246104')) {function content_5506d96c792fc3_60246104($_smarty_tpl) {?>
    <div id="home">
        <center>
            <div class="header">
                choose your server
                <br />
                <form method="post" action="">
                <select>
                    <option>ALL</option>
                    <option>COUNTER STRIKE SOURCE</option>
                    <option>GARRYSMOD</option>
                </select>
                </form>
            </div>
        </center>
        <div class="serverlist" id="serverlist">
            <table class="slist">
                <tr>
                    <!-- <td>Ping</td> -->
    
                    <td class="sname">Servername</td>
    
                    <td>Map</td>
    
                    <td>Players</td>
    
                    <td>IP : PORT</td>
    
                    <td>JOIN</td>
                </tr>
                
                <form method="post" action="">
                <tr>
                    <!-- <td>32</td> -->

                    <td><input name="servername" value="<?php echo $_smarty_tpl->tpl_vars['servername']->value;?>
"/></td>

                    <td><input name="map" value="<?php echo $_smarty_tpl->tpl_vars['map']->value;?>
"/></td>

                    <td></td>

                    <td><input name="ip" value="<?php echo $_smarty_tpl->tpl_vars['ip']->value;?>
"/></td>

                    <td><input type="submit" class="joinbutton" name="search" value="SEARCH" /></td>

                </tr>
                </form>
                
                <?php  $_smarty_tpl->tpl_vars['server'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['server']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['serverlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['server']->key => $_smarty_tpl->tpl_vars['server']->value) {
$_smarty_tpl->tpl_vars['server']->_loop = true;
?>
    
                <tr>
                    <!-- <td>32</td> -->

                    <td class="sname"><?php echo $_smarty_tpl->tpl_vars['server']->value['hostname'];?>
</td>

                    <td><?php echo $_smarty_tpl->tpl_vars['server']->value['karte'];?>
</td>

                    <td><?php if ($_smarty_tpl->tpl_vars['server']->value['spieler']=='') {?>0<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['server']->value['spieler'];?>
<?php }?>/<?php echo $_smarty_tpl->tpl_vars['server']->value['slots'];?>
</td>

                    <td><?php echo $_smarty_tpl->tpl_vars['server']->value['ip'];?>
:<?php echo $_smarty_tpl->tpl_vars['server']->value['port'];?>
</td>

                    <td><button class="joinbutton" onclick="javascript:self.location.href='steam://connect/<?php echo $_smarty_tpl->tpl_vars['server']->value['ip'];?>
:<?php echo $_smarty_tpl->tpl_vars['server']->value['port'];?>
'">JOIN</button></td>
 
                </tr>
                
                <?php }
if (!$_smarty_tpl->tpl_vars['server']->_loop) {
?>
                Nix da
                <?php } ?>

            </table>
            <div class="slist_nav" align="center">
                <table class="slist_nav">
                    <tr>
                        
                        <td><a href="#">PREV</a></td>
                        <td><a href="#">1</a></td>
                        <td><a href="#">2</a></td>      
                        <td><a href="#">3</a></td>
                        <td><a href="#">4</a></td>
                        <td><a href="#">5</a></td>
                        <td>...</td>
                        <td><a href="#">300</a></td>
                        <td><a href="#">NEXT</a></td>
                        
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php }} ?>
