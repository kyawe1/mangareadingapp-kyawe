<?php

namespace App\Http\Controllers\AdminControllers;


use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterPics;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $chapters = Chapter::all()->sortByDesc('created_at');
        return view('admin.chapter.index', ['chapters' => $chapters]);
    }
    public function create()
    {
        return view('admin.chapter.create');
    }
    public function create_process()
    {
        try {
            $validated_data = request()->validate($this->rules());
            

            $chapter_pics = $validated_data['image'];

            $chapter = Chapter::create($validated_data);
            foreach ($chapter_pics as $chapterpics) {
                $chapter_pics = ChapterPics::create([
                    'chapter_id' => $chapter->id,
                    'image' => $chapterpics,
                    'name' => bin2hex(random_bytes(12))
                ]);
            }
            return redirect()->route('admin.chapter-index')->with('success', 'Chapter Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function rules()
    {
        return [
            "name" => "required|string",
            "title" => "required|string",
            "series_id" => "required|integer",
            "image" => "required|array"
        ];
    }
}
