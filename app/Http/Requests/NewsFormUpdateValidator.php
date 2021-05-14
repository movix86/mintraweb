<?php

namespace App\Http\Requests;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;

class NewsFormUpdateValidator extends FormRequest
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
            'news_name' => ['max:255'],
            'resume' => ['max:100'],
            'url_path_image_news' => ['max:3000'],
            'type' => ['max:255'],
            'category' => ['max:255']
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
