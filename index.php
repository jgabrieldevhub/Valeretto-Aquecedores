<!DOCTYPE html>
<html lang="pt-br">

    <?php
        session_start();
        $page_title = "Valeretto Aquecedores - Valeretto";
        include("./inc/head.php");
    ?>

<body>

    <?php
        include("./inc/header.php");
    ?>

    <main>
        <section class="hero-homepage py-5">
            <div class="container p-3">
                <div class="row align-items-lg-center mb-5">
                    <div class="content-hero col-md-6 mb-5 mb-md-0">
                        <h1 class="display-3 fw-inter-bold text-white">
                            O conforto que a sua família merece, 
                            <span class="text-orange">na temperatura ideal.</span>
                        </h1>
                        <p class="lead mt-3 mb-4 text-white fw-inter-medium">
                            Aquecedores a gás e sistemas solares modernos que garantem alto desempenho e economia para a sua casa
                        </p>
                        <a class="btn btn-lg btn-orange fw-inter-regular fs-6" target="_blank" href="https://api.whatsapp.com/send?phone=5519996294625&text=Ol%C3%A1!%20Gostaria%20de%20saber%20sobre%20aquecedores.">Solicitar Orçamento</a>
                    </div>
                </div>    
            </div>
        </section>

        <?php
            $home_cads_info = [
                ['./assets/icons/Icone_vinte_anos.svg','Há mais de 20 anos de experiência no mercado de sistema de aquecimento de água'],
                ['./assets/icons/Icone_gota.svg','Milhares de litros de água aquecida por ano pelos nossos profissionais efecientes'],
                ['./assets/icons/Icone_consultoria_pre.svg','Oferecemos consultoria pré-instalação para melhor desempenho do sistema'],
                ['./assets/icons/Icone_seguro.svg','Trabalhamos com sistemas para projetos residências, comerciais e industriais'],
            ];
        ?>

        <section class="cards-hero pb-5">
            <div class="container">
                <div class="row">
                    <?php for($i = 0; $i < count($home_cads_info); $i++) {?>
                        <div class="col-lg-3">
                            <div class="card text-center border-0 shadow p-3 my-3 h-auto">
                                <div>
                                    <img src="<?php echo($home_cads_info[$i][0])?>" class="icon card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <p class="card-text fs-7 fw-inter-regular"><?php echo($home_cads_info[$i][1])?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>    
                </div>
            </div>
        </section>

        <section class="bg-body-secondary py-5">
            <div class="container">
                <h4 class="text-center fw-inter-bold mb-5 text-uppercase">Produtos em <b class="text-orange">Destaque</b></h4>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-5 g-3">

                    <?php
                        include("./inc/conn.php");

                        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

                        if ($id > 0) {
                            $sql = "SELECT * FROM tb_produto WHERE id_produto = $id";
                        } else {
                            $sql = "SELECT * FROM tb_produto";
                        }

                        $resultado = mysqli_query($conexao, $sql);

        
                        if ($resultado) {
                            while($linha = mysqli_fetch_assoc($resultado)){
                                $id_prod   = $linha['id_produto'];
                                $nome      = $linha['nome_produto'];
                                $descricao = $linha['descricao_produto'];
                                $estoque   = $linha['estoque_produto'];
                                $preco     = number_format($linha['preco_produto'], 2, ',', '.');
                                $foto      = $linha['imagem_produto'];
                    ?>

                        <div class="col">
                            <a href="https://api.whatsapp.com/send?phone=5519996294625&text=Ol%C3%A1!%20Gostaria%20de%20saber%20sobre%20<?=$nome?>." class="card-product card h-100 ml-card shadow-sm text-decoration-none border-0 shadow-sm hover-lift">
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

                    <?php
                        }

                        }else{
                            echo "<p class='text-center lg-3'>Erro ao buscar produtos.</p>";
                        }

                        mysqli_close($conexao);
                    ?>

                </div>
            </div>
        </section>

        <?php
            $categorias_info = [
                ['./assets/img/transparent_png/Ellipse 19.png','Aquecedor a Gás'],
                ['./assets/img/transparent_png/Ellipse 20.png','Aquecedor Solar'],
                ['./assets/img/transparent_png/Ellipse 21.png','Aquecedor Solar de Piscina'],
                ['./assets/img/transparent_png/Ellipse 28.png','Iluminação de Piscina'],
                ['./assets/img/transparent_png/Ellipse 30.png','Pressurizadoras'],
            ];
        ?>

        <section class="bg-body-tertiary py-5">
            <div class="container">
                <h4 class="text-center fw-inter-bold mb-5 text-uppercase"><b class="text-orange">Categorias</b></h4>
                    <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-5 g-3 d-flex text-center">

                        <?php for($i = 0; $i < count($categorias_info); $i++) {?>

                            <div class="col">
                                <a href="#" class="text-decoration-none">
                                    <img src="<?php echo($categorias_info[$i][0])?>" alt="" class="rounded-circle mb-2 categorias-img bg-body">
                                    <div>
                                        <span class="text-muted"><?php echo($categorias_info[$i][1])?></span>
                                    </div>
                                </a>
                            </div>

                        <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container testimonial-carousel">
                <h4 class="text-center text-uppercase fw-inter-bold"><span class="text-orange">nossos</span> clientes</h4>
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row p-3">
                                <div class="col-md-6">
                                    <div class="card-body text-center p-5 border-1 rounded-2 shadow">
                                        <div><i class="bi bi-quote fs-1 text-orange"></i></div>
                                        <p>"As soluções apresentadas pela Valeretto Aquecedores sempre com muito conhecimento técnico e produtos de alto desempenho. Nos passa muita confiança no momento de fechar um contrato."</p>
                                        <div class="d-flex flex-column">
                                            <span>Rodrigo Marzochi</span>
                                            <span class="text-orange">Topo Arquitetura e Engenharia</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body text-center p-5 border-1 rounded-2 shadow">
                                        <div><i class="bi bi-quote fs-1 text-orange"></i></div>
                                        <p>"Tive ótimas orientações na compra e a instalação foi feita por técnicos muito qualificados. O pós-venda é super prestativo. Já indiquei a familiares e amigos, que também estão muito satisfeitos."</p>
                                        <div class="d-flex flex-column">
                                            <span>Waldemar Castanharo</span>
                                            <spanc class="text-orange">Cliente desde 2000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row p-3">
                                <div class="col-md-6">
                                    <div class="card-body text-center p-5 border-1 rounded-2 shadow">
                                        <div><i class="bi bi-quote fs-1 text-orange"></i></div>
                                        <p>"Agilidade no atendimento e alta qualidade dos produtos e serviços, esses são os principais motivos que trabalhamos com Valeretto Aquecedores. Sempre prontos para nos auxiliar."</p>
                                        <div class="d-flex flex-column">
                                            <span>Guilherme Volpi</span>
                                            <span class="text-orange">Engenheiro Civil</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body text-center p-5 border-1 rounded-2 shadow">
                                        <div><i class="bi bi-quote fs-1 text-orange"></i></div>
                                        <p> "A Valeretto Aquecedores sempre me atendeu com muito profissionalismo e rapidez. Equipe séria e honesta. A equipe do pós venda é excelente, sempre me atenderam com prontidão."</p>
                                        <div class="d-flex flex-column">
                                            <span>Karina Sangalli</span>
                                            <span class="text-orange">Cliente: sistema de aquecimento solar</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
                    </div>
                </div>    
            </div>
        </section>

        <?php
            $infinity_carrousel_logos = [
                ['./assets/img/transparent_png/Logo_Atual_Aquecedores.png','Logo_Atual_Aquecedores'],
                ['./assets/img/transparent_png/Logo_Heliotek-1.png','Logo_Heliotek'],
                ['./assets/img/transparent_png/Logo_Jacuzzi.png','Logo_Jacuzzi'],
                ['./assets/img/transparent_png/Logo_MegraPress_.png','Logo_MegraPress'],
                ['./assets/img/transparent_png/Logo_Mont-Serrat.png','Logo_Mont-Serrat'],
                ['./assets/img/transparent_png/Logo_Orbitec.png','Logo_Orbitec'],
                ['./assets/img/transparent_png/Logo_Rinnai.png','Logo_Rinnai'],
                ['./assets/img/transparent_png/Logo_Rowa.png','Logo_Rowa'],
                ['./assets/img/transparent_png/Logo_Schnelder.png','Logo_Schnelder'],
            ];
        ?>

        <section class="py-5">
            <div class="logos container">
                <h4 class="text-center mb-5 fw-inter-bold text-uppercase">As Melhores <span class="text-orange">Marcas</span></h4>
                <div class="logos-slide">
                    <?php for($i = 0; $i < count($infinity_carrousel_logos); $i++) {?>
                    <img src="<?php echo($infinity_carrousel_logos[$i][0])?>" alt="<?php echo($infinity_carrousel_logos[$i][1])?>">
                    <?php }?>
                </div>
            </div>
        </section>

        <?php
            include("./inc/wpp.php");
        ?>

    </main>

    <?php 
        include("./inc/footer.php");
    ?>

    <?php
        include("./inc/script.php");
    ?>
</body>

</html>