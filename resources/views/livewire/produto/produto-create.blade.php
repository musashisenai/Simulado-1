<div>
    <div class="container">

        <div class="card position-absolute top-50 start-50 translate-middle">
            <div class="card-body ">

                <form class="row g-3" wire:submit.prevent='store'>
                    <div class="d-flex align-items-center ">
                        <h2 class="mb-0">Cadastrar Produtos</h2>
                    </div>
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Nome" wire:model='nome'>
                    </div>
                    <div class="col-12">
                        <label for="obs" class="form-label">Observação</label>
                        <input type="text" class="form-control" id="obs" wire:model='obs'>
                    </div>
                    <div class="col-12">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" class="form-control" id="valor" placeholder="R$" wire:model='valor'>
                    </div>
                    <div class="col-md-12">
                        <label for="qtd_estoque" class="form-label">Qtd. Estoque</label>
                        <input type="text" class="form-control" id="qtd_estoque" wire:model='qtd_estoque'>
                    </div>

                    <div class="col-md-12">
                        <label for="qtd_minima" class="form-label">Qtd. Minima</label>
                        <input type="text" class="form-control" id="qtd_minima" wire:model='qtd_minima'>
                    </div>

            </div>
            <div class="col-12 m-3">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a class="btn btn-secondary" href="{{ route('produto.index') }}"> Voltar </a>
            </div>
            </form>
        </div>
    </div>
</div>
