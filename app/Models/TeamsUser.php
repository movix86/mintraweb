<?php

namespace App\Models;

use App\View\Components\table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsUser extends Model
{
    use HasFactory;
    protected $table = "teams";


    public function users(){
        return $this->belongsTo('App/Models/Users');
    }
}
