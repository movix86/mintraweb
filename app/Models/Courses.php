<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table = "courses";

    public function users_courses(){
        return $this->hasMany(Users_courses::class, 'id');
    }
}
