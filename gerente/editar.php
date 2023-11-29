<?php
require_once '../classes/autoloader.class.php';
require_once '../classes/util.class.php';

if (isset($_GET['cliente_id']) && isset($_GET['txtnome']) && isset($_GET['txtemail']) && isset($_GET['txtsenha'])){
    Util::editarUsuario($_GET['cliente_id'],$_GET['txtnome'],$_GET['txtemail'],$_GET['txtsenha'],'user');
}else{
    header('Location:index.php?');
}