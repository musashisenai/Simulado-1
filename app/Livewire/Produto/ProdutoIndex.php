<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoIndex extends Component
{

    public $search = '';

    public function delete($id)
    {
        $produto = Produto::find($id);
        if ($produto != null) {
            $produto->delete();
            session()->flash('success', 'Excluido');
        }
    }
    public function render()
    {
        return view('livewire.produto.produto-index');
    }
}
