<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Users_courses extends Model
{
    use HasFactory;
    protected $table = "users_courses";

    public function users(){
        return $this->belongsTo(Users::class, 'id_users');
    }

    public function courses(){
        return $this->belongsTo(Courses::class, 'id_courses');
    }

}
