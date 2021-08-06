<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoryCourses;

class SearchTableCategoryCourses extends Component
{

    public $search = '';
    public function render()
    {
        $content = [];

        if(strlen($this->search) > 0){
            if(CategoryCourses::where('name', 'like', '%'.$this->search.'%')->exists()){
                $content = CategoryCourses::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate(2);
            }
        }else{
            $content = CategoryCourses::orderBy('created_at', 'desc')->paginate(3);
        }

        return view('livewire.search-table-category-courses',['content' => $content]);
        #return view('livewire.search-table-courses');
    }
}
