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
use Input;

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

    // ===== Project =====

    public function getProject()
    {
        session(['current_menu'=>'project']);
        return view('admin/project/project');
    }

    public function getViewProjectId($id)
    {
        session(['current_menu'=>'project']);
        return view('admin/project/view_project')->with('id', $id);
    }

    public function getProjectAdd()
    {
        session(['current_menu'=>'project']);
        return view('admin/project/project_add');
    }

    public function postProjectAdd(Request $request)
    {
        // Global Variable
        $filename = "";
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'detail'  => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $file = array('image' => Input::file('image'));

            if ($request->file('image') != '') {
                $destinationPath = 'uploads/project';
                $extension = Input::file('image')->getClientOriginalExtension();
                $filename = rand(111111111,999999999).'.'.$extension;
                Input::file('image')->move($destinationPath, $filename);
                DB::table('project_detail')->insert([
                    'title'       => $request->get('title'),
                    'detail'      => $request->get('detail'),
                    'image'       => $filename,
                    'username'    => Auth::user()->username,
                    'created_at'  => date('Y-m-d h:i:s'),
                    'updated_at'  => date('Y-m-d h:i:s')
                ]);
            } else {
                DB::table('project_detail')->insert([
                    'title'       => $request->get('title'),
                    'detail'      => $request->get('detail'),
                    'image'       => '-',
                    'username'    => Auth::user()->username,
                    'created_at'  => date('Y-m-d h:i:s'),
                    'updated_at'  => date('Y-m-d h:i:s')
                ]);
            }
        }
        return redirect('/admin/project/project')->with('status', 'บันทึกโครงการสำเร็จ');
    }

    public function getProjectEdit()
    {
        session(['current_menu'=>'project']);
        return view('admin/project/project_edit');
    }

    public function getProjectEditId($id)
    {
        session(['current_menu'=>'project']);
        return view('admin/project/project_edit_id')->with('id', $id);
    }

    public function postProjectEditId(Request $request)
    {
        // Global Variable
        $filename = "";
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'detail'  => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $file = array('image' => Input::file('image'));

            if ($request->file('image') != '') {
                $destinationPath = 'uploads/project';
                $extension = Input::file('image')->getClientOriginalExtension();
                $filename = rand(111111111,999999999).'.'.$extension;
                Input::file('image')->move($destinationPath, $filename);
                DB::table('project_detail')->where('id', $request->get('id'))->update([
                    'title'       => $request->get('title'),
                    'detail'      => $request->get('detail'),
                    'image'       => $filename,
                    'username'    => Auth::user()->username,
                    'created_at'  => date('Y-m-d h:i:s'),
                    'updated_at'  => date('Y-m-d h:i:s')
                ]);
            } else {
                $check_img = DB::table('project_detail')->select('image')->where('id', $request->get('id'));
                if ($check_img != '-') {
                    DB::table('project_detail')->where('id', $request->get('id'))->update([
                        'title'       => $request->get('title'),
                        'detail'      => $request->get('detail'),
                        // 'image'       => '-',
                        'username'    => Auth::user()->username,
                        'created_at'  => date('Y-m-d h:i:s'),
                        'updated_at'  => date('Y-m-d h:i:s')
                    ]);
                } else {
                    DB::table('project_detail')->where('id', $request->get('id'))->update([
                        'title'       => $request->get('title'),
                        'detail'      => $request->get('detail'),
                        'image'       => '-',
                        'username'    => Auth::user()->username,
                        'created_at'  => date('Y-m-d h:i:s'),
                        'updated_at'  => date('Y-m-d h:i:s')
                    ]);
                }
            }
        }
        return redirect('/admin/project/project_edit')->with('status', 'แก้ไขโครงการสำเร็จ');
    }

    public function getProjectDelete()
    {
        session(['current_menu'=>'project']);
        return view('admin/project/project_delete');
    }

    public function getProjectDeleteId($id)
    {
        DB::table('project_detail')->where('id', $id)->delete();
        Schema::table('project_detail', function($table){
            $table->dropColumn('id');
        });
        Schema::table('project_detail', function($table){
            $table->increments('id');
        });
        return redirect('/admin/project/project_delete')->with('status','ลบโครงการสำเร็จ');
    }

    // List

    // ===== List =====

    public function getListAdd()
    {
        session(['current_menu'=>'list']);
        return view('admin/list/list_add');
    }

    public function getViewList($id)
    {
        session(['current_menu'=>'list']);
        return view('admin/list/view_list')->with('id', $id);
    }

    public function postListAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'detail' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            DB::table('list_buy')->insert([
                'code'        =>  $request->get('code'),
                'detail'      =>  $request->get('detail'),
                'username'    =>  Auth::user()->username,
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ]);
        }
        return redirect('/admin/list/list')->with('status', 'บันทึกรายการสั่งซื้อสำเร็จ');
    }

    public function getList()
    {
        session(['current_menu'=>'list']);
        return view('/admin/list/list');
    }

    public function getListEdit()
    {
        session(['current_menu'=>'list']);
        return view('/admin/list/list_edit');
    }

    public function getListEditId($id)
    {
        session(['current_menu'=>'list']);
        return view('/admin/list/list_edit_id')->with('id', $id);
    }

    public function postListEditId(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'detail'  =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::table('list_buy')->where('id', $request->get('id'))->update([
                'detail'  =>  $request->get('detail')
            ]);
        }
        return redirect('/admin/list/list_edit')->with('status','แก้ไขรายการสั่งซื้อสำเร็จ');
    }

    public function getListDelete()
    {
        session(['current_menu'=>'list']);
        return view('/admin/list/list_delete');
    }

    public function getListDeleteId($id)
    {
        DB::table('list_buy')->where('id', $id)->delete();
        Schema::table('list_buy', function($table){
            $table->dropColumn('id');
        });
        Schema::table('list_buy', function($table){
            $table->increments('id');
        });
        return redirect('/admin/list/list_delete')->with('status','ลบรายการสั่งซื้อสำเร็จ');
    }

    // Accounting

    public function getAccounting()
    {
        session(['current_menu'=>'accounting']);
        return view('/admin/accounting/accounting');
    }

    public function getAccountingAdd()
    {
        session(['current_menu'=>'accounting']);
        return view('/admin/accounting/accounting_add');
    }

    public function postAccountingAdd(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'   =>  'required',
            'money'   =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $total_money = 0;
            $moneys = DB::table('manage_money')->orderBy('id', 'desc')->first();

            $get_row = DB::table('manage_money')->get();

            if (count($get_row) > 0) {
                if ($request->get('type_data') == 'รายรับ') {
                    // foreach ($moneys as $money) {
                    //     $total_money = $total_money + $money->money;
                    // }
                    $total_money = $moneys->total + $request->get('money');
                } else {
                    // foreach ($moneys as $money) {
                    //     $total_money = $total_money + $money->money;
                    // }
                    $total_money = $moneys->total - $request->get('money');
                }
            } else {
                $total_money = $request->get('money');
            }
            DB::table('manage_money')->insert([
                'title'       =>  $request->get('title'),
                'type_data'   =>  $request->get('type_data'),
                'money'       =>  $request->get('money'),
                'total'       =>  $total_money,
                'username'    =>  Auth::user()->username,
                'created_at'  =>  date('Y-m-d h:i:s'),
                'updated_at'  =>  date('Y-m-d h:i:s')
            ]);
        }
        return redirect('/admin/accounting/accounting')->with('status', 'บันทึกรายการบัญชีสำเร็จ');
    }

    public function getAccountingDelete()
    {
        session(['current_menu'=>'accounting']);
        return view('/admin/accounting/accounting_delete');
    }

    public function getAccountingDeleteId($id)
    {
        $result_total = 0;
        // $total_money = DB::table('manage_money')->orderBy('id', 'desc')->first();
        $fetch_money = DB::table('manage_money')->where('id', $id)->first();
        // $total_money = $total_money - $money_id->money;
        // $result_total = $total_money->total - $fetch_money->total;

        // DB::table('manage_money')->insert([
        //     'title'       =>  'ลบรายการ',
        //     'type_data'   =>  $fetch_money->type_data,
        //     'money'       =>  $fetch_money->money,
        //     'total'       =>  $fetch_money->total,
        //     'created_at'  =>  date('Y-m-d h:i:s'),
        //     'updated_at'  =>  date('Y-m-d h:i:s')
        // ]);
        DB::table('manage_money')->where('id', $id)->delete();
        Schema::table('manage_money', function($table){
            $table->dropColumn('id');
        });
        Schema::table('manage_money', function($table){
            $table->increments('id');
        });
        return redirect('/admin/accounting/accounting_delete')->with('status','ลบรายการบัญชีสำเร็จ');
    }


}
