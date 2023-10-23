<?php
require_once 'classes/autoloader.class.php';

if (isset($_GET['email']) && isset($_GET['password'])){
    Util::autenticarUsuario($_GET['email'],$_GET['password']);
}else{
    header('Location:index.php?');
}