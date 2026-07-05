<?php
$id = $_GET['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$foto = $_POST['imagem'];
$estoque= $_POST['estoque'];


include "../../../inc/conn.php";
$sql = "update tb_produto set nome_produto='{$nome}', descricao_produto='{$descricao}', preco_produto={$preco}, imagem_produto='{$foto}', estoque_produto='{$estoque}' where id_produto={$id}";
$resultado = mysqli_query($conexao, $sql);

mysqli_close($conexao);
header('Location:../../pages/admin.php');

?>