<?php

namespace App\Http\Controllers\BasicControllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterPics;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function detail(string $chapter_id){
        $chapter=Chapter::find($chapter_id);
        if($chapter!=null){
            $chapterpics=ChapterPics::where('chapter_id',$chapter_id)->get();
            return View('basic.chapter.detail',['chapter'=>$chapter,'chapterpics'=>$chapterpics]);
        }
        return View('basic.chapter.detail',['chapter'=>$chapter,"chapterpics"=> [1,2,3,4,5,6]]);
    }
}
