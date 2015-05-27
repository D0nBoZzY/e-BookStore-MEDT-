<?php /* Smarty version Smarty-3.1.17, created on 2015-05-27 10:46:02
         compiled from "sites/allbooks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20979054345560d3c1e57071-42152344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36db12d37af8d0476b3e874dce163e7de86ea8e9' => 
    array (
      0 => 'sites/allbooks.tpl',
      1 => 1432716338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20979054345560d3c1e57071-42152344',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5560d3c1e61b17_85658366',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5560d3c1e61b17_85658366')) {function content_5560d3c1e61b17_85658366($_smarty_tpl) {?>    <!-- page heading -->
    <div class="col-md-8" id="heading">    
        <h1>Your Books</h1>
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
    
    <!-- navigation -->
    <div class="col-md-12" id="nav-books">
        <nav>
            <ul class="pager">
                <li class="previous"><a href="?page=allbooks&site=prev"><span aria-hidden="true">&larr;</span> Previous</a></li>
                <li class="active"><a href="?page=allbooks&site=1">1 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="?page=allbooks&site=2">2 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="?page=allbooks&site=3">3 <span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="?page=allbooks&site=4">4 <span class="sr-only">(current)</span></a></li>
                <li class="active">... <span class="sr-only">(current)</span></li>
                <li class="active"><a href="?page=allbooks&site=last">57 <span class="sr-only">(current)</span></a></li>
                <li class="next"><a href="?page=allbooks&site=next">Next <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>
    
    <!-- content -->    
    <div class="row">
        <div class="col-md-4">
            <h3>Book1</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Book2</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Book3</h3>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        	
        <div class="col-md-4">
            <h3>Book4</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Book5</h3>                                                      
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Book6</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
            
        <div class="col-md-4">
            <h3>Book7</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Book8</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#" >View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h3>Book9</h3>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-primary" href="#" >View details &raquo;</a></p>
        </div>
    </div>                         
<?php }} ?>
