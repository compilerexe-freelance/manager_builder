<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Auth\Authenticable as AuthenticableTrait;

use App\Http\Requests;
use App\Record_Users;
use App\User;
use Auth;

class AuthController extends Controller
{
  public function getLogin() {
    if (Auth::check()) {
      if (Auth::user()->permission == "ผู้ใช้งานระบบ" || Auth::user()->permission == "สมาชิกหน่วยงาน") {
        return redirect('home');
      } else {
        return redirect('admin/panel');
      }
    } else {
      return view('login');
    }
  }

  public function postLogin(Request $request) {
    $getUser = $request->get('username');
    $getPass = $request->get('password');
    if ($getUser == "" || $getPass == "") {
      return redirect()->back()->with([
        'status'=>'กรุณาตรวจสอบชื่อผู้ใช้งานและรหัสผ่านอีกครั้ง',
        'username'=>$getUser
      ]);
    }

    if (Auth::attempt(['username'=>$getUser,'password'=>$getPass])){
      if (Auth::attempt(['username'=>$getUser,'password'=>$getPass,'permission'=>'ผู้ดูแลระบบ'])) {
        return redirect()->action('AdminController@index');
      } else {
        return redirect('home');
      }
    } else {
      return redirect()->route('logout', ['username'=>$getUser]);
    }

  }

  public function getLogout(Request $request) {
    Auth::logout();
    return redirect()->action('AuthController@getLogin');
    // ->with([
    //       'status'=>'กรุณาตรวจสอบชื่อผู้ใช้งานและรหัสผ่านอีกครั้ง',
    //       'username'=>$request->get('username')
    //     ]);
  }

}
