<?php /* Smarty version Smarty-3.1.17, created on 2015-05-22 17:45:16
         compiled from "sites\reset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19706555f4ee4336083-07200722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bab9bbfe75a604d36beec5393646fa0c99e71d47' => 
    array (
      0 => 'sites\\reset.tpl',
      1 => 1432309506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19706555f4ee4336083-07200722',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_555f4ee43378d0_17169122',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555f4ee43378d0_17169122')) {function content_555f4ee43378d0_17169122($_smarty_tpl) {?>    <!-- page heading -->
    <div class="col-md-8" id="heading">
    <h1>Reset Password</h1>
    </div>
    <!-- search bar -->
    <div class="col-md-4">
        <div class="input-group" id="search">
            <input type="text" class="form-control" value="Search for..." onclick="this.select()" />
            <div class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </div>
        </div>
    </div>

    
    <!-- seperate -->
    <div class="col-md-12"><hr /></div>


    <!-- content -->
    <div class="col-md-12">
        <form>
            <div class="form-group">
            	<input type="text" class="form-control input-lg" placeholder="Username" />
            </div>
            <div class="form-group">
            	<input type="text" class="form-control input-lg" placeholder="e-mail" />
            </div>
            <button type="submit" class="btn btn-success btn-lg" id="btn_reg">Send Reset e-mail</button>
        </form>
    </div><?php }} ?>
