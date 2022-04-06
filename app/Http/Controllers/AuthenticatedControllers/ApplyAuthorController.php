<?php

namespace App\Http\Controllers\AuthenticatedControllers;

use App\Http\Controllers\Controller;


class ApplyAuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function create(){
        $userId=auth()->user()->id;
    }
}
