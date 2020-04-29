<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestrias extends Model
{
    protected $table = 'maestrias';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'maestria',
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
