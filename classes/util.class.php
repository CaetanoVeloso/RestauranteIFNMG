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
    public static function logout()
    {
        if (!isset($_SESSION['usuario'])) {
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
            $_SESSION['user_level'] = $usuario['user_level'];

            if ($usuario['user_level'] == 'admin') {
                header('refresh:2;url=admin/index.php');
                echo '<h1>Você está logado adm. Redirecionando...</h1>';
            } elseif ($usuario['user_level'] == 'staff') {
                header('refresh:2;url=admin/index.php');
                echo '<h1>Você está logado funcionario. Redirecionando...</h1>';
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
    public static function inserirUsuario($name, $email, $password, $usr_lvl)
    {
        require_once(__DIR__ . '\..\classes\autoloader.class.php');
        require_once(__DIR__ . '\..\classes\util.class.php');
        require_once(__DIR__ . '\..\classes/r.class.php');
        R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');
        
        if (R::findOne('usuarios', 'email = ?', [$email]) == null) {
            session_start();
            if (empty($_SESSION['user_level'])||$_SESSION['user_level'] != 'admin') {
                $usuario = R::dispense('usuarios');
                $usuario->name = $name;
                $usuario->email = $email;
                $usuario->password = md5($password . 'ifnmg');
                $usuario->user_level = 'user';
                R::store($usuario);
                $_SESSION['usuario'] = $usuario['name'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['user_level'] = $usuario['user_level'];
                header('refresh:5;url=index.php');
                echo '<h1>Cadastro efetuado. Redirecionando...</h1>';
            } else {
                $usuario = R::dispense('usuarios');
                $usuario->name = $name;
                $usuario->email = $email;
                $usuario->password = md5($password . 'ifnmg');
                $usuario->user_level = $usr_lvl;
                R::store($usuario);
                header('refresh:5;url=cadastro.php');
                echo '<h1>Cadastro efetuado. Redirecionando...</h1>';
            }
        } else {
            header('refresh:5;url=index.php');
            echo '<h1>Email já cadastrado. Tente novamente em 5 segundos.</h1>';
        }
        //agora será feito um select
        //as duas páginas serão criadas na próxima aula
    }
    public static function editarUsuario($id, $name, $email, $password, $usr_lvl)
    {
        require_once(__DIR__ . '\..\classes\autoloader.class.php');
        require_once(__DIR__ . '\..\classes\util.class.php');
        require_once(__DIR__ . '\..\classes/r.class.php');
        R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');
        session_start();
        if (empty($_SESSION['user_level']) || $_SESSION['user_level'] != 'admin') {
            $usuario = R::dispense('usuarios');
            $usuario->id = $id;
            $usuario->name = $name;
            $usuario->email = $email;
            $usuario->password = md5($password . 'ifnmg');
            $usuario->user_level = 'user';
            R::store($usuario);
            header('refresh:5;url=index.php');
            echo '<h1>Cadastro atualizado. Redirecionando...</h1>';
        } else {
            $usuario = R::dispense('usuarios');
            $usuario->id = $id;
            $usuario->name = $name;
            $usuario->email = $email;
            $usuario->password = md5($password . 'ifnmg');
            $usuario->user_level = $usr_lvl;
            R::store($usuario);
            header('refresh:5;url=cadastro.php');
            echo '<h1>Cadastro atualizado. Redirecionando...</h1>';
        }
    }
    public static function inserirNoticia($titulo, $sub, $conteudo){
        require_once(__DIR__ . '\..\classes\autoloader.class.php');
        require_once(__DIR__ . '\..\classes\util.class.php');
        require_once(__DIR__ . '\..\classes/r.class.php');
        R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');
        $noticia = R::dispense('noticias');
        $noticia->titulo = $titulo;
        $noticia->sub = $sub;
        $noticia->conteudo = $conteudo;
        R::store($noticia);
        header('refresh:5;url=noticias.php');
        echo '<h1>Cadastro efetuado. Redirecionando...</h1>';
    }
    public static function buscarNoticia(){
        require_once(__DIR__ . '\..\classes\autoloader.class.php');
        require_once(__DIR__ . '\..\classes\util.class.php');
        require_once(__DIR__ . '\..\classes/r.class.php');
        
    }
    
}
