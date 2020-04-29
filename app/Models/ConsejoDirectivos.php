<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsejoDirectivos extends Model
{
    protected $table = 'consejodirectivos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'activo',
        'borrado',
        'imagen',
        'created_at',
        'updated_at',
        'persona_id',
        'cago_id',
        'facultad_id',
        'gradoacademico_id'
    ];
    protected $guarded = [];
}
