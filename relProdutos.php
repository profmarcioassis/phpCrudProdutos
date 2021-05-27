<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>Relatório de produtos</title>

    </head>

    <body style="margin: 10px 10px 10px 10px;">
    <?php
	 
	//inclui a biblioteca do mpdf
 	include_once("mpdf60/mpdf.php");
 	//inlcui o arquivo de conexão
	include 'conexao.php';
	//definição do comando sql para a consulta
 	$SQL = "SELECT * FROM tbprodutos ORDER BY nmproduto limit 10";
 	//executa o comando sql
	$query = $con->query($SQL);
	//cria uma variável para armazenar o html que vai gerar o pdf
	$html = "
	<br><br>
	<p class=\"sub-titulo\">Lista de produtos cadastrados</p>
	<table class=\"mytab\">
    <tr> <th>Código</th><th>Produto</th> <th>Descrição</th> <th>Categoria</th>";
    //enquanto existir registro na consulta, exibe os dados
    while ($exibir = $query->fetch_assoc()) {
    	//atribui os dados retornados a variáveis comuns
    		$id = $exibir["idProduto"];
    		$nmProduto = utf8_encode($exibir["nmProduto"]);
    		$descProduto = utf8_encode($exibir["descProduto"]);
            //continua construindo a variável com o html
            $html.="<tr>
            <td>$id</td>
            <td>$nmProduto</td>
            <td>$descProduto</td>";   
            
            //parte para buscar no banco o nome da categoria pelo código
            $consultacategoria = "select * from tbcategoria where idCategoria = " . $exibir["idCategoria"];
            $querycategoria = $con->query($consultacategoria);
            $resultadocategoria = $querycategoria->fetch_assoc();
            $nmCategoria = utf8_encode($resultadocategoria["nmCategoria"]);
            $html.="<td>$nmCategoria</td>";
	   }
	   
	$html.="</tr></table>";

	//cria um objeto da classe mpdf
 	$mpdf = new Mpdf();
 	//define o modo do display
	 $mpdf->SetDisplayMode('fullpage');
 	//define o arquivo css para formatar a saída
 	$css = file_get_contents("css/estilo.css");
 	//escreve o css no html
	$mpdf->WriteHTML($css,1);
	//define o fuso horário padrão
	date_default_timezone_set('America/Sao_Paulo');
	//retorna a data e hora do sistema
	$data = date('d/m/Y \à\s H:i:s');
	//define qual vai ser o cabeçalho do relatório
	$mpdf->SetHeader(
		'<img src="imagens/logoIFMG.jpg" width=50 height=70>|
		<h2 style="width:100%;">Sistema de gerenciamento de produtos<h2>|
		Usuário: '.utf8_encode($_SESSION["nome"]).'<br><br>'.$data 
	);
	//define o rodapé do relatório com (número da página/número de páginas)
	$mpdf->setFooter("{PAGENO}/{nbpg}");
 	//cria o html para pdf
 	$mpdf->WriteHTML($html);
 	//método para gerar o arquivo pdf
 	$mpdf->Output();
 	//sai do bloco de script
 	//exit;
?>
    </body>

</html>