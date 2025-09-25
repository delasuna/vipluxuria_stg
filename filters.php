<!-- Seção de Filtros Atualizada -->
<div class="filters-section">
    <div class="container">
        <div class="filters-wrapper">
            <!-- Filtro Principal - Todas (com destaque) -->
            <a href="javascript:carregaAnunciantes('Todas')" class="filter-btn filter-main">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                <span>Todas</span>
            </a>

            <!-- Filtro em destaque - 24 Horas -->
            <a href="javascript:carregaAnunciante24Horas('Sim')" class="filter-btn filter-destaque">
                <i class="bi bi-clock-fill"></i>
                <span>24 HORAS
                    Disponível AGORA</span>
                <span class="badge-novo">HOT</span>
            </a>

            <!-- Outros Filtros -->
            <a href="javascript:carregaAnunciantes('Loiras')" class="filter-btn">
                <i class="bi bi-star-fill"></i>
                <span>Loiras</span>
            </a>

            <div class="dropdown filter-dropdown">
                <button class="filter-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Outras Cidades</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <?php if(isset($conexao)) { geraOpcoesCidades($conexao); } ?>
                </ul>
            </div>

            <a href="javascript:carregaAnuncianteVideo('Sim')" class="filter-btn">
                <i class="bi bi-play-circle-fill"></i>
                <span>Com Vídeo</span>
            </a>

            <a href="javascript:carregaSexoVirtual('Sim')" class="filter-btn">
                <i class="bi bi-camera-video-fill"></i>
                <span>Sexo Virtual</span>
            </a>

            <!-- Com Local - menos destaque -->
            <a href="javascript:carregaAnuncianteComLocal('Sim')" class="filter-btn filter-secondary">
                <i class="bi bi-house-door"></i>
                <span>Com Local</span>
            </a>
        </div>
    </div>
</div>

<style>
/* Seção de Filtros Redesenhada */
.filters-section {
    background: linear-gradient(180deg, rgba(10,10,10,0.95) 0%, var(--bg-black) 100%);
    padding: 20px 0;
    border-bottom: 1px solid rgba(233, 30, 99, 0.1);
    margin-bottom: 30px;
}

.filters-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

/* Botão de Filtro Base */
.filter-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    background: rgba(44, 44, 44, 0.8);
    border: 1px solid rgba(233, 30, 99, 0.2);
    border-radius: 25px;
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
    font-weight: 500;
    position: relative;
}

.filter-btn:hover {
    background: rgba(233, 30, 99, 0.2);
    border-color: var(--rosa-primary);
    color: white;
    transform: translateY(-2px);
}

.filter-btn i {
    font-size: 16px;
}

/* Filtro Principal - Todas */
.filter-main {
    background: linear-gradient(135deg, rgba(233, 30, 99, 0.2), rgba(173, 20, 87, 0.2));
    border-color: var(--rosa-primary);
    color: white;
    font-weight: 600;
}

.filter-main:hover {
    background: linear-gradient(135deg, var(--rosa-primary), var(--rosa-dark));
    box-shadow: 0 4px 15px rgba(233, 30, 99, 0.4);
}

/* Filtro em Destaque - 24 Horas */
.filter-destaque {
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.2), rgba(46, 125, 50, 0.2));
    border-color: #4CAF50;
    color: white;
    font-weight: 600;
}

.filter-destaque:hover {
    background: linear-gradient(135deg, #4CAF50, #2E7D32);
    box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
}

/* Badge HOT */
.badge-novo {
    position: absolute;
    top: -8px;
    right: -5px;
    background: linear-gradient(135deg, #ff6b6b, #ff4444);
    color: white;
    padding: 2px 8px;
    border-radius: 10px;
    font-size: 10px;
    font-weight: 700;
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* Filtro Secundário - Com Local */
.filter-secondary {
    opacity: 0.8;
    font-size: 13px;
}

.filter-secondary:hover {
    opacity: 1;
}

/* Dropdown de Cidades */
.filter-dropdown .dropdown-toggle::after {
    margin-left: 5px;
}

.filter-dropdown .dropdown-menu {
    background: var(--card-gray);
    border: 1px solid rgba(233, 30, 99, 0.2);
    max-height: 300px;
    overflow-y: auto;
}

.filter-dropdown .dropdown-item {
    color: rgba(255,255,255,0.8);
    transition: all 0.3s ease;
}

.filter-dropdown .dropdown-item:hover {
    background: rgba(233, 30, 99, 0.2);
    color: white;
}

/* Responsividade */
@media (max-width: 768px) {
    .filters-section {
        padding: 15px 0;
    }
    
    .filters-wrapper {
        gap: 8px;
        padding: 0 10px;
    }
    
    .filter-btn {
        padding: 8px 14px;
        font-size: 13px;
    }
    
    .filter-btn i {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .filter-btn span {
        display: none;
    }
    
    .filter-btn {
        padding: 10px;
        min-width: 45px;
        justify-content: center;
    }
    
    .filter-btn i {
        font-size: 18px;
    }
    
    /* Mostrar texto apenas nos principais */
    .filter-main span,
    .filter-destaque span {
        display: inline;
    }
}
</style>