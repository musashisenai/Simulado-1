<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoCreate extends Component
{

    public $nome;
    public $obs;
    public $valor;
    public $validade;
    public $qtd_estoque;
    public $qtd_minima;


    public function store()
    {
        $produto = Produto::create([
            'nome' => $this->nome,
            'obs' => $this->obs,
            'valor' => $this->valor,
            'validade' => $this->validade,
            'qtd_estoque' => $this->qtd_estoque,
            'qtd_minima' => $this->qtd_minima
        ]);
        session()->flash('success', 'Produto cadastrado');

        return redirect()->to('produto.index');
    }
    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}
