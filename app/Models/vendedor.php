<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendedor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'ano_de_nascimento',
        'cpf',
    ];
}
