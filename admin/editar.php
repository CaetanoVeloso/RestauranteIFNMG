<?php
require_once '../classes/autoloader.class.php';
require_once '../classes/util.class.php';

if (isset($_GET['cliente_id']) && isset($_GET['txtnome']) && isset($_GET['txtemail']) && isset($_GET['txtsenha']) && isset($_GET['usr_lvl'])){
    Util::editarUsuario($_GET['cliente_id'],$_GET['txtnome'],$_GET['txtemail'],$_GET['txtsenha'],$_GET['usr_lvl']);
}else{
    header('Location:index.php?');
}