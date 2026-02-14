<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'USUARIOS';
    protected $primaryKey = 'USUARIO';
    public $timestamps = false;

    protected $fillable = [
        'USUARIO',     
        'CONTRASEÑA',
        'ID_ENCUESTA',
        'PERFIL'
    ];
}
