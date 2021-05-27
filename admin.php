<?php
	include 'conexao.php';
?>
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
        
        
    </head>
    <body style="margin: 10px 10px 10px 10px;">
        <?php
        if (isset($_SESSION['user'])) { //SE EXISTIR AUTENTICAÇÃO
            ?>
            <div class="alert alert-success" style="text-align: right;">
                <p>Bem vindo(a) 
                <?php 
                    echo $_SESSION['nome'];
                ?>
                <a href="logout.php" style="font-size: 20px; text-align: right;" title="Efetuar logoff"> 
                <span class="glyphicon glyphicon-log-out"></span>
                </a></p>
            </div>

        <?php
        } else { //CASO NÃO ESTEJA AUTENTICADO
            echo '<div class="alert alert-warning" style="text-align:center;">Esta é uma área reservada, só usuários autorizados podem ter acesso.</div>';
             echo '<br/><a href="index.php">Se identifique aqui</a>';
        }
        ?>
    </body>
</html>