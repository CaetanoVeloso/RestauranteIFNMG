<?php
require_once '../classes/autoloader.class.php';
require_once '../classes/r.class.php';
R::setup('mysql:host=127.0.0.1;dbname=sislogin','root','');

$usuario = R::dispense('usuarios');

$usuario->name = 'Rodinei';
$usuario->email = 'Rodinei@gmail.com';
$usuario->password = md5('12345' . 'ifnmg');
$usuario->admin = false;
R::store($usuario);
R::close();
?>

<?php

// require_once '../classes/autoloader.class.php';

// require_once '../classes/r.class.php';

// R::setup('mysql:host=127.0.0.1;dbname=webusers', 'root', '');

// $u = R::dispense('usuarios');
// $u->nome = 'George';
// $u->email = 'george@gmail.com';
// $u->senha = md5('123' . '___');
// $u->admin = true;

// R::store($u);
?>