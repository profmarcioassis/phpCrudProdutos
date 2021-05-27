<?php
include 'admin.php';
if (isset($_SESSION['user'])) { //SE EXISTIR AUTENTICAÇÃO
?>
    <!DOCTYPE html>
    <html>
        <head>
            <title></title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
            <script type="text/javascript" src="ajax.js"></script>
            <script type="text/javascript">
                function validar() {
                    var msg = "---------------- Erro ---------------\nPreencha os seguintes campos:\n------------------------------------\n";
                    if (document.getElementById("txtProduto").value.length <= 0) {
                        msg += "Preencha o campo Produto.\n";
                    }
                    if (document.getElementById("ddlCategoria").value == 0) {
                        msg += "Escolha uma categoria.\n";
                    }
                    if (msg != "---------------- Erro ---------------\nPreencha os seguintes campos:\n------------------------------------\n") {
                        alert(msg);
                        return false;
                    }
                }
            </script>
        </head>
        <body style="margin: 10px 10px 10px 10px;">
            <?php
            if ($_SESSION['tipo'] == 'A') {
            ?>
            <div id="tudo">
                <div id="cadastro">
                    <a href="home.php">Pagina inicial</a><br/>
                    <a href="listarCat.php">Listar categorias</a><br/>
                        <h2>Cadastro de categorias de produtos</h2>
                        <form name="frmcadCat" method="POST" action="inserirCategoria.php" onsubmit="return validar();">

                            <label for="produto">Categoria: </label>
                            <br/>
                            <input class="form-control" type="text" name="txtCat" id="txtCat" size="80" required="required" placeholder="Nome da Categoria" />
                            <br/> 
                            <br/>
                            <input class="btn btn-primary" type="submit" value="Cadastrar">
                            <input class="btn btn-warning" type="reset" value="Limpar">
                        </form>
                </div>
            </div>
            <?php
            }
            else { //CASO NÃO ESTEJA AUTENTICADO
            echo '<div class="aviso">Acesso restrito ao administrador.</div>';
        }
            ?>
        </body>
    </html>
    <?php
}
?>