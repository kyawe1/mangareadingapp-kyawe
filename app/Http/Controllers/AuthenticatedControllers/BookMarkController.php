<?php

namespace App\Http\Controllers\AuthenticatedControllers;

use App\Http\Controllers\Controller;

use App\Models\SavedBlogs;


class BookMarkController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index(){
        $userId=auth()->user()->id;
        $bookmark=SavedBlogs::where('user_id',$userId)->get();
        return View('auth.bookmark.index',['bookmarks'=>$bookmark]);
    }
    // that $id parameter is series_id.
    public function create(int $id){
        $userId=auth()->user()->id;
        $bookmark_exists=SavedBlogs::where('user_id',$userId)->where('series_id',$id)->exists();
        if($bookmark_exists){
            return redirect()->back()->with('error','Already Bookmarked');
        }
        SavedBlogs::create([
            'user_id'=>$userId,
            'series_id'=>$id
        ]);
        return redirect()->back()->with('success','Bookmark added successfully');
        //for json
        // return response()->json(["successfully created!!!"]);
    }
    //that id is the bookmark_id for delete..

    public function unbookmark(int $id){
        $userId=auth()->user()->id;
        $savedBlogs=SavedBlogs::find($id);
        if($savedBlogs->user_id==$userId){
            $savedBlogs->delete();
            return redirect(route('bookmark.index'))->with('success','Bookmark deleted successfully');
        }
        return redirect(route('bookmark.index'))->with('error','Something went wrong');
        //for json
        // return response()->json(["successfully created!!!"]);
    }
}
