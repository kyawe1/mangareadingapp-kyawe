<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserInRole;
use App\Models\WaitingList;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    // public function index(){
    //     $role=Roles::where('name','author')->get()[0];
    //     $user_roles=UserInRole::where('role_id',$role->id)->get();
    //     return view('admin.author.index',['user_roles'=>$user_roles]);
    // }
    public function accept(User $user)
    {
        $user_role = UserInRole::where('user_id', $user->id)->get();
        try {
            if ($user_role != null  && !$user->is_in_role('author')) {
                $user->add_to_role('author');
                $waitingList = WaitingList::where('user_id', $user->id)->delete();
                return redirect()->back()->with('success', 'User has been added to author list');
            }
        } catch (\Exception $e) {
            $user->add_to_role('author');
                $waitingList = WaitingList::where('user_id', $user->id)->delete();
                return redirect()->back()->with('success', 'User has been added to author list');
        }
        return redirect()->back()->with('error', 'It is already in list');
    }
    public function delete(WaitingList $waitingList)
    {
        $waitingList->delete();
        return redirect()->back()->with('success', 'User has been deleted from waiting list');
    }
    public function getlist()
    {
        $waitingList = WaitingList::all();
        return view('admin.author.list', ['waiting_lists' => $waitingList]);
    }
}
