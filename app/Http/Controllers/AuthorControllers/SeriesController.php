<?php

namespace App\Http\Controllers\authorControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Series;
use Carbon\Carbon;

class SeriesController extends Controller
{
    public function __construct(){
        $this->middleware('author');
    }
    public function index(){
        $series=Series::all();
        return view('admin.series.index', ['series'=>$series]);
    }
    public function create(){
        return view('admin.series.create');
    }
    public function create_process(Request $request){
        $validatedData=$request->validate($this->rules());
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['slug']=ucwords(str_replace(' ','_',$validatedData['name']));
        Series::create($validatedData);
        return redirect()->route('admin.series-index')->with('success', 'Series created successfully');
    }
    public function update(Series $id){
        return view('admin.series.update',['series'=>$id]);
    }
    public function update_process(Series $id){
        $validatedData=request()->validate($this->rules());
        $validatedData["updated_at"]=Carbon::now();
        $id->update($validatedData);
        $id->save();
        return redirect()->route('admin.series-index');
    }
    public function delete(Series $id){
        $id->delete();
        return redirect()->route('admin.series-index');
    }
    public function rules(){
        return [
            'name'=>'required|min:3|max:255',
            'type'=>'required|min:3|max:255',
            'release_date'=>'required|date',
            'description'=>'required|min:3|max:255',
            // 'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}

