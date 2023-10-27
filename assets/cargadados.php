<?php
require_once '../classes/autoloader.class.php';
require_once '../classes/r.class.php';
R::setup('mysql:host=127.0.0.1;dbname=sislogin','root','');

$usuario = R::dispense('usuarios');
// Adicionando um adm
$usuario->name = 'AdmRoot';
$usuario->email = 'adm@fla.com';
$usuario->password = md5('12345' . 'ifnmg');
$usuario->user_level = 'admin';
R::store($usuario);

$usuario1 = R::dispense('usuarios');
// Adicionando um funcionario
$usuario1->name = 'staff';
$usuario1->email = 'staff@fla.com';
$usuario1->password = md5('12345' . 'ifnmg');
$usuario1->user_level = 'staff';
R::store($usuario1);

$usuario2 = R::dispense('usuarios');
// Adicionando um usuario
$usuario2->name = 'usr';
$usuario2->email = 'usr@fla.com';
$usuario2->password = md5('12345' . 'ifnmg');
$usuario2->user_level = 'user';
R::store($usuario2);

R::close();