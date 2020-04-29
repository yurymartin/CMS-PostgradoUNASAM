<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipodocumentos extends Model
{
    protected $table = 'tipodocumentos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'tipo',
        'activo',
        'borrado'
    ];
    protected $guarded = [];
}
