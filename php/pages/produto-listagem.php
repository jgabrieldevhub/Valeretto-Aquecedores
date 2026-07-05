<!DOCTYPE html>
<html lang="pt-br">
    <?php
        session_start();
        $page_title = "Valeretto - Valeretto Aquecedores";
        include("../../inc/head.php");
    ?>
<body>
    <main class="container">
       <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <a class="logo navbar-brand" href="index.php"><img src="../../assets/img/transparent_png/cropped-Valeretto-Logo.png"
            alt="Inicio"></a>

        </div>

        <div>
            <a href="index.php" class="btn btn-secondary shadow-sm me-1">Inicio Site</a>
            <a href="pag-admin.php" class="btn btn-secondary shadow-sm me-1">Painel ADM</a>
            <a href="admin-sair.php" class="btn btn-secondary shadow-sm">Sair do Painel</a>
        </div>
    </div>
        <h1>Listagem de Produtos</h1>
        <div class="row mb-3">
            <div class="col">
                <a class="btn btn-success me-2" href="produto-formulario.php">Novo Produto</a>   
            </div>
        </div>

        <div class="row">
             <div class="col">
               <table class="table table-striped">
                <tr scope="row">   
                    <td scope="col fw-bold">ID</td>
                    <td scope="col fw-bold">Nome</td>
                    <td scope="col fw-bold">Descrição</td>
                    <td scope="col fw-bold">Preço</td>
                    <td scope="col fw-bold">Estoque</td>
                    <td scope="col fw-bold">Imagem Produto</td>
                    <td scope="col fw-bold">Configuração</td>
                </tr>
                <?php 
                #abrir conexão
                include "inc-conexao.php";

                #consultar os dados
                $sql = "select * from tb_produto order by nome_produto, preco_produto";
                $resultado = mysqli_query($conexao, $sql);

                #listar os dados
                while($linha_resultado = mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                    echo "<td> {$linha_resultado['id_produto']} </td>";

                    echo "<td> <a href='./produto-visualizar.php?id={$linha_resultado['id_produto']}'> {$linha_resultado['nome_produto']} </a> </td>";

                    echo "<td> {$linha_resultado['descricao_produto']} </td>";
                    echo "<td> {$linha_resultado['preco_produto']} </td>";
                    echo "<td> {$linha_resultado['estoque_produto']} </td>";
                    echo "<td> {$linha_resultado['imagem_produto']} </td>";


                    echo "<td> <a href='../valid/crud/produto-excluir.php?id={$linha_resultado['id_produto']}'>Excluir</a>
                                <a href='../valid/crud/produto-editar.php?id={$linha_resultado['id_produto']}'>Editar</a>
                    </td>";

                    echo "</tr>";
                }

                #fechar conexão
                mysqli_close($conexao);
                ?>
                </table>
                             
            </div>
        </div>
    </main>

    <?php
        include("../../inc/script.php");
    ?>
</body>
</html>