<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\MessageBag;

use App\Http\Requests;
use App\Http\Requests\RequestDataUsers;
use DB;
use App\Record_Users;
use Hash;
use Auth;
use Crypt;

class AdminController extends Controller
{
    public function __construct() {
      // $this->middleware('admin');
    }

    public function index() {
      return view('admin_panel');
    }

    // ===== form =====
    public function form_add() {
      return view('users/form_add');
    }

    public function form_edit() {
      return view('users/form_edit');
    }

    public function form_edit_id($id) {
      return view('users/form_edit_id')->with('id',$id);
    }

    public function form_delete() {
      return view('users/form_delete');
    }
    // ===== end form =====

    // ===== process =====
    public function insert_user(RequestDataUsers $request) {
      $Record             = new Record_Users;
      $Record->code       = $request->get('code');
      $Record->name       = $request->get('name');
      $Record->address    = $request->get('address');
      $Record->tel        = $request->get('tel');
      $Record->email      = $request->get('email');
      $Record->username   = $request->get('username');
      $Record->password   = Hash::make($request->get('password'));
      $Record->permission = $request->get('permission');
      $Record->save();
      return redirect()->back()->with('status','เพิ่มสมาชิกสำเร็จ');
    }

    public function edit_user($id) {
      $user = DB::table('users')->where('id', $id)->first();
      return redirect()->action('UsersController@form_edit_id', [$id]);
    }

    public function save_edit(RequestDataUsers $request) {
      $users = new Record_Users;
      $old_password = $users::select('password')->where('id', $request->get('id'))->first();

      if ($request->get('password') == $old_password->password) {
        $users::where('id',$request->get('id'))->update([
          'name'      =>  $request->get('name'),
          'address'   =>  $request->get('address'),
          'tel'       =>  $request->get('tel'),
          'email'     =>  $request->get('email')
        ]);
      } else {
        $users::where('id',$request->get('id'))->update([
          'name'      =>  $request->get('name'),
          'address'   =>  $request->get('address'),
          'tel'       =>  $request->get('tel'),
          'email'     =>  $request->get('email'),
          'username'  =>  $request->get('username'),
          'password'  =>  Hash::make($request->get('password'))
        ]);
      }

      return redirect()->back()->with('status','บันทึกสำเร็จ');
    }

    public function delete_user($id) {
      $users = new Record_Users;
      // DB::table('users')->where('id', $id)->delete();

      // $users = new Record_Users;
      $users::where('id', $id)->delete();
      // $users::onlyTrashed()->where('id', $id)->get();
      return redirect()->back();
    }
    // ===== end process =====
}
