<?php
include 'conexao.php';
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function () {
                    setInterval(function () {
                    $('#erro').fadeOut(1500);
                    }, 2000);
                });
            </script>
    </head>
    <body>
        <div id="tudo">
            <div id="cadastro">
                    <h1 style="text-align: center;">Sistema de gerenciamento de produtos</h1> 
                <div class="container">
                    <center>
                        <p></p>
                        <h3>Login</h3><p></p>
                    <form name="login" method="post" action="login.php">
                        <div class="form-group">
                            <label for="user">Usuário:</label>
                            <input name="txtUser" id="user" type="text" class="form-control"  maxlength="20" value="" style="width: 30%;" required autofocus/>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" name="txtPassword" id="password" class="form-control" style="width: 30%;" required /><br>
                        <input type="submit" class="btn btn-primary value="Login" />
                        </div>
                        
                        <?php
							if (isset($_SESSION['erro'])) {
								if ($_SESSION['erro'] == 'Erro') {
                                    ?>
									<div id="erro" class="alert alert-warning">
                                    Erro no login. Tente novamente.
								    </div>
                                <?php
                                    $_SESSION['erro'] = 'OK';
                                } 
							}	
						?>
                    </form>
                    </center>
                </div>
            </div>
        </div>
    </body>
</html>