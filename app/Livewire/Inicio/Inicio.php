<?php

namespace App\Livewire\Inicio;

use App\Models\Produto;
use Livewire\Component;

class Inicio extends Component
{
    public function render()
    {
        // 1. Quantidade de tipos de produtos cadastrados (ex: 3 produtos diferentes)
        $total_produtos = Produto::count();
        
        // 2. Soma física de todos os itens guardados no estoque (ex: 150 itens no total)
        $total_itens_estoque = Produto::sum('qtd_estoque');
        
        // 3. Contagens de status (regras que já configuramos)
        $estoque_baixo = Produto::where('qtd_estoque', '<=', 0)->count();
        
        $estoque_minimo = Produto::where('qtd_estoque', '>', 0)
                                 ->whereColumn('qtd_estoque', '<=', 'qtd_minima')
                                 ->count();
                                 
        $estoque_normal = Produto::whereColumn('qtd_estoque', '>', 'qtd_minima')
                                 ->count();

        // Envia todas as variáveis para a tela inicial
        return view('livewire.inicio.inicio', compact(
            'total_produtos',
            'total_itens_estoque',
            'estoque_baixo',
            'estoque_minimo',
            'estoque_normal'
        ));
    }
}
