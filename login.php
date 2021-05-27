<?php
include_once('conexao.php');
//recebendo os dados vindos via post do index.php
$usuario = $_POST['txtUser'];
$senha = $_POST['txtPassword'];
//realiza a consulta no BD, autenticando o usuário e senha
$consulta = "select * 
             from tbuser 
             where user='$usuario' 
             and password='$senha'";
//executando a consulta
$resultado = $con->query($consulta);
//verifica se retornou algum registro com a consulta
if ($resultado->num_rows > 0) {
    //COLOCA NA VARIAVEL LINHA OS DADOS DA CONSULTA
    $resultlogin = $resultado->fetch_assoc();
    //COLOCA O usuário EM SESSAO
    $_SESSION['idUser'] = $resultlogin['iduser'];
    $_SESSION['user'] = $resultlogin['user'];
    $_SESSION['nome'] = $resultlogin['name'];
    $_SESSION['tipo'] = $resultlogin['type'];

    //REDIRECCIONA A PAGINA PARA A PAGINA SECRETA
    header("location: home.php");
} else { //se o login não é válido
    //REDIRECIONA PARA A PAGINA INICIAL REPORTANDO O ERRO
    $_SESSION['erro'] = "Erro";
    header("location: index.php");
}
