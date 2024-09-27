<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Role;

class SuperAdminController extends Controller
{
    public function dashboard(){
        return view('superadmin.dashboard');
    }
    public function users(){
        $users = User::with('roles')->where('role','!=',1)->get();
        return view('superadmin.users',compact('users'));
    }
    public function manageRole(){
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        return view('superadmin.manage-role',compact(['roles','users']));

    }
    public function updateRole(Request $request){
        User::where('id',$request->user_id)->update([
        'role'=>$request->role_id,
        ]);
        return redirect()->back();

    }
}
