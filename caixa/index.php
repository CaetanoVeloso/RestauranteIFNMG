<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style.css">
    <title>Caixa - WebDev3</title>
    <link rel="icon" type="image/x-icon" href="..\favicon.ico">
</head>

<body>
    <?php
	
	session_start();
	
    if(empty($_SESSION['user_level']) || $_SESSION['user_level'] == 'user'){
        header('location:..\index.php');
        //sessão vazia ou não for adm, volta pro index
    }
	
	?>
    <?php include '../assets/header.inc.php'; ?>
    <main>
        <h1>Caixa</h1>
            <div style="background-color: gray; width:200px; height:200px"></div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt placeat repudiandae officia fuga ducimus ipsum?</p>
        </div>
        <div>
            <div style="background-color: gray; width:200px; height:200px"></div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt placeat repudiandae officia fuga ducimus ipsum?</p>
        </div>
        <div>
            <div style="background-color: gray; width:200px; height:200px"></div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt placeat repudiandae officia fuga ducimus ipsum?</p>
        </div>
    </main>
    <?php include '../assets/footer.inc.php'; ?>
</body>

</html>