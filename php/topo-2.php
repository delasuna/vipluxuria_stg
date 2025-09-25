<script type="application/ld+json">
  {
    "schema": {
      "@context": "https://schema.org",
      "@type": "Negócio de entretenimento",
      "@id": "",
      "name": "Vip Luxúria - Acompanhantes Porto Alegre",
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

<!-- Seção Unificada: Logo + Banner com Fundo Degradê e Textura -->
<div class="topo-banner-integrado">
  <!-- Textura de fundo -->
  <div class="textura-overlay"></div>
  
  <!-- Container com largura controlada -->
  <div class="container">
    <!-- Logo -->
    <div class="logo-section">
      <a href="/acompanhantes-porto-alegre/">
        <img src="/imagens/estrutura/vip-luxuria-logo.png" alt="Vip Luxúria" class="logo-principal">
      </a>
    </div>
    
    <!-- Banner/Slider Integrado (menor) -->
    <div class="banner-integrado">
      <?php include("slider.php"); ?>
    </div>
  </div>
  
  <!-- Degradê suave na parte inferior -->
  <div class="fade-bottom"></div>
</div>

<!-- CSS para integração completa -->
<style>
/* Seção Unificada com Fundo Degradê e Textura */
.topo-banner-integrado {
  position: relative;
  background: linear-gradient(135deg, 
    #f8a5c2 0%, 
    #e991b8 25%, 
    #E91E63 50%, 
    #C2185B 75%, 
    #AD1457 100%);
  padding: 30px 0 40px;
  overflow: hidden;
}

/* Textura overlay estilo do site original */
.textura-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: 
    repeating-linear-gradient(45deg, 
      transparent, 
      transparent 10px, 
      rgba(255,255,255,0.03) 10px, 
      rgba(255,255,255,0.03) 20px),
    repeating-linear-gradient(-45deg, 
      transparent, 
      transparent 10px, 
      rgba(0,0,0,0.03) 10px, 
      rgba(0,0,0,0.03) 20px);
  mix-blend-mode: overlay;
}

/* Adiciona padrão de bolinhas sutis */
.topo-banner-integrado::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
  background-size: 20px 20px;
  opacity: 0.3;
}

/* Container com largura máxima */
.topo-banner-integrado .container {
  max-width: 1000px;
  margin: 0 auto;
  padding: 0 15px;
  position: relative;
  z-index: 2;
}

/* Logo Section */
.logo-section {
  text-align: center;
  margin-bottom: 20px;
}

.logo-principal {
  max-height: 80px;
  filter: drop-shadow(0 4px 8px rgba(0,0,0,0.3));
  transition: transform 0.3s ease;
}

.logo-principal:hover {
  transform: scale(1.05);
}

/* Banner Integrado - Limita altura */
.banner-integrado {
  max-height: 250px; /* Banner bem menor como solicitado */
  overflow: hidden;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
  background: rgba(255,255,255,0.05);
  backdrop-filter: blur(5px);
}

/* Ajusta o slider interno */
.banner-integrado .slider,
.banner-integrado .carousel,
.banner-integrado img {
  max-height: 250px !important;
  object-fit: cover;
}

/* Degradê suave na parte inferior para transição */
.fade-bottom {
  position: absolute;
  bottom: -1px;
  left: 0;
  right: 0;
  height: 120px;
  background: linear-gradient(180deg, 
    transparent 0%, 
    rgba(10,10,10,0.3) 30%,
    rgba(10,10,10,0.6) 60%,
    rgba(10,10,10,0.9) 90%,
    #0a0a0a 100%);
  pointer-events: none;
  z-index: 3;
}

/* Efeitos de luz */
.topo-banner-integrado::after {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle at 30% 20%, 
    rgba(255,255,255,0.15) 0%, 
    transparent 35%);
  animation: shimmer 20s linear infinite;
}

@keyframes shimmer {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Responsividade */
@media (max-width: 991px) {
  .topo-banner-integrado {
    padding: 20px 0 30px;
  }
  
  .banner-integrado {
    max-height: 200px;
  }
  
  .logo-principal {
    max-height: 65px;
  }
}

@media (max-width: 767px) {
  .topo-banner-integrado {
    padding: 15px 0 25px;
  }
  
  .banner-integrado {
    max-height: 150px;
    border-radius: 10px;
  }
  
  .logo-principal {
    max-height: 55px;
  }
  
  .fade-bottom {
    height: 40px;
  }
}

@media (max-width: 480px) {
  .banner-integrado {
    max-height: 120px;
  }
  
  .logo-principal {
    max-height: 45px;
  }
}

/* Garante que o conteúdo do banner respeite o container */
.banner-integrado > * {
  max-width: 100%;
  height: 100%;
}
</style>