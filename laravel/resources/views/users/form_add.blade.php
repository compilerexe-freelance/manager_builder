@extends('layouts.app_admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">เพิ่มข้อมูลสมาชิก</div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/insert_user') }}">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="code" class="col-md-4 control-label">รหัสสมาชิก</label>
                <div class="col-md-6">
                  <input id="code" type="text" class="form-control" name="code" value="<?php echo rand(0,999999999); ?>" readonly="readonly">
                </div>
              </div>

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>
                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                  <textarea id="address" class="form-control" name="address" rows="5" style="resize:none">{{ old('address') }}</textarea>
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
                  <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}">
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
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
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
                  <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
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
                  <input id="password" type="password" class="form-control" name="password" value="" placeholder="ขั้นต่ำ 4 ตัวอักษร">
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
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" placeholder="ขั้นต่ำ 4 ตัวอักษร">
                  @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                <label for="permission" class="col-md-4 control-label">สิทธิ์การใช้งานระบบ</label>
                <div class="col-md-6">
                  <select class="form-control" name="permission">
                    <option>ผู้ใช้งานระบบ</option>
                    <option>ผู้ดูแลระบบ</option>
                  </select>
                  @if ($errors->has('permission'))
                    <span class="help-block">
                      <strong>กรุณากรอกข้อมูล</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-center">
              <button type="submit" class="btn btn-success">
              <i class="fa fa-btn fa-user"></i> เพิ่มผู้ใช้งาน
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
