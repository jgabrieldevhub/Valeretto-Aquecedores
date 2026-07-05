<?php
include "../trava_admin.php"; 

$id = $_GET['id']?? 0;
include "../../../inc/conn.php";
$sql = "select * from tb_produto where id_produto = {$id}";

$resultado = mysqli_query($conexao, $sql);
$nome = $descricao = $preco = $foto = $estoque = "";

while($linha = mysqli_fetch_assoc($resultado)){

    $nome = $linha['nome_produto'];
    $descricao = $linha['descricao_produto'];
    $preco = $linha['preco_produto'];
    $foto = $linha['imagem_produto'];
    $estoque = $linha['estoque_produto'] ?? 0; 


}
?>

<!DOCTYPE html>
<html lang="en">
    <?php
        $page_title = "Editar produto - Valeretto";
        include "../../../inc/head.php";    
    ?>
<body>
    
    <body>
    <main class="container my-4">
<div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <a class="logo navbar-brand" href="../../../index.php"><img src="../../../assets/img/transparent_png/cropped-Valeretto-Logo.png"
            alt="Inicio"></a>

        </div>

        <div>
            <a href="../../../index.php" class="btn btn-secondary shadow-sm me-1">Inicio Site</a>
            <a href="../../pages/admin.php" class="btn btn-secondary shadow-sm me-1">Painel ADM</a>
            <a href="../sair_admin.php" class="btn btn-secondary shadow-sm">Sair do Painel</a>
        </div>
    </div>

    </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 bg-white p-5 rounded shadow-sm">
        <h1 class="mb-4">Editar produto: <?=$nome?></h1>
        <form method="post" action="./produto-atualizar.php?id=<?=$id?>">
            <div class="mb-3"> 
                <label class="form-label fw-bold">Nome:</label>
                <input name="nome" value="<?=$nome?>" class="form-control"><br>
            </div>

            <div class="mb-3">
                        <label class="form-label fw-bold">Descrição:</label>
                        <input name="descricao" value="<?=$descricao?>"  class="form-control"><br>
            </div>

            <div class="mb-3">
                    <label class="form-label fw-bold">Preço:</label>
                    <input type="number" name="preco" value="<?=$preco?>"  class="form-control" step="0.01"><br>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Estoque:</label>
                <input type="number" name="estoque" value="<?=$estoque?>"  class="form-control"><br>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Foto URL:</label>
                <input name="imagem" value="<?=$foto?>"  class="form-control"><br>
            </div>

            <br>
                <button type="submit" class="btn btn-success btn-lg px-4">Atualizar Produto</button>
                <a href="../../pages/admin.php" class="btn btn-secondary btn-lg">Voltar</a>
                
            </form>
        </div>
    </div>
</main>
<?php 
mysqli_close($conexao);
?>


</body>
</html>
