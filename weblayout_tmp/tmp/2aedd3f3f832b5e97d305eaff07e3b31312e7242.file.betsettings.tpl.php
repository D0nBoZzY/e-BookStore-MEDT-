<?php /* Smarty version Smarty-3.1.17, created on 2014-12-07 21:26:57
         compiled from "tpl\betsettings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109205478b52bd19ce4-27261965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2aedd3f3f832b5e97d305eaff07e3b31312e7242' => 
    array (
      0 => 'tpl\\betsettings.tpl',
      1 => 1417910439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109205478b52bd19ce4-27261965',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5478b52bd19ce6_34112657',
  'variables' => 
  array (
    'steamprofile' => 0,
    'balance' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5478b52bd19ce6_34112657')) {function content_5478b52bd19ce6_34112657($_smarty_tpl) {?><table style="padding-top: 7px;">

    <tr>
        <td width="300" align="center">
            <a href="#" class="myButton" onclick="chancemin()">min</a>
            <a href="#" class="myButton" onclick="sub1()">-1</a>
            <a href="#" class="myButton" onclick="add1()">+1</a>
            <a href="#" class="myButton" onclick="chancemax()">max</a>
        </td>
        <td width="300" align="center">
            <a href="#" class="myButton" onclick="betsizemin()">min</a>
            <a href="#" class="myButton" onclick="div2()">/2</a>
            <a href="#" class="myButton" onclick="mul2()">x2</a>
            <a href="#" class="myButton" onclick="betsizemax()">max</a>
        </td>
        <td width="300" align="center">
            <a href="#" class="myButton" onclick="gotourl('deposit', false)">deposit</a>
            <a href="#" class="myButton">withdrawal</a>
            <a href="#" class="myButton" onclick="gotourl('randomize', false)">randomize</a>
        </td>
    </tr>

    <tr>
        <td width="300" align="center">
            <table>
                <tr>
                    <td align="right">chance to win</td>
                    <td><input type="text" class="textbox" id="inputchance" value="49.5" oninput="recalculate(this)" onblur="recalculate()" /></td>
                </tr>
                <tr>
                    <td align="right">payout</td>
                    <td><input type="text" class="textbox" id="inputpayout" value="2" oninput="recalculate(this)" onblur="recalculate()" /></td>
                </tr>
            </table>
        </td>
        <td width="300" align="center">
            <table>
                <tr>
                    <td align="right">bet size</td>
                    <td><input type="text" class="textbox" id="inputbetsize" value="1" oninput="recalculate(this)" onblur="recalculate()" /></td>
                </tr>
                <tr>
                    <td align="right">profit</td>
                    <td><input type="text" class="textbox" id="inputprofit" value="1" oninput="recalculate(this)" onblur="recalculate()" /></td>
                </tr>
            </table>
        </td>
        <td width="300" align="center">


            balance
            <input type="text" class="textbox2" id="inputbalance" readonly="readonly" value="<?php if ($_smarty_tpl->tpl_vars['steamprofile']->value=='') {?>PLEASE LOGIN<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['balance']->value;?>
<?php }?>" />
            <!-- <img src="images/sits_large_border.png" width="118" height="51" alt="" /> -->


        </td>
    </tr>

</table><?php }} ?>
