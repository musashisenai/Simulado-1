<div class="mt-5 ">
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <input type="text" wire:model.live='search' placeholder="pesquisar..." class="form-control mb-4">
        <table class="table table-hover ">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Obs</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Qtd. Estoque</th>
                    <th scope="col">Qtd. Minima</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produto as $p)
                    <tr>
                        <th scope="produtos">{{ $p->id }}</th>
                        <td>{{ $p->nome }}</td>
                        <td>{{ $p->obs }}</td>
                        <td>{{ $p->valor }}</td>
                        <td>{{ $p->qtd_estoque }}</td>
                        <td>{{ $p->qtd_minima }}</td>
                        <td>
                            <a href="{{ route('produto.edit', ['id' => $p->id]) }}"
                                class="btn btn-sm btn-info">Editar</a>

                            <button wire:click='delete({{ $p->id }})'
                                class="btn btn-sm btn-danger">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>