<?php 
define(ROOT_PATH, dirname(dirname(__DIR__)));
session_start();

if (isset($_SESSION["admin"]))
    include('Admin.php');
else
    include(ROOT_PATH.'/templates/404.html');
?>