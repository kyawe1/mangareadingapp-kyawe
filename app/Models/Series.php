<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $table='series';

    public function is_bookmarked($user_id){
        return SavedBlogs::where('user_id',$user_id)->where('series_id',$this->id)->exists();
    }
    public function get_bookmarked_id($user_id){
        return SavedBlogs::where('user_id',$user_id)->where('series_id',$this->id)->first()->id;
    }
    public function rated($user_id){
        return Rate::where('user_id',$user_id)->where('series_id',$this->id)->exists();
    }
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
