<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CumpleaniosValidator extends FormRequest
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
            'file' => [
                'required',
                'file',
                'mimes:csv,txt',
                'max:4000'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'file' => 'Archivo CSV',
        ];
    }
}
