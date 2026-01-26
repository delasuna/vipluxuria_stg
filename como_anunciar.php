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
    </div>
    <div class="degrade">
      <div class="container pt-4">
        <div class="duvidas-header-premium">
          <h1 class="duvidas-title-main">
            <i class="bi bi-question-circle"></i>
            Como <span class="text-rosa">Anunciar</span>
          </h1>
          <p class="duvidas-subtitle">Tudo que você precisa saber sobre como anunciar</p>
        </div>
        <!-- Bloco Agendamento -->
        <div class="card-agendamento text-center p-4 mb-4">
          <div class="card-body">
            <h5 class="card-title fw-bold">
              <i class="bi bi-journal-text me-2"></i>
              Agende seu Atendimento Presencial
            </h5>
            <p class="card-text mb-4">
              <b>Para anunciar no Vip Luxúria é muito fácil.</b> Você deve entrar em contato via WhatsApp para agendar um horário,<br>
              onde faremos um <b>CONTRATO DE AUTORIZAÇÃO DE DIREITO DE USO DE IMAGEM*</b> entre as partes,<br>
              onde <b>VOCÊ</b> autoriza o uso das suas fotos no site,
              declara ser maior de idade<br>
              e de estar ciente que está colocando suas fotos em um site de anúncios de acompanhantes por vontade própria.<br>
              Junto com o contrato será anexado uma cópia do documento de identidade ou carteira de motorista, para comprovação dos dados informados.
            </p>
            <p class="card-text mb-4">
              <i>* Documento é para uso confidencial e exclusivo do site.</i>
            </p>

            <!-- Botão -->
            <a href="https://wa.me/5551981440470" target="_blank" class="btn btn-agendar mb-3">
              <i class="bi bi-chat-dots"></i> Agendar Horário: (51) 98144-0470
            </a>

            <p class="text-muted mb-0">
              <strong>vipluxuria@hotmail.com</strong>
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

      <div class="container py-5">
        <h2 class="text-center text-pink mb-4">Perguntas Frequentes</h2>
        <div class="faq-container-premium">

          <div class="faq-item-premium">
            <button class="faq-question" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false">
              <span class="faq-number">01</span>
              <span class="faq-text">Por que preciso ir presencialmente?</span>
              <i class="bi bi-chevron-down faq-arrow"></i>
            </button>
            <div id="faq1" class="collapse faq-answer" data-bs-parent="#faqAccordion">
              <div class="faq-answer-content">
                Você precisa ir presencialmente para validar sua identidade e garantir a segurança do processo.
              </div>
            </div>
          </div>

          <div class="faq-item-premium">
            <button class="faq-question" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
              <span class="faq-number">02</span>
              <span class="faq-text">O documento fica seguro?</span>
              <i class="bi bi-chevron-down faq-arrow"></i>
            </button>
            <div id="faq2" class="collapse faq-answer" data-bs-parent="#faqAccordion">
              <div class="faq-answer-content">
                Sim, todos os documentos são armazenados de forma segura com criptografia.
              </div>
            </div>
          </div>

          <div class="faq-item-premium">
            <button class="faq-question" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
              <span class="faq-number">03</span>
              <span class="faq-text">Posso alterar meu anúncio depois?</span>
              <i class="bi bi-chevron-down faq-arrow"></i>
            </button>
            <div id="faq3" class="collapse faq-answer" data-bs-parent="#faqAccordion">
              <div class="faq-answer-content">
                Sim, você pode editar ou atualizar seu anúncio a qualquer momento.
              </div>
            </div>
          </div>

          <div class="faq-item-premium">
            <button class="faq-question" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
              <span class="faq-number">04</span>
              <span class="faq-text">Como sei que não é golpe?</span>
              <i class="bi bi-chevron-down faq-arrow"></i>
            </button>
            <div id="faq4" class="collapse faq-answer" data-bs-parent="#faqAccordion">
              <div class="faq-answer-content">
                Trabalhamos apenas com parceiros confiáveis e todo o processo é transparente.
              </div>
            </div>
          </div>

          <div class="faq-item-premium">
            <button class="faq-question" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
              <span class="faq-number">05</span>
              <span class="faq-text">Vocês cobram comissão?</span>
              <i class="bi bi-chevron-down faq-arrow"></i>
            </button>
            <div id="faq5" class="collapse faq-answer" data-bs-parent="#faqAccordion">
              <div class="faq-answer-content">
                Não, não cobramos nenhuma comissão sobre seus anúncios.
              </div>
            </div>
          </div>

        </div>

      </div>
      <div class="container py-5">
        <div class="text-center bg-dark text-white custom-card p-4">
          <h2 class="fw-bold mb-3">Pronta para aumentar seus ganhos?</h2>
          <a href="https://wa.me/5551981440470" target="_blank" class="btn btn-success btn-lg mb-4">
            💬 Agendar Visita ao Escritório
          </a>
        </div>
      </div>
    </div>
    <?php include("rodape-novo.php"); ?>
  </div><!--wrap-->

  <script type="text/javascript">
    Cufon.now();
  </script>
  <?php include("php/google.php"); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>