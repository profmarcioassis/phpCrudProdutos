<?php
include 'admin.php';
if (isset($_SESSION['user'])) { //SE EXISTIR AUTENTICAÇÃO
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title></title>
                        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>    

            <script language="JavaScript" type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript">

                //Função para quando digitar algo
                $('document').ready(function() {
                    $('#buscar').keyup(function() {
                        $.post('pesquisarCat.php', {busca: $('#buscar').val()},
                        function(data) {
                            $('#conteudopesquisa').show();
                            $('#conteudopesquisa').empty().html(data);
                        }
                        );
                    });
                });
                
                //Função para exibir quando carregar
                $('document').ready(function() {
                    $.post('pesquisarCat.php',
                            {busca: $('#buscar').val()},
                    function(data) {
                        $('#conteudopesquisa').show();
                        $('#conteudopesquisa').empty().html(data);
                    }
                    );
                });

                function apagar(id, desc) {
                    if (window.confirm("Deseja realmente apagar este registro:\n" + id + " - " +desc + "\n\n???")) {
                        window.location = 'excluirCat.php?idCat=' + id;
                    }
                }
            </script>
        </head>
        <body style="margin: 10px 10px 10px 10px;">
            <div id="tudo">
                <div id="cadastro">
                    <a href="home.php">Pagina inicial</a><br/>
                    <?php
                    if ($_SESSION['tipo'] == 'A') {
                        echo '<a href="novoCat.php">Cadastrar Categoria</a><br/>';
                    }
                    ?>
                    <br/>
                    <div id="main">
                        <div id="busca">
                            <form>
                                <h3>Pesquisar Categoria</h3>
                                <input type="text" id="buscar" value="" size="50" class="form-control" style="width: 50%"><br><br>
                                <div id="conteudopesquisa">
                                </div>
                            </form>
                        </div> <!-- busca -->
                    </div> <!-- main -->
                </div>
            </div>
        </body>
    </html>
    <?php
}
?>