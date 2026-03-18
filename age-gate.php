<?php
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
?>

<!-- MODAL +18 -->
<div id="age-overlay">
    <div class="age-modal">

        <div class="age-modal__badge">18+</div>

        <h2>AVISO IMPORTANTE</h2>
        <h3>Acesso Restrito a Maiores de 18 Anos</h3>

        <p>Este site contém conteúdo destinado exclusivamente a pessoas maiores de 18 anos.</p>

        <ul>
            <li>Possui <strong>18 anos ou mais</strong></li>
            <li>Está acessando por <strong>livre e espontânea vontade</strong></li>
            <li>Compromete-se a <strong>não permitir acesso de menores</strong></li>
            <li>Reconhece que este site é apenas uma <strong>plataforma de anúncios</strong>, sem intermediação de serviços</li>
        </ul>

        <p class="age-modal__terms-line">
            Ao clicar em "Entrar", você confirma que leu e concorda com estes termos e com nossos
            <a href="#" id="open-terms">Termos de Uso</a>.
        </p>

        <div class="buttons">
            <button id="btn-accept">Entrar</button>
            <button id="btn-deny">Sair</button>
        </div>

    </div>
</div>

<!-- MODAL TERMOS DE USO -->
<div id="terms-overlay">
    <div class="terms-modal">
        <button id="close-terms">&times;</button>
        <h2>Termos de Uso</h2>
        <div class="terms-content">

            <h4>1. Aceitação dos Termos</h4>
            <p>Ao acessar e utilizar o site Vip Luxúria, o usuário declara ter lido, compreendido e aceito integralmente os presentes Termos de Uso, bem como todas as leis e regulamentos aplicáveis. Caso não concorde com qualquer condição, o usuário deve interromper imediatamente o uso do site.</p>

            <h4>2. Acesso Restrito (Maiores de 18 Anos)</h4>
            <p>O acesso ao site é permitido exclusivamente a pessoas maiores de 18 anos. Ao acessar a plataforma, o usuário declara, sob as penas da lei, que: possui 18 anos ou mais; está acessando o conteúdo por livre vontade; não permitirá o acesso de menores ao conteúdo.</p>

            <h4>3. Natureza da Plataforma</h4>
            <p>O Vip Luxúria é uma plataforma de classificados online de conteúdo adulto, destinada exclusivamente à divulgação de perfis. A plataforma <strong>NÃO</strong> intermedeia serviços, <strong>NÃO</strong> participa de negociações, <strong>NÃO</strong> realiza agendamentos e <strong>NÃO</strong> recebe pagamentos em nome de terceiros. Toda interação entre usuários e anunciantes ocorre fora da plataforma e é de responsabilidade exclusiva das partes.</p>

            <h4>4. Cadastro e Responsabilidade do Anunciante</h4>
            <p>Ao se cadastrar, o anunciante declara que é maior de 18 anos; todas as pessoas exibidas nos conteúdos são maiores de 18 anos; possui autorização para uso de imagem; as informações fornecidas são verdadeiras. O site poderá solicitar, a qualquer momento, documento de identificação, comprovação de idade ou validação de identidade. Perfis que não atenderem poderão ser removidos sem aviso prévio.</p>

            <h4>5. Conteúdo Proibido</h4>
            <p>É expressamente proibido: publicar conteúdo envolvendo menores de idade; divulgar material ilegal ou não autorizado; utilizar imagens de terceiros sem consentimento; praticar exploração sexual, tráfico ou qualquer atividade ilícita; inserir informações falsas ou enganosas. Qualquer violação resultará na remoção imediata do conteúdo e poderá ser comunicada às autoridades competentes.</p>

            <h4>6. Moderação e Remoção de Conteúdo</h4>
            <p>O VIP Luxúria reserva-se o direito de remover anúncios sem aviso prévio, suspender ou excluir contas e solicitar comprovação de identidade, especialmente em casos de suspeita de envolvimento de menores, atividade ilegal ou descumprimento destes termos.</p>

            <h4>7. Denúncia de Irregularidades</h4>
            <p>Usuários podem denunciar conteúdos suspeitos ou ilegais através dos canais disponibilizados na plataforma. Denúncias envolvendo menores de idade terão prioridade máxima e serão tratadas com urgência.</p>

            <h4>8. Limitação de Responsabilidade</h4>
            <p>O VIP Luxúria não se responsabiliza pela veracidade dos anúncios, condutas de usuários ou anunciantes, ou qualquer dano decorrente de interações realizadas fora da plataforma. O uso do site é de inteira responsabilidade do usuário.</p>

            <h4>9. Privacidade e Dados</h4>
            <p>Os dados coletados serão utilizados conforme a legislação vigente, incluindo a Lei Geral de Proteção de Dados (LGPD). O usuário concorda com a coleta e uso de dados necessários para funcionamento da plataforma.</p>

            <h4>10. Alterações dos Termos</h4>
            <p>O VIP Luxúria poderá alterar estes Termos a qualquer momento, sendo responsabilidade do usuário revisá-los periodicamente.</p>

            <h4>11. Legislação Aplicável</h4>
            <p>Este Termo será regido pelas leis da República Federativa do Brasil. Fica eleito o foro da comarca do domicílio do responsável pela plataforma para dirimir quaisquer dúvidas oriundas deste documento.</p>

            <h4>12. Disposições Finais</h4>
            <p>A tolerância quanto ao descumprimento de qualquer cláusula não implicará em renúncia de direitos. Caso qualquer disposição seja considerada inválida, as demais permanecerão em pleno vigor.</p>

        </div>
        <button id="close-terms-bottom">Fechar</button>
    </div>
