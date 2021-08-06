<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCoursesFormValidator extends FormRequest
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
            'name' => ['required','max:255'],
            'description' => ['max:100'],
            'url_path_image_category_btn' => ['max:3000']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre de categoria',
            'description' => 'Resumen',
            'url_path_image_category_btn' => 'Boton'
        ];
    }
}
