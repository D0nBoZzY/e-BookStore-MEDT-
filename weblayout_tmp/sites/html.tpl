<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="en">

<head>
    <title>e-Library</title>
        
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="startpage_layout for e-library" />
    <meta name="author" content="schwarz stephan" />
    <meta name="keywords" content="" />
    <meta name="generator" content="Webocton - Scriptly (www.scriptly.de)" />
    
    <!-- css -->
    <link href="styles/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="styles/00_start.css" rel="stylesheet" type="text/css" />
        
    <!-- jquery.js and bootstrap.js -->
    <script language="javascript" type="text/javascript" src="includes/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="includes/bootstrap.js"></script>
</head>

<body>
    <div class="container" id="page">
    
        <!-- header -->
        <div id="navbar">
	{if $loggedin == 0}{include 'navbar.tpl'}{/if}
	{if $loggedin == 1}{include 'navbar_logged_in_tmp.tpl'}{/if}
	{if $error != ''}{$error}{/if}      
        </div>
         
        <!-- content -->
        {include file=$pagetpl}        
        
        <!-- footer -->
        <div class="col-md-12"><hr /></div>        
        <div class="footer">
            <p id="footer">&copy; e-Library</p>
        </div>
    
    </div>
</body>
</html>                                
