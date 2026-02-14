<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preregistro extends Model
{
    protected $table = 'preregistro';

    protected $primaryKey = 'id_encuesta';

    public $timestamps = false; 
    protected $fillable = [
        'nombre_completo',
        'fecha_nacimiento',
        'domicilio',
        'colonia',
        'localidad',
        'municipio',
        'estado',
        'telefono',
        'edad',
        'estado_civil',
        'iglesia',
        'domicilio_iglesia',
        'colonia_iglesia',
        'localidad_iglesia',
        'municipio_iglesia',
        'tiempo_congregarse',
        'pastor',
        'cargo',
        'cargo_nombre',
        'proposito',
        'formacion_teologica',
        'primaria',
        'secundaria',
        'bachillerato',
        'otra_escolaridad',
        'presencial',
        'region',
        'virtual1',
        'motivo_virtual',
        'diplomado',
        'fecha_registro',
        'archivos',
        'estatus',
        'correo'
    ];
}
