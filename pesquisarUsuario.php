<?php
include 'conexao.php';

if (isset($_POST['busca'])) {
    $queryString = $_POST['busca'];
    if ($_SESSION['tipo'] == "A") {
        $SQL = "SELECT * 
            FROM    tbuser 
            where   name like('%" . $queryString . "%') or
                    user like('%" . $queryString . "%')  
            ORDER BY name limit 10";
    } else {
        $SQL = "SELECT * 
    FROM tbuser 
    where name 
    like('%" . $queryString . "%') and idUser = " . $_SESSION['idUser'] . " 
    ORDER BY nome limit 10";
    }
    //echo $SQL;
}

$query = $con->query($SQL);
?>
<table class="table table-striped table-hover">
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Usuário</th>
        <th>E-mail</th>
        <th>Tipo</th>
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
            <td><?php echo $exibir["iduser"] ?> </td>
            <td><?php echo $exibir["name"] ?> </td>
            <td><?php echo $exibir["user"] ?> </td>
            <td><?php echo $exibir["email"] ?> </td>
            <td><?php echo ($exibir["type"] == "A" ? "Administrador" : "Outro") ?> </td>
            <?php
            if ($_SESSION['tipo'] == 'A') { //VERIFICA SE O USUÁRIO É ADMINISTRADOR
            ?>

                <td><a href="editarUsuario.php?idUsuario=<?php echo $exibir['iduser'] ?>">
                        <i class="fa fa-edit" title="Editar registro"></i></a></td>

                <td><a href="#" onclick="apagar('<?php echo $exibir['iduser'] ?>', '<?php echo $exibir['name'] ?>');">
                        <i class="fa fa-trash" title="Excluir registro"></i></a></td>
            <?php
            }
            ?>
        </tr>

    <?php
    }
    ?>
</table>