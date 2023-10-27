<?php
require_once 'classes/autoloader.class.php';
require_once 'classes/util.class.php';

if (isset($_GET['txtnome']) && isset($_GET['txtemail']) && isset($_GET['txtsenha'])){
    Util::inserirUsuario($_GET['txtnome'],$_GET['txtemail'],$_GET['txtsenha'],'user');
}else{
    header('Location:index.php?');
}