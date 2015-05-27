<?php /* Smarty version Smarty-3.1.17, created on 2015-05-22 17:45:50
         compiled from "sites\sign_up.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29108555f4f2ecbf278-56496683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd55656b51e061d463e4f37892095e5bbc1089ac9' => 
    array (
      0 => 'sites\\sign_up.tpl',
      1 => 1432309514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29108555f4f2ecbf278-56496683',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_555f4f2ecc0ec1_04782505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555f4f2ecc0ec1_04782505')) {function content_555f4f2ecc0ec1_04782505($_smarty_tpl) {?>    <!-- page heading -->
    <div class="col-md-8" id="heading">
    <h1>Sign Up</h1>
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
            <div class="form-group">
            	<input type="password" class="form-control input-lg" placeholder="Password"/>
            </div>
            <div class="form-group">
            	<input type="password" class="form-control input-lg" placeholder="Retype Password"/>
            </div>
            <button type="submit" class="btn btn-success btn-lg" id="btn_reg">Sign Up</button>
        </form>
    </div><?php }} ?>
