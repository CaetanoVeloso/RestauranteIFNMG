<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php include 'assets/header.inc.php'; ?>
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