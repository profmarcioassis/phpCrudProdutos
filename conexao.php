<?php
    //startou a session aqui para não ter que ficar fazendo isso
    //em todas as páginas php que precisam da session
    session_start();
    //parâmetros de acesso ao BD
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBD = "bdProdutos";
    $con = new mysqli($servidor, $usuario, $senha, $nomeBD);
?>
