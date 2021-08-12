<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses;
use Livewire\WithPagination;

class SearchTableCourses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public function render()
    {
        $content = [];

        if(strlen($this->search) > 0){
            if(Courses::where('name', 'like', '%'.$this->search.'%')->exists()){
                $content = Courses::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate(2);
            }
        }else{
            $content = Courses::orderBy('created_at', 'desc')->paginate(3);
        }

        return view('livewire.search-table-courses',['content' => $content]);
        #return view('livewire.search-table-courses');
    }
}
