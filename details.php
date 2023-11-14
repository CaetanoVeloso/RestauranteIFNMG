<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if (isset($_GET['id'])){
        define("SITE_ROOT", 'C:\xampp\htdocs\RestauranteIFNMG/');
        require_once SITE_ROOT . 'classes/autoloader.class.php';
        require_once SITE_ROOT . 'classes/util.class.php';
        R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');
        $noticia = R::findOne('noticias', 'id = ?', [$_GET['id']]);
        echo '<h1>'. $noticia['titulo'] .'</h1>';
        echo '<sub>'. $noticia['sub'] . '</sub>';
        echo $noticia['conteudo'];
    }else{
        header('index.php');
    }


    ?>
    
</body>
</html>