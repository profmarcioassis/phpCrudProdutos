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

        <div id="tudo">
            <a href="home.php">Pagina inicial</a><br />
            <a href="novoUsuario.php">Cadastrar Usuário</a><br />
            <a href="novoCat.php">Cadastrar Categoria</a><br />
            <a href="listarProduto.php">Listar produtos</a><br />

            <?php
            if ($_SESSION['tipo'] == 'A') {
            ?>
                <div id="cadastro">
                    <h2>Cadastro de Produtos</h2>
                    <form name="frmcadProduto" method="POST" action="inserirProduto.php" onsubmit="return validar();">
                        <label for="txtProduto">Produto: </label>                        <br />
                        <input class="form-control" type="text" name="txtProduto" id="txtProduto" size="80" required placeholder="Nome do produto" autofocus />
                        <br />
                        <label for="txtValor">Valor: </label>
                        <br />
                        <input class="form-control" type="text" name="txtValor" id="txtValor" required placeholder="Valor do produto" />
                        <br />
                        <label for="categoria">Categoria:</label>
                        <br />
                        <select class="form-control" style="height: 35px" name="ddlCategoria" id="ddlCategoria" />
                        <option value="0">-- Selecione uma categoria --</option>
                        <?php
                        $SQL = "SELECT * FROM tbcategoria ORDER BY nmcategoria ASC";
                        $registros = $con->query($SQL);
                        while ($exibir = $registros->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $exibir["idCategoria"]; ?>">
                                <?php echo utf8_encode($exibir["nmCategoria"]); ?>
                            </option>
                        <?php } ?>
                        </select>
                        <a href="novoCat.php">+</a>
                        <br />
                        <label for="descricao">Descrição: </label>
                        <br />
                        <textarea class="form-control" name="txtDescricao" id="txtDescricao" rows="5" cols="61" placeholder="Digite a descrição do produto"></textarea>
                        <br />
                        <input class="btn btn-primary" type="submit" value="Cadastrar">
                        <input class="btn btn-warning" type="reset" value="Limpar">
                    </form>
                </div>
        </div>
    <?php
            } else { //CASO NÃO ESTEJA AUTENTICADO
                echo '<div class="aviso">Acesso restrito ao administrador.</div>';
            }
    ?>
    </body>

    </html>
<?php
}
?>