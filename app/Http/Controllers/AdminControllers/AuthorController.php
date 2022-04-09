<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserInRole;

class AuthorController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(){
        $role=Roles::where('name','author')->get()[0];
        $user_roles=UserInRole::where('role_id',$role->id)->get();
        return view('admin.author.index',['user_roles'=>$user_roles]);
    }
    public function create(){
        return view('admin.author.create');
    }
    public function create_process(){
        return view('admin.author.create');
    }
    public function accept(User $id){
        return view('admin.author.accept');
    }
    public function accept_process(User $id){
        return view('admin.author.accept');
    }
}
