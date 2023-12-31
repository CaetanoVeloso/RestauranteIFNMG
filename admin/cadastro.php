<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style.css">
    <title>Cadastro - WebDev3</title>
    <link rel="icon" type="image/x-icon" href="..\favicon.ico">
</head>

<body>
    <?php
	
	session_start();
	
    if(empty($_SESSION['user_level'])||$_SESSION['user_level'] != 'admin'){
        header('location:..\index.php');
        //sessão vazia ou não for adm, volta pro index
    }
	
	?>
    <?php include '../assets/header.inc.php'; ?>
    <main>
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-4 col-sm-offset-4">

                    <h2 style="font-weight:bold;">Cadastro de novo Cliente</h2>

                    <form action="inserir.php" name="logon">

                        <div class="form-group">

                            <label for="nome">Nome</label>
                            <input name="txtnome" type="text" class="form-control" required id="nome">
                        </div>


                        <div class="form-group">

                            <label for="email">E-mail</label>
                            <input name="txtemail" type="email" class="form-control" required id="email">
                        </div>


                        <div class="form-group">

                            <label for="senha">Senha</label>
                            <input name="txtsenha" type="password" class="form-control" required id="senha">
                        </div>

                        <div class="form-group">

                            <input type="radio" id="adm" name="usr_lvl" value="admin">
                            <label for="adm">Admin</label><br>
                        </div>

                        <div class="form-group">

                            <input type="radio" id="staff" name="usr_lvl" value="staff">
                            <label for="staff">Gerente</label><br>
                        </div>

                        <div class="form-group">

                            <input type="radio" id="caixa" name="usr_lvl" value="caixa">
                            <label for="staff">Caixa</label><br>
                        </div>

                        <div class="form-group">

                            <input type="radio" id="user" name="usr_lvl" value="user">
                            <label for="usr">Usuário</label>
                        </div>


                        <button type="submit" class="btn btn-lg btn-enter">

                            <span> Cadastrar</span>

                        </button>

                    </form>

                </div>
            </div>
        </div>

    </main>

</body>

</html>