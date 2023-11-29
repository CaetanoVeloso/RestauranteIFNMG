<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style.css">
    <title>Editar - WebDev3</title>
    <link rel="icon" type="image/x-icon" href="..\favicon.ico">
</head>

<body>
    <?php

    session_start();

    if (empty($_SESSION['user_level']) || $_SESSION['user_level'] != 'admin') {
        header('location:..\index.php');
        //sessão vazia ou não for adm, volta pro index
    }

    ?>
    <?php include '../assets/header.inc.php'; ?>
    <h2 style="font-weight:bold;">Editar Cliente</h2>

    <?php
    require_once(__DIR__ . '\..\classes\autoloader.class.php');
    require_once(__DIR__ . '\..\classes\util.class.php');
    require_once(__DIR__ . '\..\classes/r.class.php');

    // Configuração do RedBeanPHP (substitua pelos seus próprios dados)
    R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');
    // Verifica se o parâmetro "id" está definido na URL
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $usuario = R::load('usuarios', $id);

        if ($usuario->id) {
            echo "<form action=\"editar.php\" name=\"logon\">";
            echo "<div class=\"form-group\">";
            echo "<label for=\"nome\">Nome</label>";
            echo "<input name=\"txtnome\" type=\"text\" class=\"form-control\" required id=\"nome\" value=\"$usuario->name\">";
            echo "</div>";

            echo "<div class=\"form-group\">";
            echo "<label for=\"email\">E-mail</label>";
            echo "<input name=\"txtemail\" type=\"email\" class=\"form-control\" required id=\"email\" value=\"$usuario->email\">";
            echo "</div>";

            echo "<div class=\"form-group\">";
            echo "<label for=\"senha\">Senha</label>";
            echo "<input name=\"txtsenha\" type=\"password\" class=\"form-control\" id=\"senha\" placeholder=\"Nova senha\">";
            echo "</div>";

            echo "<div class=\"form-group\">";
            echo "<input type=\"radio\" id=\"adm\" name=\"usr_lvl\" value=\"admin\">";
            echo "<label for=\"adm\">Admin</label><br>";
            echo "</div>";

            echo "<div class=\"form-group\">";
            echo "<input type=\"radio\" id=\"staff\" name=\"usr_lvl\" value=\"staff\">";
            echo "<label for=\"staff\">Funcionário</label><br>";
            echo "</div>";

            echo "<div class=\"form-group\">";
            echo "<input type=\"radio\" id=\"usr\" name=\"usr_lvl\" value=\"user\">";
            echo "<label for=\"usr\">Usuário</label>";
            echo "</div>";

            echo "<input type=\"hidden\" name=\"cliente_id\" value=\"$usuario->id\">";

            echo "<button type=\"submit\" class=\"btn btn-lg btn-enter\">";
            echo "<span> Atualizar</span>";
            echo "</button>";

            echo "</form>";
        } else {
            echo "<p>Usuário não encontrado</p>";
        }
    } else {
        echo "<p>Parâmetro 'id' não especificado</p>";
    }
    ?>

</body>

</html>