<?php

namespace App\Http\Controllers\authorControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function __construct(){
        $this->middleware('author');
    }
    public function index(){
        $series=Series::all();
        return view('author.series.index', ['series'=>$series]);
    }
    public function create(){
        return view('author.series.create');
    }
    public function create_process(){
        return view();
    }
    public function update(Series $id){
        return view('author.series.update',['series'=>$id]);
    }
    public function update_process(Series $id){
        return view();
    }
    public function delete(Series $id){
        $id->delete();
        return redirect()->route('author.series-index');
    }
}

