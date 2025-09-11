<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO - Saiba Como Anunciar
$sql_seo = "SELECT * FROM seo 
            INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
            WHERE descricao = 'SaibaComoAnunciar'";

$resultado_seo = mysqli_query($conexao, $sql_seo);
if (!$resultado_seo) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado_seo);
$title = $seo['title'] ?? '';
$description = $seo['description'] ?? '';
$keywords = $seo['keywords'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php include 'head.php'; ?>
<body>
<div id="wrap">
    <div id="bg-rosa">
        <?php include("php/menu-2.php"); ?>
        <div id="topo"><?php include("php/topo-2.php"); ?></div>
    </div>
    <div class="container my-5">

  <!-- Bloco Agendamento -->
  <div class="card card-agendamento text-center p-4 mb-4">
    <div class="card-body">
      <h5 class="card-title fw-bold">
        <i class="bi bi-journal-text me-2"></i>
        Agende seu Atendimento Presencial
      </h5>
      <p class="card-text mb-4">
        Para anunciar é necessário comparecer ao nosso escritório
      </p>

      <!-- Botão -->
      <a href="https://wa.me/5551981440470" target="_blank" class="btn btn-agendar mb-3">
        <i class="bi bi-chat-dots"></i> Agendar Horário: (51) 98144-0470
      </a>

      <p class="text-muted mb-0">
        Atendimento presencial: Seg-Sex 9h às 18h <br>
        <strong>Porto Alegre - Centro</strong>
      </p>
    </div>
  </div>

  <!-- Bloco Aviso -->
  <div class="alert-box p-4 text-center">
    <h6 class="fw-bold mb-2">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>
      IMPORTANTE - Evite Golpes!
    </h6>
    <p class="mb-2">
      O <strong>ÚNICO</strong> número oficial do Vip Luxúria é 
      <strong>(51) 98144-0470</strong>.
    </p>
    <p class="mb-2">
      Qualquer outro número se passando pelo site é <strong>GOLPE</strong>.
    </p>
    <p class="mb-0">
      Não fazemos cadastro online, apenas presencial com contrato assinado.
    </p>
  </div>

</div>

<div class="container my-5">
  <h2 class="text-center mb-5 text-white">Como Funciona o Cadastro?</h2>

  <div class="row g-4">

    <!-- Passo 1 -->
    <div class="col-md-6">
      <div class="step-card p-4 h-100">
        <div class="step-number">1</div>
        <h5 class="fw-bold">Agende pelo WhatsApp</h5>
        <p class="mb-0">Entre em contato para marcar seu horário de atendimento presencial</p>
      </div>
    </div>

    <!-- Passo 2 -->
    <div class="col-md-6">
      <div class="step-card p-4 h-100">
        <div class="step-number">2</div>
        <h5 class="fw-bold">Compareça ao Escritório</h5>
        <p class="mb-0">Venha ao nosso escritório no Centro de Porto Alegre com documento de identidade</p>
      </div>
    </div>

    <!-- Passo 3 -->
    <div class="col-md-6">
      <div class="step-card p-4 h-100">
        <div class="step-number">3</div>
        <h5 class="fw-bold">Assine o Contrato</h5>
        <p class="mb-0">Contrato de autorização de uso de imagem e termo de maioridade</p>
      </div>
    </div>

    <!-- Passo 4 -->
    <div class="col-md-6">
      <div class="step-card p-4 h-100">
        <div class="step-number">4</div>
        <h5 class="fw-bold">Perfil Publicado</h5>
        <p class="mb-0">Após aprovação, seu perfil entra no ar em até 72 horas úteis</p>
      </div>
    </div>

  </div>
</div>

<div class="container my-5">
  <div class="doc-card p-4">

    <!-- Título -->
    <h4 class="fw-bold text-rosa mb-4">
      <i class="bi bi-journal-text me-2"></i>
      Documentação Necessária
    </h4>

    <!-- Lista de Documentos -->
    <div class="doc-list p-3 mb-4">
      <h6 class="fw-bold mb-3">Para o Cadastro Presencial:</h6>
      <ul class="mb-0">
        <li>Documento de identidade original (RG ou CNH)</li>
        <li>Comprovante de maioridade (18+ anos)</li>
        <li>Fotos para o perfil (pode trazer no celular)</li>
        <li>Informações de contato (WhatsApp)</li>
      </ul>
    </div>

    <!-- Contrato -->
    <div class="doc-contrato p-3">
      <h6 class="fw-bold text-rosa mb-2">Contrato de Autorização:</h6>
      <p class="mb-0">
        Você assinará um <strong>Contrato de Autorização de Direito de Uso de Imagem</strong>, 
        declarando ser maior de idade e autorizando a publicação das suas fotos no site por vontade própria.  
        Este documento é <strong>confidencial</strong> e de uso exclusivo do Vip Luxúria.
      </p>
    </div>

  </div>
</div>
<div class="container my-5">
  <div class="benefits-card p-4">
    <h3 class="text-center mb-5 text-rosa">
      Por que 17 anos de sucesso no Vip Luxúria?
    </h3>

    <div class="row g-4">

      <!-- Item 1 -->
      <div class="col-md-6 d-flex">
        <div class="benefit-icon me-3">
          <i class="bi bi-bullseye"></i>
        </div>
        <div>
          <h6 class="fw-bold text-white">Público Direcionado</h6>
          <p class="mb-0">Seu anúncio alcança exatamente quem procura por acompanhantes em Porto Alegre</p>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="col-md-6 d-flex">
        <div class="benefit-icon me-3">
          <i class="bi bi-telephone-fill"></i>
        </div>
        <div>
          <h6 class="fw-bold text-white">Contato Direto</h6>
          <p class="mb-0">Cliente liga direto no seu WhatsApp. Sem intermediários, sem comissões</p>
        </div>
      </div>

      <!-- Item 3 -->
      <div class="col-md-6 d-flex">
        <div class="benefit-icon me-3">
          <i class="bi bi-1-circle-fill"></i>
        </div>
        <div>
          <h6 class="fw-bold text-white">1º no Google</h6>
          <p class="mb-0">Primeira página em "acompanhantes porto alegre" e termos relacionados</p>
        </div>
      </div>

      <!-- Item 4 -->
      <div class="col-md-6 d-flex">
        <div class="benefit-icon me-3">
          <i class="bi bi-globe"></i>
        </div>
        <div>
          <h6 class="fw-bold text-white">Alcance Nacional</h6>
          <p class="mb-0">Visibilidade para clientes de todo Brasil que visitam Porto Alegre</p>
        </div>
      </div>

      <!-- Item 5 -->
      <div class="col-md-6 d-flex">
        <div class="benefit-icon me-3">
          <i class="bi bi-pencil-fill"></i>
        </div>
        <div>
          <h6 class="fw-bold text-white">Alterações Grátis</h6>
          <p class="mb-0">Atualize fotos e textos quando quiser. Processamos em até 72h úteis</p>
        </div>
      </div>

      <!-- Item 6 -->
      <div class="col-md-6 d-flex">
        <div class="benefit-icon me-3">
          <i class="bi bi-currency-dollar"></i>
        </div>
        <div>
          <h6 class="fw-bold text-white">Melhor Custo-Benefício</h6>
          <p class="mb-0">Muito mais barato que jornal impresso, com alcance infinitamente maior</p>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="perfil-container">
  <h2 class="perfil-title">✨ O que incluir no seu perfil</h2>
  
  <div class="perfil-grid">
    <div class="perfil-card">
      <h3>📸 Visual</h3>
      <ul>
        <li>Até 20 fotos HD</li>
        <li>Vídeo apresentação</li>
        <li>Galeria privada</li>
      </ul>
    </div>
    
    <div class="perfil-card">
      <h3>📝 Informações</h3>
      <ul>
        <li>Perfil detalhado</li>
        <li>Características físicas</li>
        <li>Serviços oferecidos</li>
      </ul>
    </div>
    
    <div class="perfil-card">
      <h3>📍 Localização</h3>
      <ul>
        <li>Bairro de atendimento</li>
        <li>Com local/sem local</li>
        <li>Atende em motel</li>
      </ul>
    </div>
    
    <div class="perfil-card">
      <h3>💬 Contato</h3>
      <ul>
        <li>WhatsApp direto</li>
        <li>Horário atendimento</li>
        <li>Dias disponíveis</li>
      </ul>
    </div>
  </div>
</div>
<div class="container my-5">
    <h2 class="text-center text-pink mb-4">Perguntas Frequentes</h2>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Por que preciso ir presencialmente?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Você precisa ir presencialmente para validar sua identidade e garantir a segurança do processo.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    O documento fica seguro?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Sim, todos os documentos são armazenados de forma segura com criptografia.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Posso alterar meu anúncio depois?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Sim, você pode editar ou atualizar seu anúncio a qualquer momento.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Como sei que não é golpe?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Trabalhamos apenas com parceiros confiáveis e todo o processo é transparente.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Vocês cobram comissão?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Não, não cobramos nenhuma comissão sobre seus anúncios.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
  <div class="card text-center bg-dark text-white custom-card p-4">
    <h2 class="fw-bold mb-3">Pronta para aumentar seus ganhos?</h2>
    <p class="mb-4">Agende seu atendimento presencial e comece a receber mais clientes!</p>
    <a href="https://wa.me/5591981440470" target="_blank" class="btn btn-success btn-lg mb-4">
      💬 Agendar Visita ao Escritório
    </a>
    <hr class="border-secondary">
    <div class="mt-3">
      <p class="text-pink fw-bold mb-1">📍 Nosso Escritório</p>
      <p class="mb-1">Centro de Porto Alegre - RS</p>
      <p class="mb-1">Atendimento: Segunda a Sexta, 9h às 18h</p>
      <p class="mb-1">WhatsApp: (51) 98144-0470</p>
      <p class="mb-1">E-mail: vipluxuria@hotmail.com</p>
      <p class="text-warning small mt-3">
        ⚠️ Lembre-se: Só fazemos cadastro presencial com contrato assinado.<br>
        Desconfie de golpes online se passando pelo Vip Luxúria.
      </p>
    </div>
  </div>
</div>

<?php include("rodape-novo.php"); ?>
</div><!--wrap-->

<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
