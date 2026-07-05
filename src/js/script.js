var copy = document.querySelector(".logos-slide").cloneNode(true)
document.querySelector('.logos').appendChild(copy)

const form = document.getElementById('formProduto');

// Se o formProduto existir ele executa o formulario
if (form) {
    form.addEventListener('submit', function(event) {
        
        let formularioValido = true;

        const campoNome = document.getElementById('nome').value;
        const campoDescricao = document.getElementById('descricao').value;
        const campoPreco = document.getElementById('preco').value;
        const campoEstoque = document.getElementById('estoque').value;
        const campoImagem = document.getElementById('imagem').value;


        // VALIDAÇÃO DO NOME DO PRODUTO (SELECIONAR)

        if (campoNome.trim() === "") {
            console.log("Erro: Nome está vazio ou contém apenas espaços.");
            formularioValido = false;
        } else {
            const regexApenasLetras = /^[A-Za-zÀ-ÿ\s]+$/;
            if (!regexApenasLetras.test(campoNome)) {
                console.log("Erro: Nome inválido! Contém números ou caracteres especiais.");
                formularioValido = false;
            } else {
                console.log("Ok: Nome válido.");
            }
        }

        // VALIDAÇÃO DA DESCRIÇÃO (MÍNIMO ACIMA DE 10, MÁXIMO 1000 + ESPAÇO)

        const totalCaracteresDescricao = campoDescricao.trim().length;

        if (campoDescricao.trim() === "") {
            console.log("Erro: Descrição está vazia.");
            formularioValido = false;
        } else if (totalCaracteresDescricao <= 10) {
            // REGRA COMPLEMENTAR: Recusa se o usuário digitar exatamente 10 letras ou menos
            console.log(`Erro: Descrição possui apenas ${totalCaracteresDescricao} caracteres. Digitar apenas 10 letras ou menos não é permitido. O mínimo aceito é 11.`);
            formularioValido = false;
        } else if (totalCaracteresDescricao > 1000) {
            console.log(`Erro: Descrição muito longa! Possui ${totalCaracteresDescricao} caracteres. O limite máximo é 1000.`);
            formularioValido = false;
        } else {
            // Mantém a regra anterior de exigir espaço após uma palavra
            const regexEspacoAposPalavra = /[a-zA-Z0-9À-ÿ]+\s+[a-zA-Z0-9À-ÿ]/;

            if (!regexEspacoAposPalavra.test(campoDescricao.trim())) {
                console.log("Erro: Descrição inválida! Você precisa digitar pelo menos duas palavras separadas por espaço.");
                formularioValido = false;
            } else {
                const regexTemTextoUtil = /^(?=.*[a-zA-Z0-9])/;
                if (!regexTemTextoUtil.test(campoDescricao.trim())) {
                    console.log("Erro: Descrição inválida! Não use apenas símbolos.");
                    formularioValido = false;
                } else {
                    console.log("OK: Descrição válida.");
                }
            }
        }


        //VALIDAÇÃO DO PREÇO (ATÉ 5 NÚMEROS ANTES DA VÍRGULA E 2 DEPOIS)

        if (campoPreco.trim() === "") {
            console.log("Erro: Preço está vazio.");
            formularioValido = false;
        } else {
            const regexPrecoRestrito = /^\d{1,5},\d{2}$/;

            if (!regexPrecoRestrito.test(campoPreco.trim())) {
                console.log("Erro: Preço inválido! Deve ter até 5 números antes da vírgula e exatamente 2 números depois (Exemplo: 12345,67).");
                formularioValido = false;
            } else {
                const precoNumerico = parseFloat(campoPreco.trim().replace(',', '.'));
                
                if (precoNumerico <= 0 || isNaN(precoNumerico)) {
                    console.log("Erro: Preço inválido! O valor deve ser maior que R$ 0,00.");
                    formularioValido = false;
                } else {
                    console.log("Ok: Preço válido.");
                }
            }
        }


        // VALIDAÇÃO DO ESTOQUE (ACIMA DE 1, MÁXIMO 5 DÍGITOS, APENAS NÚMEROS)

        const estoqueLimpo = campoEstoque.trim();
        const totalDigitosEstoque = estoqueLimpo.length;

        if (estoqueLimpo === "") {
            console.log("Erro: Estoque está vazio.");
            formularioValido = false;
        } else {
            const regexApenasNumerosPuros = /^\d+$/;

            if (!regexApenasNumerosPuros.test(estoqueLimpo)) {
                console.log("Erro: Estoque inválido! Digite apenas números inteiros. Letras, pontos, vírgulas ou sinais não são permitidos.");
                formularioValido = false;
            } else if (totalDigitosEstoque > 4) {
                console.log(`Erro: Estoque inválido! Possui ${totalDigitosEstoque} dígitos. O limite máximo permitido é de 4 dígitos.`);
                formularioValido = false;
            } else {
                const quantidadeEstoque = parseInt(estoqueLimpo, 10);

                if (quantidadeEstoque < 1) {
                    console.log(`Erro: Estoque inválido! O valor digitado foi ${quantidadeEstoque}. Deve ser estritamente acima de 1 (mínimo 2).`);
                    formularioValido = false;
                } else {
                    console.log("Ok: Estoque válido.");
                }
            }
        }


        // VALIDAÇÃO DA URL DA IMAGEM (10 A 100 CARACTERES)

        const totalCaracteresImagem = campoImagem.trim().length;
        const regexContemEspacos = /\s/;
        const regexExtensaoImagem = /\.(jpg|jpeg|png|webp)$/i;

        if (campoImagem.trim() === "") {
            console.log("Erro: Link da Imagem está vazio.");
            formularioValido = false;
        } else if (regexContemEspacos.test(campoImagem)) {
            console.log("Erro: Imagem inválida! Não pode conter espaços.");
            formularioValido = false;
        } else if (totalCaracteresImagem < 10 || totalCaracteresImagem > 100) {
            console.log(`Erro: O link da imagem tem ${totalCaracteresImagem} letras. Deve ter entre 10 e 100 caracteres.`);
            formularioValido = false;
        } else if (!regexExtensaoImagem.test(campoImagem.trim())) {
            console.log("Erro: Imagem inválida! Extensão incorreta.");
            formularioValido = false;
        } else {
            console.log("Ok: Link da Imagem válido.");
        }

        // EM CASO DE ERRO APRESENTA AQUI NO ENVIO

        console.log("--- FIM DA VALIDAÇÃO ---");

        if (formularioValido === false) {
            console.log("ALGO DEU ERRADO");
            event.preventDefault(); 
        } else {
            console.log(" Ok, enviado com sucesso!");
        }
    });
}

