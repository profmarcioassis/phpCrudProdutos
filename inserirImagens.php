<?php
include 'admin.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <style type="text/css">
            @import url("css/estilos.css");
        </style>
    </head>
    <body style="margin: 10px 10px 10px 10px;">
        <div id="tudo">
            <div id="cadastro">
                <a href="home.php">Pagina inicial</a><br/>
                <a href="novoProduto.php">Cadastrar Produto</a><br/>
                <a href="listarProduto.php">Listar Produtos</a><br/>
                <fieldset>
                    <legend>Inserir imagens</legend>
                    <form name="frm_cadastro" method="POST" action="">
                       
                        <?php
                        if (isset($_GET["idProduto"])) {
                            $idProduto = $_GET["idProduto"];

                            if (is_numeric($idProduto)) {
                                $SQL = "SELECT * FROM tbProdutos WHERE idProduto = " . $_GET["idProduto"];
                                $executa = $con->query($SQL);
                                $resultado = $executa->fetch_assoc();
                                $idProduto = $resultado['idProduto'];
                                $produto = $resultado['nmProduto'];
                                echo 'Produto: <label for="Produto">' . $produto. '</label>';
                            }
                        }
                        ?>
                        <br/> 
                        <br />Escolha uma imagem:<br />
                        <input type="text" name="txtProduto" id="nmProduto" size="50" value="<?php //echo $resultado["nmProduto"];  ?>"/>
                        <input type="button" value="Buscar">
                        <br /> 
                        <input type="submit" value="Carregar">
                        <input type="reset" value="Limpar">
                    </form>
                </fieldset>
            </div>
        </div>
    </body>
</html>


