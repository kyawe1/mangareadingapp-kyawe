<?php

namespace App\Http\Controllers\BasicControllers;

use Illuminate\Http\Request;
use App\Models\{Series,Chapter};
use App\Http\Controllers\Controller;

class SeriesController extends Controller
{
    public function index(){
        $series=Series::all()->sortByDesc(['updated_at','created_at']);
        return View('basic.series.index',['series'=>$series]);
    }
    public function detail(int $id,string $order="desc"){
        $series=Series::find($id);
        if(strtoupper($order)=="ASC"){
            $chapter=Chapter::where('series_id',$id)->orderBy("created_at")->get();
        }else{
            $chapter=Chapter::where('series_id',$id)->orderByDesc("created_at")->get();
        }
        return View('basic.series.detail',['series'=>$series,'chapter'=> $chapter,"chapter_count"=> count($chapter)]);
    }
}
