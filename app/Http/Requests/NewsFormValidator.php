<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\News;

class NewsFormValidator extends FormRequest
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
            'news_name' => [
                'required', 'max:255',
                #Ejemplo de validaciones avanzadas
               function ($attribute, $value, $fail) {
                    if (is_string($value) && !empty($value)) {
                        #Busqueda en nuestro modelo Client
                        $user = News::where('news_name', '=', $value)->first();
                    }
                    if (!empty($user)) {
                        #Mensaje personalizado
                        $fail(__('Este título ya existe'));
                    }
                }
            ],
            'url_path_image_news' => ['max:255'],
            'type' => ['required'],
            'category' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'news_name' => 'Título de la noticia',
            'resume' => 'Resumen',
            'url_path_image_news' => 'Banner',
            'code_block' => 'Caja de texto HTML',
            'type' => 'Tipo de noticia',
            'category' => 'Categoria'
        ];
    }
}
