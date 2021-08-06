<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Courses;

class CoursesFormValidator extends FormRequest
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
            'description' => ['required','max:100'],
            'url_path_image_course' => ['max:3000'],
            'url_path_image_course_btn' => ['max:3000'],
            'category' => ['max:255']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre de curso',
            'description' => 'Resumen',
            'tittle_activation' => 'Titulo activacion',
            'url_path_image_course' => 'Banner',
            'url_path_image_course_btn' => 'Boton',
            'code_block' => 'Caja de texto HTML',
            'type' => 'Tipo de curso',
            'category' => 'Categoria'
        ];
    }
}
