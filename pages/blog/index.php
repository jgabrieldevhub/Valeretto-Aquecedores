<!DOCTYPE html>
<html lang="pt-br">
    <?php
        $page_title = "Blog - Valeretto";
        $css_page_link = "./style.css";
        include("../../inc/head.php");
    ?>
<body>
    <?php
        include("../../inc/header.php");
    ?>

    <main>
        <section class="bg-body-secondary py-5">
            <div class="container text-center">
                <h3 class="text-uppercase fw-inter-bold text-muted">seja bem-vindo ao nosso <b class="text-orange">blog!</b></h3>
                <p class="fw-inter-medium text-muted ">Encontre aqui respostas rápidas, guias de manutenção e dicas de economia para os sistemas de aquecimento e pressurização do seu imóvel.</p>
            </div>
        </section>

        <?php
            $blog_cards_info =[
                ['./uploads/banheira_quente_a-gas-1024x576.jpg','Os 5 principais benefícios do aquecedor a gás', 'O aquecedor a gás é um ótimo investimento, pois as vantagens dessa tecnologia não se limita apenas ao conforto na hora do banho. Listamos aqui os principais benefícios. Água quente'],
                ['./uploads/cuidados_com-aquecedor_gas-768x432.jpg','Os principais cuidados com o aquecedor a gás', 'O aquecedor a gás é uma ótima opção para aquecimento de água, principalmente para quem busca conforto, praticidade e otimização de espaço. Os equipamentos atuais possuem tecnologia mais inteligentes e'],
                ['./uploads/casa_aquecedor_solar_cuidados-1024x576.jpg','Os 4 cuidados para ter um aquecedor solar eficiente durante o inverno', 'Simples cuidados que podem manter seu aquecedor eficiente durante o inverno.'],
                ['./uploads/banho_aquecedor_solar-1024x576.jpg','Quais são os benefícios de um aquecedor solar?', 'Cada vez mais o aquecedor solar está se tornando um investimento inteligente e indispensável nas casas brasileiras. E quando o assunto é benefício, o sistema solar vai muito além de'],
            ];
        ?>

        <section class="bg-body-tertiary py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 g-4">
                    <?php
                        for($i = 0; $i < count($blog_cards_info); $i++) {
                    ?>
                        <div class="col">
                            <a href="#" class="card h-100 shadow-sm text-decoration-none border-0 shadow-sm hover-lift">
                                <div class="blog-card-img">
                                    <img src="<?php echo($blog_cards_info[$i][0])?>" class="card-img-top h-100 img-fluid" alt="">
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <h5 class="fw-inter-semibold mb-3 text-muted"><?php echo($blog_cards_info[$i][1])?></h5>
                                        <div class=" mb-3">
                                            <span class="fs-7 fw-inter-regular line-clamp-4 text-muted"><?php echo($blog_cards_info[$i][2])?></span>
                                        </div>
                                        <span href="#" class="small mb-2 text-decoration-none text-orange bg-transparent">Ver mais...</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    ?>
                </div>    
            </div>
        </section>
    </main>

    <?php
        include("../../inc/footer.php");
    ?>

    <?php
        include("../../inc/wpp.php");
    ?>

    <?php 
        $js_page_link = "./script.js";
        include("../../inc/script.php");
    ?>
</body>
</html>