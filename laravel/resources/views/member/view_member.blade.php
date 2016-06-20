@extends('layouts.app_home')

@section('content')
  <?php $member = DB::table('users')->where('id', $id)->first(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">ข้อมูลสมาชิก {{ $member->code }}</div>
        <div class="panel-body">
          <div class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="code" class="col-md-4 control-label">รหัสสมาชิก</label>
              <div class="col-md-6">
                <input id="code" type="text" class="form-control" name="code" value="{{ $member->code }}">
              </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="col-md-4 control-label">ชื่อ-นามสกุล</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}">
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
                <textarea id="address" class="form-control" name="address" rows="5" style="resize:none">{{ $member->address }}</textarea>
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
                <input id="tel" type="text" class="form-control" name="tel" value="{{ $member->tel }}">
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
                <input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}" placeholder="example@gmail.com">
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
                <input id="username" type="text" class="form-control" name="username" value="{{ $member->username }}">
                @if ($errors->has('username'))
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
                  <option>สมาชิกหน่วยงาน</option>
                </select>
                @if ($errors->has('permission'))
                  <span class="help-block">
                    <strong>กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-right">
                <a href="{{ url('/member') }}">
                  <button class="btn btn-info"><i class="fa fa-btn fa-angle-left"></i> ย้อนกลับ</button>
                </a>
              </div>
            </div>

          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
