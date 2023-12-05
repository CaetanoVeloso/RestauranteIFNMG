<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projeto 3Tri - WebDev3</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- jQuery livraria -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- JavaScript compilado-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href="/css/bootstrap.min.css">
    <link rel='stylesheet' href="/css/style.css">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include 'assets/header.inc.php'; ?>
    <main>
        <h1>Simulação</h1>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    require_once(__DIR__ . '\classes\autoloader.class.php');
                    require_once(__DIR__ . '\classes\util.class.php');
                    require_once(__DIR__ . '\classes/r.class.php');
                    $count = 1;
                    R::setup('mysql:host=127.0.0.1;dbname=sislogin', 'root', '');
                    while ($count <= 3) {
                        $noticia = R::findOne('noticias', 'id = ?', [$count]);
                        echo '
            <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">' . $noticia['titulo'] . '</h5>
                    <p class="card-text">' . $noticia['sub'] . '</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a href="details.php?id=' . $count . '" class="btn btn-primary">Ver noticia</a>
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        </div>
                        <small class="text-body-secondary">9 mins</small>
                    </div>
                </div>
            </div>
            </div>';
                        $count = $count + 1;
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include 'assets/footer.inc.php'; ?>
</body>

</html>