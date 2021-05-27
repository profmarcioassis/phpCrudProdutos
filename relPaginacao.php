<?php
include_once("mpdf60/mpdf.php");
$mpdf = new mPDF();
$numero_inicial = 1;
$mpdf->AddPage('', '', $numero_inicial); // definindo o número que inicia a página
//$mpdf->setFooter("{PAGENO}");    
//$numero_paginas = "{nb}"; 

//Cabeçalho do relatório
$mpdf->SetHTMLHeader('
<table>
    <tr>
        <td>
            Cabeçalho aqui
        </td>
    </tr>
</table>
<hr>'); 

//Corpo do relatório
$corpo_documento= "
<fieldset>
 <h1>Recibo de Pagamento</h1>
 <p class='center sub-titulo'>
 Nº <strong>0001</strong> - 
 VALOR <strong>R$ 700,00</strong>
 </p>
 <p>Recebi(emos) de <strong>Maria das Graças Assis Miranda</strong></p>
 <p>a quantia de <strong>Setecentos Reais</strong></p>
 <p>Correspondente a <strong>Serviços prestados ..<strong></p>
 <p>e para clareza firmo(amos) o presente.</p>
 <p class='direita'>Ouro Branco, 08 de Novembro de 2017</p>
 <p>Assinatura ......................................................................................................................................</p>
 <p>Nome <strong>Márcio Assis Miranda</strong> CPF/CNPJ: <strong>222.222.222-02</strong></p>
 <p>Endereço <strong>Avenida Afonso Sardinha, 1000 - Pioneiros, Ouro Branco - MG</strong></p>
 </fieldset>
 ";   
$mpdf->WriteHTML('    
<style type="text/css">
body{
    font-family:Arial, Times New Roman, sans-serif;
    font-size:40px;
}
</style>'.$corpo_documento.'');    

//Rodapé do relatório com paginação  
$mpdf->SetHTMLFooter("<table width=\"1000\">
                   <tr>
                     <td style='font-size: 18px; padding-bottom: 20px;' align=\"right\">{PAGENO}/{nb}</td>
                   </tr>
                 </table>");    

$mpdf->Output();
exit();

?>