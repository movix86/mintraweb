<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Courses;
use App\Models\Users_courses;
use App\Models\Users;
use Livewire\WithPagination;

class SearchTableStudents extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public function render()
    {
        #$all_suscrip = Users_courses::with(['users', 'courses'])->get();
        $content = [];

        if(strlen($this->search) > 0){

            if(Users::where('name', 'like', '%'.$this->search.'%')->exists()){
                $content = Users::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'desc')->paginate(2);
            }


        }else{

            $content = Users::orderBy('created_at', 'desc')->paginate(3);
        }
        return view('livewire.search-table-students', ['content' => $content]);
    }
}
