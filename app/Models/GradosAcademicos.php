<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradosAcademicos extends Model
{
    protected $table = 'gradosacademicos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'grado',
        'abreviatura',
        'activo',
        'borrado',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
}
