<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $table = 'actividades';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'actividad',
        'descripcion',
        'fecha',
        'hora',
        'imagen',
        'activo',
        'borrado',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
}
