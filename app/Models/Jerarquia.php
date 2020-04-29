<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jerarquia extends Model
{
    protected $table = 'jerarquia';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'jerarquia',
        'activo',
        'borrado',
        'created_at',
        'update_at'
    ];
    protected $guarded = [];
}
