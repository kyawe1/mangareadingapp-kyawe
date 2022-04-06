<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedBlogs extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table="save_series";

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function series(){
        return $this->belongsTo('App\Models\Series','series_id');
    }
    
}
