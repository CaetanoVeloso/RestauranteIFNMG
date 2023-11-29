<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <!-- Inclua os estilos do FontAwesome (substitua pelo caminho correto) 
    <link rel="stylesheet" href="caminho_para_fontawesome/css/all.min.css">-->
</head>
<body>

<?php
define("SITE_ROOT", 'C:\xampp\htdocs\RestauranteIFNMG/');
require_once SITE_ROOT . 'classes/autoloader.class.php';
require_once SITE_ROOT . 'classes/util.class.php';
require_once SITE_ROOT . 'classes/r.class.php';
R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');
// Consulta SQL para obter os dados dos usuários
$usuarios = R::findAll('usuarios');

if ($usuarios) {
    echo "<h2>Lista de Usuários</h2>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Email</th>";
    echo "<th>Telefone</th>";
    echo "<th>Ações</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($usuarios as $usuario) {
        echo "<tr>";
        echo "<td>{$usuario->name}</td>";
        echo "<td>{$usuario->email}</td>";
        echo "<td>{$usuario->telefone}</td>";
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

<!-- Inclua os scripts do FontAwesome (substitua pelo caminho correto) -->
<script src="https://kit.fontawesome.com/4913238940.js" crossorigin="anonymous"></script>
</body>
</html>
