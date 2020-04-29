<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'curso',
        'horario',
        'activo',
        'borrado',
        'created_at',
        'update_at',
        'maestria_id'
    ];
    protected $guarded = [];
}
