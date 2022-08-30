<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gender;
use Auth;
use Image;
use File;
use Storage;
class UserController extends Controller
{
    public function __construct()
   {
     $this->middleware('auth');
   }
    public function getUsers()
    {
      // $genders = Gender::all();
      $users = User::all();
      return view('admin.users.index',compact('users'));
    }

    public function createUser()
    {
      $genders = Gender::all();
      return view('admin.users.create',compact('genders'));
    }

    public function storeUser(Request $request)
    {
      if (!empty($request->profile)) {
          $fileName = time().'.'.$request->profile->getClientOriginalName();
      }
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
        'gender_id' => 'required'
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->gender_id = $request->gender_id;
      if (!empty($request->profile)) {
            $image = $request->profile;
            $user->profile = $fileName;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->save(public_path('assets/uploads/profiles/'.$fileName));
            $image_resize->resize(350, 350);
            $image_resize->save(public_path('assets/uploads/profiles/thumbnail/'.$fileName));
      }
      if($user->save()){
        return redirect(route('admin.dashboard.users.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    public function editUser($id)
    {
      $genders = Gender::all();
      $user = User::find($id);
      return view('admin.users.edit',compact('user','genders'));
    }

    public function updateUser(Request $request,$id)
    {
      if (!empty($request->profile)) {
          $fileName = time().'.'.$request->profile->getClientOriginalName();
      }
      $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'gender_id' => 'required'
      ]);

      $user = User::find($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->gender_id = $request->gender_id;
      if (!empty($request->profile)) {
            $image_path_original = public_path('assets/uploads/profiles/'.$request->profile);
            $image_path_thumbnail = public_path('assets/uploads/profiles/thumbnail/'.$request->profile);
            if(File::exists($image_path_original && $image_path_thumbnail)) {
                File::delete($image_path_original);
                File::delete($image_path_thumbnail);
            }
            $image = $request->profile;
            $user->profile = $fileName;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->save(public_path('assets/uploads/profiles/'.$fileName));
            $image_resize->resize(350, 350);
            $image_resize->save(public_path('assets/uploads/profiles/thumbnail/'.$fileName));
      }
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
