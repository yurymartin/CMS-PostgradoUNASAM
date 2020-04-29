<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidades extends Model
{
    protected $table = 'especialidades';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'especialidad',
        'activa',
        'borrado',
        'created_at',
        'update_at'
    ];
    protected $guarded = [];
}
