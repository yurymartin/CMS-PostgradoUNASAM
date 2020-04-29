<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuarios extends Model
{
    protected $table = 'tipousuarios';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'tipo',
        'activo',
        'borrado'
    ];
    protected $guarded = [];
}
