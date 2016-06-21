<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RequestDataUsers;
use DB;
use App\Record_Users;
use Hash;
use Auth;
use Crypt;
use Schema;
use Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        session(['current_menu'=>'panel']);
        return view('admin/panel/panel');
    }

    // ===== Users =====

    public function getUsers()
    {
        session(['current_menu'=>'users']);
        return view('users/users');
    }

    public  function getViewUser($id)
    {
        session(['current_menu'=>'users']);
        return view('users/view_user')->with('id', $id);
    }

    public function form_add()
    {
        session(['current_menu'=>'users']);
        return view('users/form_add');
    }

    public function form_edit()
    {
        session(['current_menu'=>'users']);
        return view('users/form_edit');
    }

    public function form_edit_id($id)
    {
        session(['current_menu'=>'users']);
        return view('users/form_edit_id')->with('id',$id);
    }

    public function form_delete()
    {
        session(['current_menu'=>'users']);
        return view('users/form_delete');
    }

    public function insert_user(RequestDataUsers $request)
    {
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
        return redirect('users')->with('status','เพิ่มสมาชิกสำเร็จ');
    }

    public function edit_user($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return redirect()->action('AdminController@form_edit_id', [$id]);
    }

    public function save_edit(RequestDataUsers $request)
    {
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

        return redirect('users/form_edit')->with('status','แก้ไขสมาชิกสำเร็จ');
    }

    public function delete_user($id)
    {
        DB::table('users')->where('id', $id)->delete();
        Schema::table('users', function($table){
            $table->dropColumn('id');
        });
        Schema::table('users', function($table){
            $table->increments('id');
        });
        return redirect('users/form_delete')->with('status', 'ลบสมาชิกสำเร็จ');
    }

    // ===== Report =====

    public function getReport()
    {
        session(['current_menu'=>'report']);
        return view('admin/report/report');
    }

    public function getSendReport()
    {
        session(['current_menu'=>'report']);
        return view('admin/report/send_report');
    }

    public function postSendReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   =>  'required',
            'detail'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::table('report_user')->insert([
                'title'       =>    $request->title,
                'detail'      =>    $request->detail,
                'username'    =>    Auth::user()->username,
                'created_at'  =>    date('Y-m-d h:i:s'),
                'updated_at'  =>    date('Y-m-d h:i:s')
            ]);
        }
        return redirect('/admin/report')->with('status', 'เพิ่มรายงานสำเร็จ');
    }

    public function getEditReport()
    {
        session(['current_menu'=>'report']);
        return view('admin/report/edit_report');
    }

    public function getEditReportId($id)
    {
        session(['current_menu'=>'report']);
        return view('admin/report/edit_report_id')->with('id', $id);
    }

    public function postEditReportId(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'   =>  'required',
            'detail'  =>  'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::table('report_user')->where('id', $request->get('id'))->update([
                'title'   =>   $request->get('title'),
                'detail'  =>   $request->get('detail')
            ]);
        }
        return redirect('/admin/edit_report')->with('status', 'แก้ไขรายงานสำเร็จ');
    }

    public function getDeleteReport()
    {
        session(['current_menu'=>'report']);
        return view('admin/report/delete_report');
    }

    public function getDeleteReportId($id)
    {
        DB::table('report_user')->where('id', $id)->delete();
        Schema::table('report_user', function($table){
            $table->dropColumn('id');
        });
        Schema::table('report_user', function($table){
            $table->increments('id');
        });
        return redirect('/admin/delete_report')->with('status', 'ลบรายงานสำเร็จ');
    }

}
