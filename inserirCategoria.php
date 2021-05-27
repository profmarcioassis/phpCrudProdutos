<?php
include 'conexao.php';
if (isset($_POST["txtCat"])) {
    $nmCat = $_POST["txtCat"];
       
    if (empty($nmCat)) {
        echo "<div class=info>Preencha as informações corretamente.</div>";
        exit;
    } else {
        $SQL = "INSERT INTO tbCategoria (nmCategoria) VALUES('" . $nmCat . "')";
        //echo $SQL;
        
        if ($con->query($SQL) === TRUE){
            echo "<script>alert('Categoria cadastrada com sucesso.');</script>";
            echo "<script>window.location = 'listarCat.php';</script>";
        } else {
            echo "<script>alert('Erro ao inserir o registro.');</script>";
             //volta a página mantendo o histórico do usuário
            echo "<script>window.history.back();</script>";
        }
    }
}
?>