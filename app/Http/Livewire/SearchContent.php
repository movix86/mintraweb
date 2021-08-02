<?php

namespace App\Http\Livewire;
use App\Models\News;

use Livewire\Component;

class SearchContent extends Component
{
    public $search = '';
    public function render()
    {

        $content = [];

        if(strlen($this->search) > 0){
            if(News::where('news_name', 'like', '%'.$this->search.'%')->exists()){
                $content = News::where('news_name', 'like', '%'.$this->search.'%')->take(3)->get();
            }else{
                $content = [];
            }
        }

        return view('livewire.search-content',['contents' => $content]);
        #return view('livewire.search-content');
    }
}
