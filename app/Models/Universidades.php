<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universidades extends Model
{
    protected $table = 'universidades';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'abreviatura',
        'activo',
        'borrado',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
}
