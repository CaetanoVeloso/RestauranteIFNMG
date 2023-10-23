<header>
    <a href="./index.php" class="home"> Home </a>
    <h2>Desenvolvimento Web</h2>
    <?php
    require_once 'classes/autoloader.class.php';
    require_once 'classes/util.class.php';
    if(Util::isLogado()){
        echo '<a href="logout.php">logout</a>';
    }else{
        //autenticar
        ?>
        <form action="autenticar.php">
        <label for="email">mail:</label>
        <input type="text" name="email" id="email">
        <label for="password">pass:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="login">
        </form>
    <?php
    }
?>
    
</header>