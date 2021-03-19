<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;
    protected $table = 'sliders';

    public function users(){
        return $this->belongsTo('App/Models/Users');
    }
}
