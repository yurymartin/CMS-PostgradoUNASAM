<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'activo',
        'borrado',
        'imagem',
        'remember_token	',
        'created_at',
        'updated_at',
        'tipousuario_id',
        'persona_id'
    ];
    protected $guarded = [];
}
