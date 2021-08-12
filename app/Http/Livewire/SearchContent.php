<?php

namespace App\Http\Livewire;
use App\Models\News;
use Livewire\WithPagination;
use Livewire\Component;

class SearchContent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public function render()
    {

        $content = [];

        if(strlen($this->search) > 0){
            if(News::where('news_name', 'like', '%'.$this->search.'%')->exists()){
                $content = News::where('news_name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate(2);
            }
        }else{
            $content = News::orderBy('created_at', 'desc')->paginate(3);
        }

        return view('livewire.search-content',['contents' => $content]);
        #return view('livewire.search-content');
    }
}
