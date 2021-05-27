<?php
include 'admin.php';
if (isset($_SESSION['user'])) { //SE EXISTIR AUTENTICAÇÃO
?>
    <!DOCTYPE html>
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
        <script type="text/javascript" src="ajax.js"></script>
        <script>
            //função para confirmar senha
            function validarSenha() {
                //declara as variáveis e recebe os elementos
                var txtSenha = document.getElementById("txtSenha"),
                    txtConfirmaSenha = document.getElementById("txtConfirmaSenha");
                    //compara as duas senhas
                if (txtSenha.value != txtConfirmaSenha.value) {
                    //emite o alerta para a caixa de texto
                    txtConfirmaSenha.setCustomValidity("Senhas diferentes!");
                    //alert (txtSenha.value + " - " + txtConfirmaSenha.value)
                    //retona false e não submete o form
                    return false;
                } else {
                    //limpa o alerta da caixa de texto
                    txtConfirmaSenha.setCustomValidity("");
                    //retorna true e submete o form
                    return true;
                }
            }
        </script>
    </head>

    <body style="margin: 10px 10px 10px 10px;">

        <div id="tudo">
            <a href="home.php">Pagina inicial</a><br />
            <a href="novoProduto.php">Cadastrar Produto</a><br />
            <a href="novoCat.php">Cadastrar Categoria</a><br />
            <a href="listarProduto.php">Listar produtos</a><br />
            <a href="listarUsuario.php">Listar usuários</a><br />

            <?php
            if ($_SESSION['tipo'] == 'A') {
            ?>
                <div id="cadastro">
                    <h2>Cadastro de Usuário</h2>
                    <form name="frmcadProduto" method="POST" action="inserirUsuario.php">
                        <label for="txtNome">Nome: </label>
                        <br />
                        <input class="form-control" type="text" name="txtNome" id="txtNome" size="80" required 
                            placeholder="Informe o nome" autofocus />
                        <br />
                        <label for="txtUsuario">Usuário: </label>
                        <br />
                        <input class="form-control" type="text" name="txtUsuario" id="txtUsuario" size="80" required 
                            placeholder="Informe o usuário" />
                        <br />
                        <label for="txtEmail">Email: </label>
                        <br />
                        <input class="form-control" type="email" name="txtEmail" id="txtEmail" size="80" required 
                            placeholder="Informe o Email" />
                        <br />
                        <label for="txtSenha">Senha: </label>
                        <br />
                        <input class="form-control" type="password" name="txtSenha" id="txtSenha" size="80" required placeholder="Informe a senha" />
                        <br />
                        <label for="txtSenha">Confirme a Senha: </label>
                        <br />
                        <input class="form-control" type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" size="80" required placeholder="Confirme a senha" />
                        <br />
                        <label for="categoria">Tipo:</label>
                        <br />
                        <input type="radio" name="radioUsuario" value="A">&nbsp; Administrador <br>
                        <input type="radio" name="radioUsuario" value="O" checked>&nbsp; Outro <br>
                        <br />
                        <label for="descricao">Observação: </label>
                        <br />
                        <textarea class="form-control" name="txtObs" id="txtObs" rows="5" cols="60" placeholder="Observação"></textarea>
                        <br />
                        <input class="btn btn-primary" type="submit" value="Cadastrar" onclick="validarSenha()">
                        <input class="btn btn-warning" type="reset" value="Limpar">
                    </form>

                </div>
        </div>
    <?php
            } else { //CASO NÃO ESTEJA AUTENTICADO
                echo '<div class="aviso">Acesso restrito ao administrador.</div>';
            }
    ?>

    </body>
    </html>
<?php
}
?>