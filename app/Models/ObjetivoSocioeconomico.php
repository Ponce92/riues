<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjetivoSocioeconomico extends Model
{
    protected $table='tbl_objetivos_socioeconomicos_proyectos';
    public $primaryKey='pk_codigo_objetivo';
    public $timestamps=false;
    public $incrementing=false;
}