<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'preco',
        'descrição',
        'fornecedor_id'
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'fornecedor_id' => 'integer'
    ];

    public function fornecedor()    {
        return $this->belongsTo(Fornecedor::class);
    }
}
