<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
     public function attributes() {
        return [
            'nombre'        => '"Nombre cliente"',
            'apellidos'     => '"Apellidos cliente"',
            'fechaNac'      => '"Fecha Nacimiento"',
            'correo'        => '"Correo electrónico"',
            'clave'         => '"Contraseña"',
            'telefono'      => '"Teléfono"',
            'direccion'     => '"Dirección"',
            'ip'            => '"IP"',
            'estadoCivil'   => '"Estado Civil"',
            'sueldoAnual'   => '"Sueldo Anual"'
        ];
    }

    public function authorize() {
        return true;
    }
    
    public function messages() {
        $required   = 'El campo :attribute es obligatorio';
        $min        = 'La longitud mínima del campo :attribute es :min';
        $max        = 'La longitud máxima del campo :attribute es :max';
        $numeric    = 'El valor campo :attribute debe de ser numérico.';
        $gte        = 'El valor campo :attribute debe de ser mayor o igual que cero.';
        $lte        = 'El valor campo :attribute debe de ser mayor que uno.';
        return [
            'nombre.required'       => $required,
            'nombre.min'            => $min,
            'nombre.max'            => $max,
            'nombre.alpha'          => 'Los caracteres permitidos son alfabéticos.',
            'apellidos.required'    => $required,
            'apellidos.min'         => $min,
            'apellidos.max'         => $max,
            'fechaNac.required'     => $required,
            'correo.max'            => $max,
            'correo.email'          => 'El campo :attribute no tiene un formato válido.',
            'exists.correo'         => 'El :attribute ya existe',
            'clave.required'        => $required,
            'clave.min'             => $min,
            'clave.max'             => $max,
            'telefono.min'          => $min,
            'telefono.max'          => $max,
            'sueldoAnual.numeric'   => $numeric,
            'sueldoAnual.gte'       => $gte,
            'sueldoAnual.lte'       => $lte,
            
        ];
    }

    public function rules() {
        return [
            'nombre'        => 'required|min:2|max:50|alpha',
            'apellidos'     => 'required|min:2|max:50',
            'fechaNac'      => 'required',
            'correo'        => 'nullable|max:120|email', //exists:cliente,correo
            'clave'         => 'required|min:6|max:10',
            'telefono'      => 'nullable|min:9|max:9',
            'direccion'     => 'nullable',
            'ip'            => 'nullable',
            'estadoCivil'   => 'nullable',
            'sueldoAnual'   => 'nullable|numeric|gte:0|lte:9999999.999',
        ];
    }
}
