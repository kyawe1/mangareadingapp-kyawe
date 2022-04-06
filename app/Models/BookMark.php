<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    use HasFactory;

    protected $table='bookmark';


    public function user(){
        return $this->belongTo('App\Models\User','user_id');
    }
    public function chapter(){
        return $this->belongTo('App\Models\Series','chapter_id');
    }
}