// Busca o formulário de contato
const formulario = document.getElementById('formContato');

// Só adiciona o evento se o formContato realmente existir na página
if (formulario) {
    formulario.addEventListener('submit', function(event) {
        
        const campoNome = document.getElementById('contact-name');
        const campoEmail = document.getElementById('contact-email');
        const campoMensagem = document.getElementById('contact-message');

        const nomeValue = campoNome.value.trim();
        const emailValue = campoEmail.value.trim();
        const mensagemValue = campoMensagem.value.trim();

        // Permite apenas letras (incluindo acentos) e espaços
        const apenasLetras = /^[A-Za-zÀ-ÿ ]+$/;
        // Impede tags de script <script> para evitar invasões
        const temScript = /<script\b[^>]*>([\s\S]*?)<\/script>/gi;

        // Campos vazios ou apenas com espaços
        if (nomeValue === "" || emailValue === "" || mensagemValue === "") {
            console.log("Erro: Todos os campos são obrigatórios e não podem conter apenas espaços!");
            event.preventDefault(); // Impede o envio do formulário
            return;
        }

        // Apenas letras no nome
        if (!apenasLetras.test(nomeValue)) {
            console.log("Erro: O nome deve conter apenas letras!");
            event.preventDefault();
            return;
        }

        // Conta quantos espaços existem no nome
        const quantidadeEspacos = nomeValue.split(' ').length - 1;
        if (quantidadeEspacos < 1) {
            console.log("Erro: O nome deve conter pelo menos um espaço (digite seu nome completo)!");
            event.preventDefault();
            return;
        }

        // Verificar se o email tem @
        if (!emailValue.includes('@')) {
            console.log("Erro: O email digitado é inválido (falta o @)!");
            event.preventDefault();
            return;
        }

        // Proteção contra scripts nocivos (XSS)
        if (temScript.test(mensagemValue) || temScript.test(nomeValue) || temScript.test(emailValue)) {
            console.log("Erro: Tentativa de inserção de script malicioso detectada!");
            event.preventDefault();
            return;
        }

        console.log("Formulário de contato válido e enviado com sucesso!");
    });
}