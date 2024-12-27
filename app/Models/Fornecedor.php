<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'contato', 'endereço'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
