<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index(){
        $users=User::all();
        return view('admin.account.index',['users'=>$users]);
    }
    public function create(){
        $roles=Roles::all();
        return view('admin.account.create',["roles"=>$roles]);
    }
    public function create_process(){
        $validated_user=request()->validate($this->rules());
        $validated_user['password']=Hash::make($validated_user['password'],['rounds'=>12]);
        $role=$validated_user['role'];
        unset($validated_user['password_confirmation']);
        unset($validated_user['role']);
        $user=User::create($validated_user);
        $user->add_to_role($role);
        
        // return redirect('/admin/account');
        return redirect()->route('admin.account-index');
    }
    // public function edit(){
    //     return view('admin.account.edit');
    // }
    // public function edit_process(){
    //     return redirect();
    // }
    public function rules(){
        return [
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=> 'required|string|min:8',
            'password_confirmation'=>'required|string|min:8|same:password',
            'role'=>"required|string",
        ];
    }
}
