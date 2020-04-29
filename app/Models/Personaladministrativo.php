<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personaladministrativo extends Model
{
    protected $table = 'Personaladministrativo';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'imagen',
        'activo',
        'borrado',
        'created_at',
        'updated_at',
        'persona_id',
        'jerarquia_id',
        'cargos_id'
    ];
    protected $guarded = [];
}
