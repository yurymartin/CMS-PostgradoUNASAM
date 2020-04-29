<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctorados extends Model
{
    protected $table = 'doctorados';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'doctorado',
        'descripcion',
        'link',
        'activo',
        'borrado',
        'idcat_maestria',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
}
