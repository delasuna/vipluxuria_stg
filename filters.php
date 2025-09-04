<div class="container my-4">

    <!-- Linha 1: Busca -->
    <div class="row mb-3">
        <div class="col-12 col-md-8 mx-auto">
            <form class="d-flex form-busca-nome" action="/mulheres-acompanhantes-porto-alegre-poa/" method="post">
                <div class="input-group">
                    <input
                        type="search"
                        class="form-control bg-black"
                        placeholder="Buscar por nome..."
                        name="nome"
                        onfocus="this.value=''">
                    <button class="btn btn-pink text-white px-4" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Linha 2: Filtros principais -->
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-center flex-wrap gap-2">
            <button class="btn btn-pink" onclick="window.location.href='/mulheres-acompanhantes-porto-alegre-poa/'">Todas</button>
            <button class="btn btn-dark text-white" onclick="carregaAnunciantes('Loiras')">Loiras</button>
            <button class="btn btn-dark text-white" onclick="carregaAnunciantes('Morenas')">Morenas</button>
            <button class="btn btn-dark text-white" onclick="carregaAnunciantes('Ruivas')">Ruivas</button>
            <button class="btn btn-dark text-white" onclick="carregaAnunciantes('Mulatas')">Mulatas</button>
            <button class="btn btn-dark text-white" onclick="window.location.href='/transex-porto-alegre-poa/'">Transex</button>
            <div class="dropdown">
                <button class="btn btn-dark text-white dropdown-toggle" type="button" id="outrasCidadesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Outras Cidades
                </button>
                <ul class="dropdown-menu" aria-labelledby="outrasCidadesDropdown">
                    <?php geraOpcoesCidades($conexao); ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Linha 3: Filtros adicionais -->
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-wrap gap-2">
            <button class="btn btn-pink" onclick="carregaAnuncianteComLocal('S')">
                <i class="bi bi-geo-alt-fill"></i> Com Local<br>
                <small class="fw-light">Disponível agora</small>
            </button>
            <button class="btn btn-dark text-white" onclick="carregaAnunciantes('Verificadas')">
                <i class="bi bi-check-circle"></i> Verificadas
            </button>
            <button class="btn btn-dark text-white" onclick="carregaAnunciante24Horas('S')">
                <i class="bi bi-clock"></i> 24 Horas
            </button>
            <button class="btn btn-dark text-white" onclick="carregaAnuncianteVideo('S')">
                <i class="bi bi-camera-video"></i> Com Vídeo
            </button>
            <button class="btn btn-dark text-white" onclick="carregaSexoVirtual('S')">
                <i class="bi bi-chat-dots"></i> Virtual
            </button>
            <button class="btn btn-dark text-white" onclick="window.location.href='/casais-e-homens-porto-alegre-poa/'">
                <i class="bi bi-people-fill"></i> Casais
            </button>
        </div>
    </div>

</div>
