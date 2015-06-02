<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once("thirdparty/Smarty/libs/Smarty.class.php");
require_once("/home/schueler/propel/vendor/autoload.php");
require_once("/home/schueler/propelProjects/weblayout_tmp/generated-conf/config.php");

$smarty = new Smarty();
$smarty->template_dir = 'sites';
$smarty->compile_dir = 'tmp';

$error = "";
$notice = "";


    if(!isset($loggedin)){
        $loggedin = 0;
    }    

$page = (isset($_GET['page']) && $_GET['page'] != "") ? $_GET['page'] : "home";

$nooutput = false;
@include("pages/".$page.".php");

if($nooutput)
    exit();

$smarty->assign("loggedin", $loggedin);
$smarty->assign("page", $page);
$smarty->assign("login", "login.php");
$smarty->assign("pagetpl", $page.".tpl");
$smarty->assign("error", $error);
$smarty->assign("notice", $notice);

$smarty->display('html.tpl');

?>
