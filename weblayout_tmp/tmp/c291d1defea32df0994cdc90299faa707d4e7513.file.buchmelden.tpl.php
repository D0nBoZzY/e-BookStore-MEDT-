<?php /* Smarty version Smarty-3.1.17, created on 2015-05-28 10:06:09
         compiled from "sites/buchmelden.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138743520055660c955fd257-81316163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c291d1defea32df0994cdc90299faa707d4e7513' => 
    array (
      0 => 'sites/buchmelden.tpl',
      1 => 1432800366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138743520055660c955fd257-81316163',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_55660c95601f85_29303091',
  'variables' => 
  array (
    'err' => 0,
    'endingmessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55660c95601f85_29303091')) {function content_55660c95601f85_29303091($_smarty_tpl) {?>    <!-- page heading -->
    <div class="col-md-12" id="heading">
        <h1>Report a Problem</h1>
    </div>
    
    <!-- seperate -->
    <div class="col-md-12"><hr /></div>
    
    <!-- content -->
    <div class="col-md-12">
		<form action="" method="post">
			<table>
				    <tr><td>
					<h4><p class="q">Which of the following applies best to the problem that you are reporting?</p></h4>
				    </td></tr>


					<tr><td>
					<input type="checkbox" name="opt1" value="send" />
					Report illegal or inappropriate content
					</td></tr>

					<tr><td>
					<input type="checkbox" name="opt2" value="send" />
					Book Description does not correspond to the book content
					</td></tr>

					<tr><td>
					<input type="checkbox" name="opt3" value="send" />
					The content is displayed incorrectly
					</td></tr>

					<tr><td>
					<input type="checkbox" name="opt4" value="send" />
					Unfitting picture to the book
					</td></tr>

					<tr><td align="left"><br />
					<input type="checkbox" name="opt5" id="click" value="send" onclick="showDiv1();" />
					Write your own message
					</td></tr>

					<tr><td>
					<textarea name="message" rows="5" cols="86" id="welcomeDiv1" onclick="this.value=''"></textarea>
					</td></tr>

					<tr><td align="center"><br />
					<?php if ($_smarty_tpl->tpl_vars['err']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
<?php }?></td>
					</tr>

					<tr><td align="center"><br />
					<input type="submit" name="send" value="send" class="inputs_send" />
					<br /><br /> <?php if ($_smarty_tpl->tpl_vars['endingmessage']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['endingmessage']->value;?>
<?php }?>
				</form>
				</td></tr>
			</table>
        </div>   <?php }} ?>
