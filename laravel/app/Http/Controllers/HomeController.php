<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RequestDataUsers;
use App\Record_Users;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use Input;
use Schema;
use Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index()
    {
        session(['current_menu'=>'home']);
        return view('home');
    }

    public function getReport()
    {
        session(['current_menu'=>'report']);
        return view('report/report');
    }

    public function getSendReport()
    {
        session(['current_menu'=>'report']);
        return view('report/send_report');
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
            $send_report = DB::table('report_user')->insert([
                'title'       => $request->get('title'),
                'detail'      => $request->get('detail'),
                'username'    => Auth::user()->username,
                'created_at'  => date('Y-m-d h:i:s'),
                'updated_at'  => date('Y-m-d h:i:s')
            ]);
        }
        return redirect('report')->with('status','บันทึกรายงานสำเร็จ');
    }

    public function getViewReport($id)
    {
        return view('report/view_report')->with('id', $id);
    }

    // ===== Project =====

    public function getProject()
    {
        session(['current_menu'=>'project']);
        return view('project/project');
    }

    public function getProjectAdd()
    {
        session(['current_menu'=>'project']);
        return view('project/project_add');
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
        return redirect('project')->with('status', 'บันทึกโครงการสำเร็จ');
    }

    public function getViewProject($id)
    {
        session(['current_menu'=>'project']);
        return view('project/view_project')->with('id', $id);
    }

    public function getProjectEdit()
    {
        session(['current_menu'=>'project']);
        return view('project/project_edit');
    }

    public function getProjectEditId($id)
    {
        session(['current_menu'=>'project']);
        return view('project/project_edit_id')->with('id', $id);
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
        return redirect('/project_edit')->with('status', 'แก้ไขโครงการสำเร็จ');
    }

    public function getProjectDelete()
    {
        session(['current_menu'=>'project']);
        return view('project/project_delete');
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
        return redirect('/project_delete')->with('status','ลบโครงการสำเร็จ');
    }

    // ===== List =====

    public function getListAdd()
    {
        session(['current_menu'=>'list']);
        return view('list/list_add');
    }

    public function getViewList($id)
    {
        session(['current_menu'=>'list']);
        return view('list/view_list')->with('id', $id);
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
        return redirect('/list')->with('status', 'บันทึกรายการสั่งซื้อสำเร็จ');
    }

    public function getList()
    {
        session(['current_menu'=>'list']);
        return view('list/list');
    }

    public function getListEdit()
    {
        session(['current_menu'=>'list']);
        return view('list/list_edit');
    }

    public function getListEditId($id)
    {
        session(['current_menu'=>'list']);
        return view('list/list_edit_id')->with('id', $id);
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
        return redirect('list_edit')->with('status','แก้ไขรายการสั่งซื้อสำเร็จ');
    }

    public function getListDelete()
    {
        session(['current_menu'=>'list']);
        return view('list/list_delete');
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
        return redirect('/list_delete')->with('status','ลบรายการสั่งซื้อสำเร็จ');
    }

    // ===== Member =====

    public function getMember()
    {
        session(['current_menu'=>'member']);
        return view('member/member');
    }

    public function getViewMember($id)
    {
        session(['current_menu'=>'member']);
        return view('member/view_member')->with('id', $id);
    }

    public function getMemberAdd()
    {
        session(['current_menu'=>'member']);
        return view('member/member_add');
    }

    public function postMemberAdd(RequestDataUsers $request)
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
        return redirect('/member')->with('status','เพิ่มสมาชิกสำเร็จ');
    }

    public function getMemberEdit()
    {
        session(['current_menu'=>'member']);
        return view('member/member_edit');
    }

    public function getMemberEditId($id)
    {
        session(['current_menu'=>'member']);
        return view('member/member_edit_id')->with('id', $id);
    }

    public function postMemberEditId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                    =>  'required',
            'address'                 =>  'required',
            'tel'                     =>  'required',
            'email'                   =>  'required',
            'password'                =>  'required',
            'password_confirmation'   =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $password_old = DB::table('users')->where('id', $request->get('id'))->first();
            if ($request->get('password') == $password_old) {
                DB::table('users')->where('id', $request->get('id'))->update([
                    'name'  =>  $request->get('name'),
                    'address'   =>  $request->get('address'),
                    'tel'       =>  $request->get('tel'),
                    'email'     =>  $request->get('email')
                ]);
            } else {
                DB::table('users')->where('id', $request->get('id'))->update([
                    'name'  =>  $request->get('name'),
                    'address'   =>  $request->get('address'),
                    'tel'       =>  $request->get('tel'),
                    'email'     =>  $request->get('email'),
                    'password'  =>  Hash::make($request->get('password'))
                ]);
            }
        }
        return redirect('/member')->with('status', 'แก้ไขสมาชิกหน่วยงานสำเร็จ');
    }

    public function getMemberDelete()
    {
        session(['current_menu'=>'member']);
        return view('member/member_delete');
    }

    public function getMemberDeleteId($id)
    {
        DB::table('users')->where('id', $id)->delete();
        Schema::table('users', function($table){
            $table->dropColumn('id');
        });
        Schema::table('users', function($table){
            $table->increments('id');
        });
        return redirect('member_delete')->with('status', 'ลบสมาชิกหน่วยงานสำเร็จ');
    }

}
