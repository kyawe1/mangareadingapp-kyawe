<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $rates=Rate::all();
        return view('admin.rate.index', ['rates'=>$rates]);
    }
}
