<?php
include 'conexao.php';

if (isset($_POST["txtProduto"])) {
    $nmProduto = $_POST["txtProduto"];
    $valor = $_POST["txtValor"];
    $descProduto = $_POST["txtDescricao"];
    $categoria = $_POST["ddlCategoria"];
       
    if (empty($nmProduto) && empty($categoria)) {
        echo "<div class=info>Preencha as informações corretamente.</div>";
        exit;
    } else {
        $SQL = "INSERT INTO tbProdutos (nmproduto, valor, descproduto, idcategoria, idUser)";
        $SQL .= " VALUES('" . $nmProduto . "'," . $valor . ", '" . $descProduto . "',".$categoria.", ".$_SESSION['idUser'].")";

        //echo $SQL;
        
        // se a consulta foi realizada com sucesso
        if ($con->query($SQL) === TRUE){
            echo "<script>alert('Produto cadastrado com sucesso.');</script>";
            echo "<script>window.location = 'listarProduto.php';</script>";
        } else {
            echo '<script>alert("Erro ao inserir o registro: ' . $con->error . '");</script>';
            //volta a página mantendo o histórico do usuário
            echo "<script>window.history.back();</script>";
        }
    }
}
?>