<header>
    <a href="./index.php" class="home"> Home </a>
    <h2>Desenvolvimento Web</h2>
    <?php
    define("SITE_ROOT", 'C:\xampp\htdocs\RestauranteIFNMG/');
    require_once( __DIR__ . '\..\classes\autoloader.class.php');
    require_once( __DIR__ . '\..\classes\util.class.php');
    //require_once SITE_ROOT . 'classes/autoloader.class.php';
    //require_once SITE_ROOT . 'classes/util.class.php';

    if (Util::isLogado()) {
        //echo '<a href="logout.php">logout</a>';
        if ($_SESSION['user_level'] != 'admin') {
    ?>
            <li><a href="index.php"><span class="fa-solid fa-user"></span> <?php echo $_SESSION['usuario']; ?></a></li>
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
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="login">
        </form>
    <?php
    }
    ?>    
</header>