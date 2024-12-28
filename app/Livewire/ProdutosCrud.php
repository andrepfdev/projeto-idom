<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;
use App\Models\Fornecedor;
use Livewire\WithPagination;

class ProdutosCrud extends Component
{
    use WithPagination;

    public $nome, $preco, $descricao, $fornecedor_id;
    public $fornecedores = [];
    public  $isOpen = false;
    public $editing = false;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'descricao' => 'nullable|string|max:1000',
        'fornecedor_id' => 'required|exists:fornecedores,id',
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->fornecedores = Fornecedor::all();
        // $this->produtos = Produto::with('fornecedor')->get();
    }

    public function save()
    {   
        $this->validate();

        Produto::create([
            'nome' => $this->nome,
            'preco' => $this->preco,
            'descricao' => $this->descricao,
            'fornecedor_id' => $this->fornecedor_id,
        ]);

        $this->reset(); // Reseta os campos do formulário
        $this->loadData();

        session()->flash('message', 'Produto salvo com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        $this->nome = $produto->nome;
        $this->preco = $produto->preco;
        $this->descricao = $produto->descricao;
        $this->fornecedor_id = $produto->fornecedor_id;

        $this->editing = true;
        $this->isOpen = true;
    }
    
    public function delete($id)
    {
        Produto::destroy($id);
        session()->flash('message', 'Produto deletado com sucesso!');
        $this->loadData();
    }
    public function render()
    {
        $produtos = Produto::get();
        return view('livewire.produtos-crud', ['produtos' => $produtos]);
    }
}
