<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
  public function login()
  {
    return view('login');
  }
    public function loginUser(Request $request)
    {
      $email = $request->email;
      $password = $request->password;
      if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1])) {
        return redirect(route('admin.dashboard.index'));
      }else{
        return redirect(route('user.login'));
      }
    }
}
