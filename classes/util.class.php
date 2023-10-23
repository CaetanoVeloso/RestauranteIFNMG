<?php

class Util
{


    public static function isLogado()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return isset($_SESSION['usuario']);
    }

    public static function validarAcesso()
    {

        session_start();
        if (isset($_SESSION['usuario'])) {
            $nome = $_SESSION['usuario'];
        } else {
            header('refresh:5;url=index?acessonaoautorizado.php');
            echo '<h1>Você não está logado. Tente novamente em 5 segundos.</h1>';
            die();
        }
    }
    public static function logout() {
        if (!isset($_SESSION['usuario'])){
            session_start();
            session_destroy();
            header('refresh:5;url=index.php');
            die();
        }
    }
    public static function autenticarUsuario($email, $password)
    {
        require_once 'classes\autoloader.class.php';

        R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');

        $usuario = R::findOne('usuarios', 'email = ? and password = ?', [$email, md5($password . 'ifnmg')]);
        if (isset($usuario)) {
            session_start();
            $_SESSION['usuario'] = $usuario['name'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['admin'] = $usuario['admin'];

            if ($usuario['admin']) {
                header('refresh:2;url=admin/index.php');
                echo '<h1>Você está logado adm. Redirecionando...</h1>';
            } else {
                header('refresh:2;url=user/index.php');
                echo '<h1>Você está logado usr. Redirecionando...</h1>';
            }
        } else {
            header('refresh:5;url=index.php');
            echo '<h1>Dados incorretos. Tente novamente em 5 segundos.</h1>';
        }

        R::close();
    }
}