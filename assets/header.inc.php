<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="img\montes_claros_horizontal_jpg.jpg" alt="Logo" width="180" height="60" class="d-inline-block align-text-top">
            RestauranteIFNMG
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php
                require_once(__DIR__ . '\..\classes\autoloader.class.php');
                require_once(__DIR__ . '\..\classes\util.class.php');

                if (Util::isLogado()) {
                    //echo '<a href="logout.php">logout</a>';
                    if ($_SESSION['user_level'] != 'admin') {
                ?>
                <li><a href="index.php"><span class="fa-solid fa-user"></span> <?php echo $_SESSION['usuario']; ?></a>
                </li>
                <li><a href="logout.php"><span class="fa-log-out"></span> Sair </a></li>

                <?php } else { ?>
                <li><a href="index.php"><span class="fa-user"></span> <?php echo $_SESSION['usuario']; ?></a></li>
                <li><a href="admin\index.php"><button class="" style="color:#171614; ">ADM</button></a></li>
                <li><a href="logout.php"><span class="fa-log-out"></span> Sair </a></li>
                <?php }
                } else {
                    //autenticar
                    ?>
                <form action="autenticar.php">
                <div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Email:</span>
  <input type="text" name="email" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Senha:</span>
  <input type="password" name="password" id="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" value="login">
                </form>
                <?php
                }
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>