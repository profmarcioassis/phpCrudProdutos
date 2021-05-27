<?php
include 'conexao.php';
echo $_GET['idProduto'];
if(is_numeric($_GET["idProduto"])){
    $SQL = "DELETE FROM tbProdutos WHERE idProduto = ".$_GET["idProduto"];
    //echo $SQL;
    if ($con->query($SQL) === TRUE) {
        echo "<script>alert('Produto excluído com sucesso!');</script>";
        echo "<script>window.location = 'listarProduto.php';</script>";
    }
    else{
    	echo "<script>('Erro: '". $con->error."');</script>";
        echo "<script>window.location = 'listarProduto.php';</script>";	
    }
}
?>
