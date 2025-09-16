<script type="application/ld+json">
  {
    "schema": {
      "@context": "https://schema.org",
      "@type": "Neg�cio de entretenimento",
      "@id": "",
      "name": "Vip Lux�ria - Acompanhantes Porto Alegre",
      "image": "https://vipluxuria.com/imagens/estrutura/vip-luxuria-logo.png",
      "url": "https://vipluxuria.com",
      "email": "vipluxuria@hotmail.com",
      "telephone": "+5551981440470",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "",
        "addressLocality": "Porto Alegre",
        "postalCode": ""
      }
    }
  }
</script>

<script language="JavaScript">
  function resetFields(whichform) {
    for (var i = 0; i < whichform.elements.length; i++) {
      var element = whichform.elements[i];
      if (element.type == "submit") continue;
      if (!element.defaultValue) continue;
      element.onfocus = function() {
        if (this.value == this.defaultValue) {
          this.value = "";
        }
      }
      element.onblur = function() {
        if (this.value == "") {
          this.value = this.defaultValue;
        }
      }
    }
  }

  window.onload = prepareForms;

  function prepareForms() {
    for (var i = 0; i < document.forms.length; i++) {
      var thisform = document.forms[i];
      //resetFields(thisform); 
    }
  }
</script>
<!-- Faixa Superior -->
<div class="bg-pink-500 py-2">
  <div class="container">
    <div class="row align-items-center justify-content-evenly">
      <!-- Logo -->
      <div class="col-auto">
        <a href="/acompanhantes-porto-alegre/">
          <img src="/imagens/estrutura/vip-luxuria-logo.png" alt="Vip Luxúria" class="img-fluid" style="max-height:98px;">
        </a>
      </div>

      <!-- Botão Anunciar -->
      <!-- <div class="col-auto">
        <a href="/como-anunciar/">
          <img src="/imagens/estrutura/como-anunciar-2018.png" alt="Saiba como anunciar" class="img-fluid" style="max-height:68px;">
        </a>
      </div> -->
    </div>
  </div>
</div>

<!-- CSS customizado para o background -->
<style>
  .bg-pink-500 {
    background-color: #e991b8; /* Ajuste para o tom rosa da faixa */
  }
</style>