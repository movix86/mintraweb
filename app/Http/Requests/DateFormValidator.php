<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateFormValidator extends FormRequest
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

            'file' => ['mimes:jpeg,bmp,png,gif,svg|max:4000'],
            'inputfecha' => ['required'],
            'inputnombre' => ['required', 'max:255']

        ];
    }

    public function attributes()
    {
        return [
            'file' => 'Foto o Imagen',
            'inputfecha' => 'Fecha de nacimiento',
            'inputnombre' => 'Nombre de usuario'
        ];
    }
}
