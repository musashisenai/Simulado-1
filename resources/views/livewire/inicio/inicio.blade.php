<div>

    <div class="row g-3 mb-4">

        <div class="card bg-white shadow-sm border-0">
            <div class="card-header bg-white text-center">
                <h2 class="h5 mb-0">
                    Boas Vindas <span
                        class="text-primary">{{ auth()->check() ? auth()->user()->name : 'Visitante' }}</span>!
                </h2>
            </div>
        </div>

        <!-- Linha Principal dos Indicadores (5 Colunas) -->
        <div class="row g-3 mb-4 align-items-stretch">

            <!-- 1. Total de Produtos Cadastrados (Tipos) -->
            <div class="col-12 col-md-4 col-xl">
                <div class="card bg-white shadow-sm border-0 border-start border-4 border-primary h-100 p-2">
                    <div class="card-body py-2 d-flex flex-column justify-content-center">
                        <p class="text-secondary mb-1 small fw-semibold text-uppercase" style="letter-spacing: 0.5px;">
                            Produtos Cadastrados</p>
                        <div class="d-flex align-items-baseline">
                            <span class="fs-2 fw-bold text-dark me-2">{{ $total_produtos }}</span>
                            <span class="text-muted small">modelos</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Total Geral de Itens Físicos em Estoque -->
            <div class="col-12 col-md-4 col-xl">
                <div class="card bg-white shadow-sm border-0 border-start border-4 border-info h-100 p-2">
                    <div class="card-body py-2 d-flex flex-column justify-content-center">
                        <p class="text-secondary mb-1 small fw-semibold text-uppercase" style="letter-spacing: 0.5px;">
                            Total em Estoque</p>
                        <div class="d-flex align-items-baseline">
                            <span class="fs-2 fw-bold text-info me-2">{{ $total_itens_estoque }}</span>
                            <span class="text-muted small">unidades</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Estoque Normal (Adicionado de volta) -->
            <div class="col-12 col-md-4 col-xl">
                <div class="card bg-white shadow-sm border-0 border-start border-4 border-success h-100 p-2">
                    <div class="card-body py-2 d-flex flex-column justify-content-center">
                        <p class="text-secondary mb-1 small fw-semibold text-uppercase" style="letter-spacing: 0.5px;">
                            Estoque Normal</p>
                        <div class="d-flex align-items-baseline">
                            <span class="fs-2 fw-bold text-success me-2">{{ $estoque_normal }}</span>
                            <span class="text-muted small">itens</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Produtos em Estoque Mínimo (Alerta) -->
            <div class="col-12 col-sm-6 col-xl">
                <div class="card bg-white shadow-sm border-0 border-start border-4 border-warning h-100 p-2">
                    <div class="card-body py-2 d-flex flex-column justify-content-center">
                        <p class="text-secondary mb-1 small fw-semibold text-uppercase" style="letter-spacing: 0.5px;">
                            Estoque Mínimo</p>
                        <div class="d-flex align-items-baseline">
                            <span class="fs-2 fw-bold text-warning me-2">{{ $estoque_minimo }}</span>
                            <span class="text-muted small">alertas</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. Produtos com Estoque Baixo / Crítico (Perigo) -->
            <div class="col-12 col-sm-6 col-xl">
                <div class="card bg-white shadow-sm border-0 border-start border-4 border-danger h-100 p-2">
                    <div class="card-body py-2 d-flex flex-column justify-content-center">
                        <p class="text-secondary mb-1 small fw-semibold text-uppercase" style="letter-spacing: 0.5px;">
                            Estoque Crítico</p>
                        <div class="d-flex align-items-baseline">
                            <span class="fs-2 fw-bold text-danger me-2">{{ $estoque_baixo }}</span>
                            <span class="text-muted small">zerados</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
