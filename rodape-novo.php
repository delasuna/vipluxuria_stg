<!-- Rodapé Premium -->
<footer class="rodape-premium">
    <div class="container">
        <div class="row">
            <!-- Coluna 1: Menu -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="rodape-titulo">Institucional</h5>
                <ul class="rodape-lista">
                   
                    <li><a href="/vip-luxuria.php">Sobre</a></li>
                    <li><a href="/vip-blog">Blog</a></li>
                    <li><a href="/duvidas.php">Dúvidas</a></li>
                    <li><a href="/dicas.php">Dicas</a></li>
                    <li><a href="/como-anunciar/">Anuncie</a></li>
                </ul>
            </div>

            <!-- Coluna 2: Categorias -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="rodape-titulo">Categorias</h5>
                <ul class="rodape-lista">
                    <li><a href="javascript:carregaAnunciantes('Mulheres')">Mulheres</a></li>
                    <li><a href="javascript:carregaAnunciantes('Transex')">Transex</a></li>
                    <li><a href="javascript:carregaAnunciantes('Casais')">Casais</a></li> 
                    <li><a href="javascript:carregaAnunciante24Horas('Sim')">24 Horas</a></li>
                </ul>
            </div>

            <!-- Coluna 3: Redes Sociais -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="rodape-titulo">Redes Sociais</h5>
                <div class="rodape-contato">
                    <div class="redes-sociais">
                        <a href="https://www.facebook.com/vipluxuria" target="_blank" title="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/vipluxuria" target="_blank" title="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://twitter.com/vipluxuria" target="_blank" title="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="https://bsky.app/profile/vipluxuria.bsky.social" target="_blank" title="Bluesky">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 10.8c-1.087-2.114-4.046-6.053-6.798-7.995C2.566.944 1.561 1.266.902 1.565.139 1.908 0 3.08 0 3.768c0 .69.378 5.65.624 6.479.815 2.736 3.713 3.66 6.383 3.364.136-.02.275-.039.415-.056-.138.022-.276.04-.415.056-3.912.58-7.387 2.005-2.83 7.078 5.013 5.19 6.87-1.113 7.823-4.308.953 3.195 2.05 9.271 7.733 4.308 4.267-4.308 1.172-6.498-2.74-7.078a8.741 8.741 0 0 1-.415-.056c.14.017.279.036.415.056 2.67.297 5.568-.628 6.383-3.364.246-.828.624-5.79.624-6.478 0-.69-.139-1.861-.902-2.206-.659-.298-1.664-.62-4.3 1.24C16.046 4.748 13.087 8.687 12 10.8Z"/>
                            </svg>
                        </a>
                    </div>
                    
                  
                </div>
            </div>

            <!-- Coluna 4: Newsletter -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="rodape-titulo">Newsletter</h5>
                <p class="newsletter-texto">
                    Receba novidades e promoções exclusivas
                </p>
                <form class="newsletter-form-rodape">
                    <input type="email" placeholder="Seu e-mail" required>
                    <button type="submit">
                        <i class="bi bi-send"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Seção de Parceiros com Logos -->
        <div class="parceiros-section">
            <h6 class="parceiros-titulo">Nossos Parceiros</h6>
            <div class="parceiros-logos">
                <a href="https://www.hotelexample.com" target="_blank" class="parceiro-logo">
                    <img src="/imagens/parceiros/hotel-plaza.png" alt="Hotel Plaza" />
                </a>
                <a href="https://www.motelexample.com" target="_blank" class="parceiro-logo">
                    <img src="/imagens/parceiros/motel-vip.png" alt="Motel VIP" />
                </a>
                <a href="https://www.restaurantexample.com" target="_blank" class="parceiro-logo">
                    <img src="/imagens/parceiros/restaurante-luxo.png" alt="Restaurante Luxo" />
                </a>
                <a href="https://www.clubexample.com" target="_blank" class="parceiro-logo">
                    <img src="/imagens/parceiros/club-elite.png" alt="Club Elite" />
                </a>
            </div>
        </div>

        <hr class="rodape-divisor">

        <!-- Copyright -->
        <div class="rodape-copyright">
            <p>&copy; Desde 2008 - Vip Luxúria - Todos os direitos reservados</p>
            <p class="aviso-legal">
                Este site é destinado apenas para maiores de 18 anos. 
  
            </p>
        </div>
    </div>
