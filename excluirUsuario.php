<?php
include 'conexao.php';

echo $_GET['idUsuario'];
if(is_numeric($_GET["idUsuario"])){
    $SQL = "DELETE FROM tbuser WHERE iduser = ".$_GET["idUsuario"];
    //echo $SQL;
    if ($con->query($SQL) === TRUE) {
        echo "<script>alert('Registro excluído com sucesso!');</script>";
        echo "<script>window.location = 'listarUsuario.php';</script>";
    }
    else{
    	echo "<script>('Erro: '". $con->error."');</script>";
        echo "<script>window.location = 'listarUsuario.php';</script>";	
    }
}
?>
