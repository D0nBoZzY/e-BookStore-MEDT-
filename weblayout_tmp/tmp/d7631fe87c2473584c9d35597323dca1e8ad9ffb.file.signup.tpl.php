<?php /* Smarty version Smarty-3.1.17, created on 2015-05-28 10:54:06
         compiled from "sites/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15556555705560a218826d85-42572191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7631fe87c2473584c9d35597323dca1e8ad9ffb' => 
    array (
      0 => 'sites/signup.tpl',
      1 => 1432802981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15556555705560a218826d85-42572191',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5560a218849f87_53835328',
  'variables' => 
  array (
    'error' => 0,
    'notice' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560a218849f87_53835328')) {function content_5560a218849f87_53835328($_smarty_tpl) {?>    <!-- page heading -->
    <div class="col-md-5" id="heading">
	<h1>Sign Up</h1>
    </div>

    <div class="col-md-2"></div>

    <!-- second page heading -->
    <div class="col-md-5">
	<h1>Reset Password</h1>
    </div>


    <!-- seperate -->
    <div class="col-md-12"><hr /></div>


    <!-- content -->
    <div class="col-md-5">
        <form action="" method="post">
            <div class="form-group">
            	<input type="text" class="form-control input-lg" name="uname" placeholder="Username" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control input-lg" name="pw1" placeholder="Password"/>
            </div>
            <div class="form-group">
            	<input type="password" class="form-control input-lg" name="pw2" placeholder="Retype Password"/>
            </div>
            <button type="submit" class="btn btn-success btn-lg" name="reg_btn" id="reg_btn">Sign Up</button>
	    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

	    <?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

        </form>
    </div>
    
    <div class="col-md-2"></div>
    
    <div class="col-md-5">
	<form action="" method="post">
	    <div class="form-group">
		<input type="text" class="form-control input-lg" name="uname" placeholder="Username" />
	    </div>
	    <div class="form-group">
		<p class="form-control input-lg" disabled>or</p>
	    </div>
	    <div class="form-group">
		<input type="text" class="form-control input-lg" name="email" placeholder="email" />
	    </div>
	    <button type="submit" class="btn btn-success btn-lg" name="reset_btn" id="reset_btn">Reset</button>
	    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>

	    <?php echo $_smarty_tpl->tpl_vars['notice']->value;?>

	    <div class="clear"><br /></div>
	</form>
    </div>
<?php }} ?>
