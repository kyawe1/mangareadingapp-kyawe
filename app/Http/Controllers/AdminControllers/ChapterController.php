<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $chapters=Chapter::all()->sortByDescending('created_at');
        return view('admin.chapter.index', ['chapters'=>$chapters]);
    }
}
