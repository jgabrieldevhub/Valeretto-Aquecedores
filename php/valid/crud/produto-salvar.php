<?php
session_start();
include "../../valid/trava_admin.php"; 
/*discografia-salvar.php*/
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$estoque   = $_POST['estoque'] ?? 0; 
$foto = $_POST['imagem'];

echo "$nome - $descricao - $preco - $estoque - $foto";


#abrir conexão

include "../../../inc/conn.php";

# inserir os dados

$sql = "insert into tb_produto(nome_produto, descricao_produto, preco_produto, estoque_produto, imagem_produto) values('$nome', '$descricao', '$preco', '$estoque', '$foto')";

$resultado = mysqli_query($conexao , $sql);

if($resultado){
    echo "cadastrado com sucesso";
}else{
    echo "deu algum problema";
}

# fechar conexao
header("Location: ../../pages/admin.php");

mysqli_close($conexao);




?>


