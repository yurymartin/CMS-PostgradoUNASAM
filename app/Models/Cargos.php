<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'cargo',
        'activo',
        'borrado',
        'created_at',
        'update_at'
    ];
    protected $guarded = [];
}
