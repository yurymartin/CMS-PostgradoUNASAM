<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table = 'contenido';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'contenido',
        'descripcion',
        'link',
        'clase',
        'activo',
        'borrado',
        'created_at',
        'updated_at',
        'tipocontenido_id',
        'users_id'
    ];
    protected $guarded = [];
}
