<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'tipos';

    protected $fillable = [
        'nombre',
        'estado',
    ];


    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'tipo_id');
    }
}
