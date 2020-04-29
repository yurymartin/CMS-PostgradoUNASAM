<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipocontenido extends Model
{
    protected $table = 'tipocontenido';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'tipo',
        'activo',
        'borrado'
    ];
    protected $guarded = [];
}
