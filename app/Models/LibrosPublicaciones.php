<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class LibrosPublicaciones extends Model
{
    protected $table='tbl_libros_publicados';
    protected $primaryKey='pk_id_libro';

    public $timestamps=false;
}