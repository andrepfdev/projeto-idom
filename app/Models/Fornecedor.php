<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use HasFactory;

    // Nome correto da tabela
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'contato', 'endereco'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