</footer>

<style>
/* Rodapé Premium com Textura de Couro */
.rodape-premium {
    background: url('/imagens/estrutura/textura-couro-preto.jpg') center/cover,
                linear-gradient(180deg, #1a1a1a 0%, #0a0a0a 100%);
    background-blend-mode: multiply;
    border-top: 1px solid rgba(233, 30, 99, 0.2);
    padding: 60px 0 30px;
    margin-top: 0;
    position: relative;
}

/* Overlay sutil */
.rodape-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(10, 10, 10, 0.7);
    pointer-events: none;
}

.rodape-premium .container {
    position: relative;
    z-index: 1;
}

.rodape-titulo {
    color: #E91E63;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.rodape-titulo::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 2px;
    background: linear-gradient(90deg, #E91E63, transparent);
}

.rodape-lista {
    list-style: none;
    padding: 0;
    margin: 0;
}

.rodape-lista li {
    margin-bottom: 12px;
}

.rodape-lista a {
    color: #999;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    position: relative;
}

.rodape-lista a:hover {
    color: #E91E63;
    padding-left: 5px;
}

/* Redes Sociais */
.rodape-contato {
    color: #999;
    font-size: 14px;
}

.horario-rodape {
    color: #666;
    font-size: 13px;
}

.redes-sociais {
    display: flex;
    gap: 12px;
}

.redes-sociais a {
    width: 40px;
    height: 40px;
    background: rgba(233, 30, 99, 0.1);
    border: 1px solid rgba(233, 30, 99, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #E91E63;
    transition: all 0.3s ease;
}

.redes-sociais a:hover {
    background: #E91E63;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(233, 30, 99, 0.4);
}

/* Newsletter */
.newsletter-texto {
    color: #999;
    font-size: 13px;
    margin-bottom: 15px;
}

.newsletter-form-rodape {
    display: flex;
    max-width: 100%;
    position: relative;
}

.newsletter-form-rodape input {
    flex: 1;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(233, 30, 99, 0.2);
    color: white;
    padding: 10px 15px;
    border-radius: 25px;
    font-size: 14px;
}

.newsletter-form-rodape input::placeholder {
    color: #666;
}

.newsletter-form-rodape button {
    position: absolute;
    right: 3px;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(90deg, #E91E63, #AD1457);
    border: none;
    color: white;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.newsletter-form-rodape button:hover {
    background: linear-gradient(90deg, #AD1457, #E91E63);
}

/* Seção de Parceiros com Logos */
.parceiros-section {
    padding: 40px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.parceiros-titulo {
    color: #666;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
    margin-bottom: 25px;
}

.parceiros-logos {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 40px;
    flex-wrap: wrap;
}

.parceiro-logo {
    opacity: 0.6;
    transition: all 0.3s ease;
    filter: grayscale(100%);
}

.parceiro-logo:hover {
    opacity: 1;
    filter: grayscale(0%);
    transform: scale(1.1);
}

.parceiro-logo img {
    max-height: 50px;
    max-width: 150px;
    width: auto;
    height: auto;
}

/* Divisor */
.rodape-divisor {
    border: none;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    margin: 30px 0;
}

/* Copyright */
.rodape-copyright {
    text-align: center;
    color: #666;
    font-size: 13px;
}

.rodape-copyright p {
    margin: 5px 0;
}

.aviso-legal {
    color: #555;
    font-size: 12px;
    margin-top: 10px;
}

/* Responsividade */
@media (max-width: 768px) {
    .parceiros-logos {
        gap: 20px;
    }
    
    .parceiro-logo img {
        max-height: 40px;
        max-width: 120px;
    }
    
    .redes-sociais {
        justify-content: center;
        margin-top: 15px;
    }
}

@media (max-width: 575px) {
    .rodape-premium {
        padding: 40px 0 20px;
    }
    
    .parceiros-section {
        padding: 30px 0;
    }
}
</style>