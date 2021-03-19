<?php

namespace App\Models;

use App\View\Components\table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function sliders(){
        return $this->hasMany('App/Models/Sliders');
    }
}
