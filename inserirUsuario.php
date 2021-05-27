<?php
//inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

//recebe os dados vindos do formulário (ainda não coloquei input_filter)
$nome = $_POST["txtNome"];
$usuario = $_POST["txtUsuario"];
$email = $_POST["txtEmail"];
$senha = $_POST["txtSenha"];
$tipo = $_POST["radioUsuario"];
$obsUsuario = $_POST["txtObs"];

//define o sql de inserção
$SQL = "INSERT INTO tbuser (name, user, email, password, type, obsuser )";
$SQL .= " VALUES('" . utf8_decode($nome) . "', '$usuario','$email', '" . md5($senha) . "', '$tipo', '$obsUsuario')";

//echo $SQL;

// se a consulta foi realizada com sucesso
if ($con->query($SQL) === TRUE) {
    echo "<script>alert('Registro inserido com sucesso.');</script>";
    echo "<script>window.location = 'listarUsuario.php';</script>";
} else {
    echo '<script>alert("Erro ao inserir o registro: ' . $con->error . '");</script>';
    //echo $con->error;
    //volta a página mantendo o histórico do usuário
    echo "<script>window.history.back();</script>";
}
