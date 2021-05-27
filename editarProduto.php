<?php
include 'admin.php';
if (isset($_SESSION['user'])) { //SE EXISTIR AUTENTICAÇÃO
    if (isset($_GET["idProduto"])) {
        if (isset($_POST["txtProduto"]) and isset($_POST["ddlCategoria"])) {
            $produto = $_POST["txtProduto"];
            $valor = $_POST["txtValor"];
            $descricao = $_POST["txtDescricao"];
            $categoria = $_POST["ddlCategoria"];

            if (empty($produto)) {
                echo "<div class=info>Preencha as informações corretamente.</div>";
                exit;
            } else {
                $sql = "UPDATE tbProdutos SET nmproduto = '$produto', valor = $valor, descproduto = '$descricao', 
                        idcategoria = $categoria WHERE idProduto = " . $_GET["idProduto"];
                if ($con->query($sql) === TRUE) {
                    echo "<script>alert('Produto atualizado com sucesso.');</script>";
                    echo "<script>window.location = 'listarProduto.php';</script>";
                } else {
                    echo '<script>alert("Erro ao atualizar o registro: ' . $con->error . '");</script>';
                    //echo "<script>alert('Erro ao atualizar produto.');</script>";
                    //echo "<script>window.location = 'editarProduto.php';</script>";
                    echo "<script>window.history.back();</script>";
                }
            }
        }
    }
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

        <script type="text/javascript">
            function validar() {
                var msg = "---------------- Erro ---------------\nPreencha os seguintes campos:\n------------------------------------\n";
                if (document.getElementById("nmProduto").value.length <= 0) {
                    msg += "Preencha o campo título.\n";
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
            // Busca dados e atribui ao formulário
            if (isset($_GET["idProduto"])) {
                if (is_numeric($_GET["idProduto"])) {
                    $sql = "SELECT * FROM tbProdutos WHERE idProduto = " . $_GET["idProduto"];
                    $executa = $con->query($sql);
                    $resultado = $executa->fetch_assoc();
        ?>
                    <div id="tudo">
                        <div id="cadastro">
                            <a href="home.php">Pagina inicial</a><br />
                            <a href="novoProduto.php">Cadastrar Produto</a><br />
                            <a href="novoUsuario.php">Cadastrar Usuário</a><br />
                            <a href="novoCat.php">Cadastrar Categoria</a><br />
                            <a href="listarProduto.php">Listar produtos</a><br />

                            <h2>Atualizar produto</h2>
                            <form name="frm_cadastro" method="POST" action="editarProduto.php?idProduto=<?php echo $_GET["idProduto"]; ?>" onsubmit="return validar();">

                                <label for="txtProduto">Produto: </label>
                                <br />
                                <input class="form-control" type="text" name="txtProduto" id="nmProduto" required autofocus size="80" value="<?php echo $resultado["nmProduto"]; ?>" />
                                <br />
                                <label for="txtValor">Valor: </label>
                                <br />
                                <input class="form-control" type="text" name="txtValor" id="txtValor" required value="<?php echo $resultado["valor"]; ?>" />
                                <br />
                                <label for="Categoria">Categoria: </label>
                                <br />
                                <select class="form-control" style="height: 35px" name="ddlCategoria" id="ddlCategoria">
                                    <option value="0">-- Selecione uma categoria --</option>
                                    <?php
                                    //Listar todas as categorias em ordem alfabética pelo nome
                                    $sql = "SELECT * FROM tbcategoria ORDER BY nmcategoria ASC";
                                    $query = $con->query($sql);
                                    while ($exibir = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $exibir["idCategoria"]; ?>" <?php echo ($resultado["idCategoria"] == $exibir["idCategoria"]) ?
                                                                                                    "selected" : "" ?>>
                                            <?php echo $exibir["nmCategoria"]; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <br />
                                <label for="Descricao">Descrição: </label>
                                <br />

                                <textarea class="form-control" name="txtDescricao" id="descProduto" rows="5" cols="61"><?php echo $resultado["descProduto"]; ?></textarea>
                                <br />
                                <input class="btn btn-primary" type="submit" value="Atualizar">
                                <input class="btn btn-warning" type="reset" value="Limpar">
                            </form>
                            </fieldset>
                        </div>
                    </div>
        <?php
                }
            }
        } else {
            echo '<div class="aviso">Acesso restrito ao administrador.</div>';
        }
        ?>
    </body>

    </html>
<?php
}
?>