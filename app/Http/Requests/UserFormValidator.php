<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserFormValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'email' => [
                'required', 'email', 'max:100',
               #Ejemplo de validaciones avanzadas
               function ($attribute, $value, $fail) {
                   if (is_string($value) && !empty($value)) {
                       #Busqueda en nuestro modelo Client
                       $user = User::where('email', '=', $value)->first();
                   }
                   if (!empty($user)) {
                       #Mensaje personalizado
                       $fail(__('El email ya existe'));
                   }
               }
            ],
            'password' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'lastname' => 'apellido',
            'email' => 'correo',
            'password' => 'contraseña'
        ];
    }
}
