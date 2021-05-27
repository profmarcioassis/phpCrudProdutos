<?php
include 'conexao.php';

if (isset($_POST['busca'])) {
    $queryString = $_POST['busca'];
    $SQL = "SELECT * FROM tbCategoria where nmCategoria like('%" . $queryString . "%') ORDER BY nmCategoria limit 10";
}
/* else {
  $SQL = "SELECT * FROM tbprodutos where nmproduto ORDER BY nmproduto";
  //echo "<script>alert('Sem filtro');</script>";
  } */
$query = $con->query($SQL);
?>
<table class="table table-striped table-hover">
    <tr> <th>Código</th><th>Categoria</th><th></th>
        <?php
        if ($_SESSION['tipo'] == 'A') {
            ?>
            <th></th><th></th></tr>
        <?php
    }
    while ($exibir = $query->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $exibir["idCategoria"] ?> </td>
            <td><?php echo utf8_encode($exibir["nmCategoria"])?> </td> 
            <?php
            if ($_SESSION['tipo'] == 'A') { //VERIFICA SE O USUÁRIO É ADMINISTRADOR
                ?>

                <td><a href="editarCat.php?idCat=<?php echo $exibir["idCategoria"]?>">
                    <img src="imagens/edit.png"/></a></td>
                <td><a href="#" onclick="apagar('<?php echo $exibir["idCategoria"] ?>', '<?php echo $exibir["nmCategoria"] ?>');">
                        <img src="imagens/delete.png"/></a></td>
                <?php
            }
            ?>
        </tr>

        <?php
    }
    ?>
</table>
