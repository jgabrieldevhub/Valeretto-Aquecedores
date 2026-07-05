<?php 

include "../../valid/trava_admin.php"; 

$id = $_GET['id'];

include "../../../inc/conn.php";


$sql = "delete from tb_produto where id_produto = {$id}";

$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);

header('Location:../../pages/admin.php');
?>