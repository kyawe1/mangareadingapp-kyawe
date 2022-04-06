<?php

namespace App\Http\Controllers\AuthenticatedControllers;

use App\Http\Controllers\Controller;
use App\Models\WaitingList;

class ApplyAuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function create(){
        $userId=auth()->user()->id;
        WaitingList::create([
            'user_id'=> $userId
        ]);
        return redirect()-> back()->with('success',"successfully registered...");
    }
}
