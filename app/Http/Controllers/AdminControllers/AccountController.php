<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        return view('admin.account.index');
    }
    public function create(){
        return view('admin.account.create');
    }
    public function create_process(){
        
        return redirect()->route('admin.account.index');
    }
    public function edit(){
        return view('admin.account.edit');
    }
    public function edit_process(){
        return redirect();
    }
}
