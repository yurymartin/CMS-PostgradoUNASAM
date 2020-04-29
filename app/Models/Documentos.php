<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table = 'documentos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'nom_documento',
        'descripcion',
        'link',
        'activo',
        'borrado',
        'created_at',
        'updated_at',
        'users_id',
        'tipodocumento_id'
    ];
    protected $guarded = [];
}
