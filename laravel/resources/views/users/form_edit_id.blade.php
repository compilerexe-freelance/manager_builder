@extends('layouts.app_admin')

@section('content')
  <?php $users = DB::table('users')->where('id', $id)->first(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">แก้ไขข้อมูลสมาชิก</div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/save_edit') }}">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $id }}">
              <div class="form-group">
                <label for="code" class="col-md-4 control-label">รหัสสมาชิก</label>
                <div class="col-md-6">
                  <input id="code" type="text" class="form-control" name="code" value="{{ $users->code }}" readonly="readonly">
                </div>
              </div>

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ $users->name }}">
                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="col-md-4 control-label">ที่อยู่</label>
                <div class="col-md-6">
                  <textarea id="address" class="form-control" name="address" rows="5" style="resize:none">{{ $users->address }}</textarea>
                  @if ($errors->has('address'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                <label for="tel" class="col-md-4 control-label">เบอร์โทรศัพท์</label>
                <div class="col-md-6">
                  <input id="tel" type="text" class="form-control" name="tel" value="{{ $users->tel }}">
                  @if ($errors->has('tel'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">อีเมล</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}">
                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-4 control-label">ชื่อผู้ใช้งาน</label>
                <div class="col-md-6">
                  <input id="username" type="text" class="form-control" name="username" value="{{ $users->username }}" readonly>
                  @if ($errors->has('username'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">รหัสผ่าน</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" value="{{ $users->password }}" placeholder="ขั้นต่ำ 4 ตัวอักษร">
                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password_confirmation" class="col-md-4 control-label">ยืนยันรหัสผ่าน</label>
                <div class="col-md-6">
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ $users->password }}" placeholder="ขั้นต่ำ 4 ตัวอักษร">
                  @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4 text-right">
                  <a href="{{ url('users/form_edit') }}" style="margin-right:5px">
                    <button type="button" class="btn btn-info"><i class="fa fa-btn fa-angle-left"></i> ย้อนกลับ</button>
                  </a>
                  <button type="submit" class="btn btn-success">
                  <i class="fa fa-btn fa-save"></i> บันทึกการแก้ไข
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
