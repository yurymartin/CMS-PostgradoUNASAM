<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'imagen',
        'activo',
        'borrado',
        'created_at',
        'updated_at',
        'especialidad_id',
        'universidad_id'
    ];
    protected $guarded = [];
}
