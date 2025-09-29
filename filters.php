<!-- Seção de Filtros Atualizada -->
<div class="filters-section">
    <div class="container">
        <!-- Linha Superior dos Filtros -->
        <div class="filters-row-top">
            <!-- Filtro Principal - Todas -->
            <a href="javascript:carregaAnunciantes('Todas')" class="filter-btn filter-main">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                <span>Todas</span>
            </a>

            <!-- Filtro em destaque - 24 Horas -->
            <a href="javascript:carregaAnunciante24Horas('Sim')" class="filter-btn filter-24h">
                <i class="bi bi-clock-fill"></i>
                <span class="filter-24h-text">
                    <span class="line1">24 HORAS</span>
                    <span class="line2">Disponível agora</span>
                </span>
                <span class="badge-hot">HOT</span>
            </a>

            <!-- Filtros de características -->
            <a href="javascript:carregaAnunciantes('Loiras')" class="filter-btn">
                <i class="bi bi-star-fill"></i>
                <span>Loiras</span>
            </a>

            <a href="javascript:carregaAnunciantes('Morenas')" class="filter-btn">
                <i class="bi bi-moon-fill"></i>
                <span>Morenas</span>
            </a>

            <a href="javascript:carregaAnunciantes('Ruivas')" class="filter-btn">
                <i class="bi bi-fire"></i>
                <span>Ruivas</span>
            </a>

            <a href="javascript:carregaAnunciantes('Mulatas')" class="filter-btn">
                <i class="bi bi-sun-fill"></i>
                <span>Mulatas</span>
            </a>
        </div>

        <!-- Linha Inferior dos Filtros -->
        <div class="filters-row-bottom">
            <a href="javascript:carregaAnuncianteComLocal('Sim')" class="filter-btn filter-secondary">
                <i class="bi bi-house-door"></i>
                <span>Com Local</span>
            </a>

            <a href="javascript:carregaAnuncianteVideo('Sim')" class="filter-btn filter-secondary">
                <i class="bi bi-play-circle-fill"></i>
                <span>Com Vídeo</span>
            </a>

            <a href="javascript:carregaSexoVirtual('Sim')" class="filter-btn filter-secondary">
                <i class="bi bi-camera-video-fill"></i>
                <span>Sexo Virtual</span>
            </a>

            <div class="dropdown filter-dropdown">
                <button class="filter-btn filter-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Outras Cidades</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <?php if(isset($conexao)) { geraOpcoesCidades($conexao); } ?>
                </ul>
            </div>
        </div>
    </div>
</div>