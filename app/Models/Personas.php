<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'activo',
        'borrado',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
}
