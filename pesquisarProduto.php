<?php
include 'conexao.php';

if (isset($_POST['busca'])) {
    $queryString = $_POST['busca'];
   if ($_SESSION['tipo']=="A") {
   $SQL = "SELECT * 
            FROM tbprodutos 
            where nmproduto 
            like('%" . $queryString . "%') 
            ORDER BY nmproduto limit 10";
   }
   else{
    $SQL = "SELECT * 
    FROM tbprodutos 
    where nmproduto 
    like('%" . $queryString . "%') and idUser = ".$_SESSION['idUser']." 
    ORDER BY nmproduto limit 10";

   }
   //echo $SQL;
}
/* else {
  $SQL = "SELECT * FROM tbprodutos where nmproduto ORDER BY nmproduto";
  //echo "<script>alert('Sem filtro');</script>";
  } */
$query = $con->query($SQL);
?>
<table class="table table-striped table-hover">
    <tr> 
        <th>Código</th>
        <th>Produto</th> 
        <th>Produto</th> 
        <th>Descrição</th> 
        <th>Categoria</th>
        <!--th>Imagem</th-->
        <?php
        if ($_SESSION['tipo'] == 'A') {
            ?>
            <th>Editar</th>
            <th>Excluir</th>
        <?php
    }
    ?>
    </tr>
    <?php
    while ($exibir = $query->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $exibir["idProduto"] ?> </td>
            <td><?php echo $exibir["nmProduto"] ?> </td>
            <td>R$ <?php echo $exibir["valor"] ?> </td> 
            <td><?php echo $exibir["descProduto"] ?> </td>
            <?php
            $consultacategoria = "select * from tbcategoria where idCategoria = " . $exibir["idCategoria"];
            $querycategoria = $con->query($consultacategoria);
            $resultadocategoria = $querycategoria->fetch_assoc();
            ?>
            <td><?php echo $resultadocategoria["nmCategoria"] ?> </td> 

            <!--td><a href="inseririmagens.php?idProduto=<?//php echo $exibir["idProduto"] ?>"><img src="imagens/camera.png"/></a></td-->

            <?php
            if ($_SESSION['tipo'] == 'A') { //VERIFICA SE O USUÁRIO É ADMINISTRADOR
                ?>
                <td><a href="editarProduto.php?idProduto=<?php echo $exibir['idProduto']?>">
                    <i class="fa fa-edit" title="Editar registro"></i></a></td>
                    
                <td><a href="#" onclick="apagar('<?php echo $exibir['idProduto'] ?>', '<?php echo $exibir['nmProduto'] ?>');">
                <i class="fa fa-trash" title="Excluir registro"></i></a></td>
                <?php
            }
            ?>
        </tr>

        <?php
    }
    ?>
</table>
