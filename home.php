<?php
include 'admin.php';
if (isset($_SESSION['user'])) { //SE EXISTIR AUTENTICAÇÃO
?>
    <!DOCTYPE html>
    <html>

    <head>

        <title>Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    </head>

    <body style="margin: 10px 10px 10px 10px;">
        <div id="tudo">
            <div id="cadastro">
                <h2>Sistema de gerenciamento de produtos</h2>
                <?php
                if ($_SESSION['tipo'] == 'A') {
                ?>
                    <a href="novoProduto.php">Cadastrar Produto</a><br />
                    <a href="novoUsuario.php">Cadastrar Usuário</a><br />
                    <a href="novoCat.php">Cadastrar Categoria</a><br />
                    <a href="listarUsuario.php">Listar Usuários</a><br />
                <?php
                }
                ?>
                <a href="listarProduto.php">Listar Produtos</a><br />
                <a href="listarCat.php">Listar Categorias</a><br /><br />
            </div>
        </div>
    </body>

    </html>
<?php
}
?>