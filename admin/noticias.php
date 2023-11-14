<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style.css">
    <script src="..\ckeditor\ckeditor.js"></script>
    <title>Document</title>
</head>

<body>
    <?php include '../assets/header.inc.php'; ?>
    <main>
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-4 col-sm-offset-4">

                    <h2 style="font-weight:bold;">Cadastro de Notícias</h2>

                    <form action="innoticia.php" name="logon">
                        <fieldset>
                            <legend>Dados:</legend>
                            <label for="nome">Titulo:</label><br />
                            <input type="text" name="nome"><br />
                            <label for="sub">Subtitulo:</label><br />
                            <textarea name="sub" rows=2></textarea><br><br />
                            <textarea name="cont" id="editor"><p>Insira o conteúdo da notícia aqui!</p></textarea><br><br />
                            <button type="submit" class="btn btn-lg btn-enter">
                                <span> Cadastrar</span>
                            </button>
                </div>


                </fieldset>

                </form>
            </div>
        </div>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(err => {
                    console.error(err.stack);
                });
        </script>
</body>

</html>