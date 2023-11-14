<?php
require_once '../classes/autoloader.class.php';
require_once '../classes/util.class.php';
if (isset($_GET['nome']) && isset($_GET['sub']) && isset($_GET['cont']) ){
    Util::inserirNoticia($_GET['nome'],$_GET['sub'],$_GET['cont']);
}else{
    header('Location:index.php?');
}