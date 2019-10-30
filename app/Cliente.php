<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    
    protected $table = 'cliente';
    
    protected $hidden = ['created_at','updated_at'];
    
    protected $fillable = ['nombre', 'apellidos', 'fechaNac', 'correo', 'clave', 'telefono', 'direccion', 'ip', 'estadoCivil', 'sueldoAnual'];
    
}
