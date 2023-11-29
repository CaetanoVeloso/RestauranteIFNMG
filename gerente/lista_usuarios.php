<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style.css">
    <title>Lista Usuarios - WebDev3</title>
    <link rel="icon" type="image/x-icon" href="..\favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php

    session_start();

    if (empty($_SESSION['user_level']) || $_SESSION['user_level'] != 'staff' && $_SESSION['user_level'] != 'admin') {
        header('location:..\index.php');
        //sessão vazia ou não for adm, volta pro index
    }

    ?>
    <?php include '../assets/header.inc.php'; ?>
    <?php
    require_once(__DIR__ . '\..\classes\autoloader.class.php');
    require_once(__DIR__ . '\..\classes\util.class.php');
    require_once(__DIR__ . '\..\classes/r.class.php');
    R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
        // Verifica se o formulário de exclusão foi enviado
        $id = $_POST['id'];
        $usuario = R::load('usuarios', $id);

        if ($usuario->id) {
            R::trash($usuario); // Exclui o usuário do banco de dados
            echo "<p>Usuário excluído com sucesso.</p>";
        } else {
            echo "<p>Usuário não encontrado.</p>";
        }
    }

    // Consulta SQL para obter os dados dos usuários
    $usuarios = R::findAll('usuarios', 'user_level = \'user\'');

    if ($usuarios) {
        echo "<h2>Lista de Usuários</h2>";
        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "<th>Tipo</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($usuarios as $usuario) {
            echo "<tr>";
            echo "<td>{$usuario->name}</td>";
            echo "<td>{$usuario->email}</td>";
            echo "<td>{$usuario->user_level}</td>";
            echo "<td>";
            echo "<a href=\"editar_usuario.php?id={$usuario->id}\" class=\"btn btn-warning\"><i class=\"fas fa-pencil-alt\"></i> Editar</a> ";
            echo "<form method=\"post\" style=\"display:inline;\">";
            echo "<input type=\"hidden\" name=\"id\" value=\"{$usuario->id}\">";
            echo "<button type=\"submit\" name=\"excluir\" class=\"btn btn-danger\" onclick=\"return confirm('Tem certeza que deseja excluir este usuário?')\"><i class=\"fas fa-trash\"></i> Excluir</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Nenhum usuário encontrado.</p>";
    }
    ?>

    <script src="https://kit.fontawesome.com/4913238940.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>