</div>

<style>
/* ── OVERLAY IDADE ── */
#age-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.92);
    backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
}

.age-modal {
    background: #111;
    color: #fff;
    padding: 36px 32px;
    max-width: 460px;
    width: 92%;
    border-radius: 14px;
    text-align: center;
    border: 1px solid #2a2a2a;
    box-shadow: 0 0 60px rgba(209, 0, 108, 0.15);
}

.age-modal__badge {
    display: inline-block;
    background: #d1006c;
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1px;
    padding: 4px 12px;
    border-radius: 20px;
    margin-bottom: 16px;
}

.age-modal h2 {
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1.5px;
    color: #d1006c;
    text-transform: uppercase;
    margin: 0 0 6px;
}

.age-modal h3 {
    font-size: 20px;
    font-weight: 600;
    margin: 0 0 16px;
    color: #fff;
}

.age-modal p {
    font-size: 14px;
    color: #bbb;
    line-height: 1.6;
    margin-bottom: 14px;
}

.age-modal ul {
    text-align: left;
    padding: 0 0 0 18px;
    margin: 0 0 16px;
    color: #bbb;
    font-size: 14px;
    line-height: 1.8;
}

.age-modal ul strong {
    color: #fff;
}

.age-modal__terms-line {
    font-size: 12px;
    color: #777;
    margin-bottom: 24px;
}

.age-modal__terms-line a {
    color: #d1006c;
    text-decoration: underline;
    cursor: pointer;
}

.age-modal .buttons {
    display: flex;
    gap: 12px;
    justify-content: center;
}

.age-modal button {
    padding: 13px 28px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 600;
    transition: opacity 0.2s;
    flex: 1;
}

.age-modal button:hover { opacity: 0.85; }

#btn-accept { background: #d1006c; color: #fff; }
#btn-deny   { background: #2a2a2a; color: #999; }

/* ── OVERLAY TERMOS ── */
#terms-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.95);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 999999;
    padding: 20px;
}

#terms-overlay.active {
    display: flex;
}

.terms-modal {
    background: #111;
    color: #ccc;
    padding: 32px;
    max-width: 640px;
    width: 100%;
    border-radius: 14px;
    border: 1px solid #2a2a2a;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    position: relative;
}

.terms-modal h2 {
    color: #fff;
    font-size: 20px;
    margin: 0 0 20px;
    text-align: center;
    flex-shrink: 0;
}

.terms-content {
    overflow-y: auto;
    flex: 1;
    padding-right: 8px;
    scrollbar-width: thin;
    scrollbar-color: #d1006c #1a1a1a;
}

.terms-content h4 {
    color: #d1006c;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 20px 0 6px;
}

.terms-content h4:first-child { margin-top: 0; }

.terms-content p {
    font-size: 13px;
    line-height: 1.7;
    color: #aaa;
    margin: 0 0 10px;
}

.terms-content strong { color: #fff; }

#close-terms {
    position: absolute;
    top: 14px;
    right: 16px;
    background: none;
    border: none;
    color: #666;
    font-size: 22px;
    cursor: pointer;
    line-height: 1;
    padding: 0;
}

#close-terms:hover { color: #fff; }

#close-terms-bottom {
    margin-top: 20px;
    background: #d1006c;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 12px 28px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    align-self: center;
    flex-shrink: 0;
    transition: opacity 0.2s;
}

#close-terms-bottom:hover { opacity: 0.85; }
</style>

<script>
(function () {
    const overlay      = document.getElementById('age-overlay');
    const termsOverlay = document.getElementById('terms-overlay');
    const btnAccept    = document.getElementById('btn-accept');
    const btnDeny      = document.getElementById('btn-deny');
    const openTerms    = document.getElementById('open-terms');
    const closeTerms   = document.getElementById('close-terms');
    const closeTermsB  = document.getElementById('close-terms-bottom');

    if (!overlay) return;

    // já aceitou antes
    if (localStorage.getItem('ageAccepted') === 'true') {
        overlay.style.display = 'none';
        return;
    }

    document.body.style.overflow = 'hidden';

    // aceitar
    btnAccept.addEventListener('click', () => {
        localStorage.setItem('ageAccepted', 'true');
        document.body.style.overflow = '';
        overlay.remove();
    });

    // sair
    btnDeny.addEventListener('click', () => {
        window.location.href = 'https://www.google.com.br';
    });

    // abrir termos
    openTerms.addEventListener('click', (e) => {
        e.preventDefault();
        termsOverlay.classList.add('active');
    });

    // fechar termos
    [closeTerms, closeTermsB].forEach(btn => {
        btn.addEventListener('click', () => {
            termsOverlay.classList.remove('active');
        });
    });

    // fechar termos clicando fora
    termsOverlay.addEventListener('click', (e) => {
        if (e.target === termsOverlay) {
            termsOverlay.classList.remove('active');
        }
    });
})();
</script>