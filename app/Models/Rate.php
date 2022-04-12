<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table='rate';

    protected $fillable=[
        'user_id',
        'series_id',
        'isLike'
    ];

    public function series(){
        return $this->belongsTo("App\Models\Series","series_id");
    }
    public function user(){
        return $this->belongsTo("App\Models\User","user_id");
    }
}
