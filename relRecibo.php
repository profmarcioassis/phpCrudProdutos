<?php
 include_once("mpdf60/mpdf.php");
 //define a localização e idioma
 setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
 //define o fuso horário padrão
 date_default_timezone_set('America/Sao_Paulo');

 //define os valores de entrada para o recibo
 //como exemplo eles estão fixos, mas podem vir de uma base de dados
 $num = "0001";
 $valor = number_format(700,2,',','');
 $porextenso = "Setessentos reais";
 $nome = "José das Couves";
 $servicos = "Serviços prestados...";
 $dataporextenso = "Ouro Branco, ";
 $dataporextenso .= utf8_encode(strftime('%d de %B de %Y', strtotime('today')));
 $empresa = "IFMG campus Ouro Branco";
 $cpfcnpj="123123123-12";
 $endereco = "Avenida Afonso Sardinha, 1000 - Pioneiros, Ouro Branco - MG";

 //define o conteúdo do recibo
 $html = "
 <fieldset>
 <h1>Recibo de Pagamento</h1>
 <p class='center sub-titulo'>
 Nº <strong>$num</strong> - 
 VALOR <strong>R$ $valor</strong>
 </p>
 <p>Recebi(emos) de <strong>$nome</strong></p>
 <p>a quantia de <strong>$porextenso</strong></p>
 <p>Correspondente a <strong>$servicos<strong></p>
 <p>e para clareza firmo(amos) o presente.</p>
 <p class='direita'>$dataporextenso</p>
 <p class='centralizado'>Assinatura ......................................................................................................................................</p>
 <p class='centralizado'>Nome <strong>$empresa</strong> CPF/CNPJ: <strong>$cpfcnpj</strong></p>
 <p class='centralizado'>Endereço <strong>$endereco</strong></p>
 </fieldset>
 ";

 //instancia um objeto da classe mPDF
 $mpdf=new mPDF(); 
 //define o modo da tela
 $mpdf->SetDisplayMode('fullpage');
 //define qual estilo css o recibo vai ter
 $css = file_get_contents("css/estilo.css");
 $mpdf->WriteHTML($css,1);
 $mpdf->WriteHTML($html);
 $mpdf->Output();
 exit;
 ?>