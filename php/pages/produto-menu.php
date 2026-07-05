<!DOCTYPE html>
<html lang="pt-br">
    <?php
        $page_title = "Valeretto - Valeretto Aquecedores";
        include("../../inc/head.php");
    ?>
<body>

    <?php
        include("../../inc/header.php");
    ?>

    <main>
        <div class="container py-5">
            <?php
                include "../../inc/conn.php";

                $nome_busca = isset($_GET['nome']) ? $_GET['nome'] : '';

                if ($nome_busca != '') {
                    $sql = "SELECT * FROM tb_produto WHERE nome_produto = '$nome_busca'";
                } else {
                    $sql = "SELECT * FROM tb_produto";
                }

                $resultado = mysqli_query($conexao, $sql);

                $id = $nome = $descricao = $preco = $foto = $estoque = "";

                if ($resultado->num_rows > 0) {
                while($linha = mysqli_fetch_assoc($resultado)){

                    $id_prod = $linha['id_produto'];
                    $nome = $linha['nome_produto'];
                    $descricao = $linha['descricao_produto'];
                    $preco = $linha['preco_produto'];
                    $foto = $linha['imagem_produto'];
                    $estoque = $linha['estoque_produto'];
            ?>

            <h4 class="text-center mb-5 fw-inter-bold text-uppercase">Produtos <span class="text-orange"><?=$nome; ?> </span></h4>
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3">
        
                    <div class="col">
                            <a href="#" class="card-product card h-100 ml-card shadow-sm text-decoration-none border-0 shadow-sm hover-lift">
                                <img src="<?=$foto; ?>" alt="<?=$nome; ?>" class="card-img-top p-3 img-contain" alt="...">
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <h4 class="fs-4 fw-inter-bold mb-1 line-clamp-2"><?=$nome; ?></h4>
                                        <h4 class="fs-6 fw-inter-regular text-mu4 mb-1 line-clamp-2"><?=$descricao; ?></h4>
                                        <div class="d-flex align-items-center mb-1">
                                            <span class="fs-4 fw-inter-semibold text-orange">R$ <?=$preco; ?></span>
                                        </div>
                                        <div class="small mb-2">Disponível: <?php echo $estoque; ?> unidades.</div>
                                    </div>
                                </div>
                            </a>
                    </div>
                </div>

                <?php 
                    }
                    }else{
                        
                        echo "<p class='text-center mb-5 fw-inter-bold text-uppercase fs-4'>Produto indisponível no momento...</p>";
                    }
                    mysqli_close($conexao);
                ?>

            </div>
        </div>

    </main>

    <?php
        include("../../inc/footer.php");
        include("../../inc/wpp.php");
    ?>

</body>
</html>