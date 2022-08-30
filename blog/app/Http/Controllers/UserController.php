<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    public function __construct()
   {
     $this->middleware('auth');
   }
    public function getUsers()
    {
      $users = User::all();
      return view('admin.users.index',compact('users'));
    }

    public function createUser()
    {
      return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      if($user->save()){
        return redirect(route('admin.dashboard.users.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    public function editUser($id)
    {
      $user = User::find($id);
      return view('admin.users.edit',compact('user'));
    }

    public function updateUser(Request $request,$id)
    {
      $user = User::find($id);
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
      ]);

      $user = User::find($id);
      $user->name = $request->name;
      $user->email = $request->email;
      if($user->save()){
        return redirect(route('admin.dashboard.users.index'))->withSuccess('The data has been updated');
      }else{
        return back();
      }
    }

    public function deleteUser($id)
    {
      $user = User::find($id);
      if($user->delete()){
        return redirect(route('admin.dashboard.users.index'))->withSuccess('The data has been deleted');
      }else{
        return back();
      }
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }
}
