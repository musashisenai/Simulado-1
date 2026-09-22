<?php

namespace App\Livewire\Movimentacao;

use App\Models\Movimentacao;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use Livewire\Component;

class MovimentacaoCreate extends Component
{

    public $produtos;
    public $idProdutoSelecionado;
    public $tipo = 'saida';
    public $quantidade_movimentada;
    public $data_movimentacao;
    public $alertaEstoqueBaixo;

    public function mount(){
        $this->produtos = Produto::orderBy('nome')->get();
        $this->data_movimentacao = now()->format('Y-m-d');
    }

    public function store(){
        $produto = Produto::find($this->idProdutoSelecionado);

        if($produto->qtd_estoque < $this->quantidade_movimentada && $this->tipo == 'saida'){
            $this->addError('quantidade_movimentada', 'Quantidade em estoque insuficiente');
            return;
        }

        if($this->tipo == 'entrada'){
            $produto->qtd_estoque += $this->quantidade_movimentada;
        } else{
            $produto->qtd_estoque -= $this->quantidade_movimentada;
        }
        
        Movimentacao::create([
            'quantidade'=> $this->quantidade_movimentada,
            'data_movimentacao'=> $this->data_movimentacao,
            'tipo' => $this->tipo,
            'produto_id'=> $this-> idProdutoSelecionado,
            'user_id' => Auth::check() ? Auth::id() : 1,
        ]);

        $produto->update();

        $produto->refresh();
        if($produto->qtd_estoque < $produto->qtd_minima){
            $this->alertaEstoqueBaixo = "ALERTA: Estoque baixo para {$produto->nome}. Quantidade Atual: {$produto->qtd_estoque}";
        } else{
            $this->alertaEstoqueBaixo ="";
        }

        session()->flash('message', 'Movimentação registrada com sucesso!');
        $this->reset(['quantidade_movimentada', 'tipo']);
        $this->produtos = Produto::orderby('nome')->get();
        
    }

        public function render()
    {
        // 1. Total Geral de Produtos Cadastrados
        $total_produtos = Produto::count();
        
        // 2. Estoque Baixo/Crítico (Igual ou menor que zero)
        $estoque_baixo = Produto::where('qtd_estoque', '<=', 0)->count();
        
        // 3. Estoque Mínimo/Alerta (Acima de zero, mas menor ou igual à quantidade mínima)
        $estoque_minimo = Produto::where('qtd_estoque', '>', 0)
                                 ->whereColumn('qtd_estoque', '<=', 'qtd_minima')
                                 ->count();
                                 
        // 4. Estoque Normal (Acima da quantidade mínima)
        $estoque_normal = Produto::whereColumn('qtd_estoque', '>', 'qtd_minima')
                                 ->count();

        // Envia todas as contagens direto para a View do formulário
        return view('livewire.movimentacao.movimentacao-create', compact(
            'total_produtos',
            'estoque_baixo',
            'estoque_minimo',
            'estoque_normal'
        ));
    }
}

