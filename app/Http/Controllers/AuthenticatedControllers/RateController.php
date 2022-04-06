<?php

namespace App\Http\Controllers\AuthenticatedControllers;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function rate(int $id, int $rate)
    {
        try {
            // $validated_data=request()->validate([
            //     'series_id'=>'required,integer',
            //     'chapter_id'=>'required,integer',
            //     'rate'=>'required,boolean'
            // ]);
            
            $userId = auth()->user()->id;
            if ($rate == 1) {
                
                Rate::create([
                    'user_id' => $userId,
                    'series_id' => $id,
                    'isLike' => true
                ]);
                
            }else{
                
                Rate::create([
                    'user_id' => $userId,
                    'series_id' => $id,
                    'isLike' => false
                ]);
                
            }
            
            // return redirect()->back()->with('success','Rate added successfully');
            return redirect()->back()->with('success', 'Rated');
        } catch (\Exception $e) {
            
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function unrate(int $id)
    {
        $userId = auth()->user->id;
        $rate = Rate::where('user_id',$userId)->where('series_id',$id)->first();
        if ($rate->user_id == $userId) {
            $rate->delete();
            return redirect()->back()->with('success', 'Unrated');
        }
        return redirect()->back()->with('error', 'somethingwrong');
    }
}
