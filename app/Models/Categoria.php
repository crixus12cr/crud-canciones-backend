<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
        'estado',
        'tipo_id'
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    public function canciones()
    {
        return $this->hasMany(Cancion::class,'categoria_id');
    }
}
