<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catmaestrias extends Model
{
    protected $table = 'catmaestrias';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'categoria',
        'activo',
        'borrado',
        'created_at',
        'updated_at'
    ];
    protected $guarded = [];
}
