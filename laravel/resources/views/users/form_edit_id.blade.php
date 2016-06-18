@extends('master')
@section('content')
  <?php $users = DB::table('users')->where('id', $id)->first(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <b>แก้ไขข้อมูลสมาชิก</b>
        </div>
        <div class="panel-body">

          @if (session('status'))
            <div class="alert alert-success text-center">
                <label class="control-label">{!! session('status') !!}</label>
            </div>
          @endif

          @if ($errors->has('password') == 1)
            <div class="alert alert-danger text-center">
              <label class="control-label">กรุณาตรวจสอบรหัสผ่านอีกครั้ง</label>
            </div>
          @endif

          <div class="col-md-5 col-md-offset-3 table-responsive">
            <form action="{!! URL('/save_edit') !!}" method="POST">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
              <input type="hidden" name="id" value="{!! $id !!}">
              <table class="table table-borderless">
                <tr>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <td><label class="control-label">รหัสสมาชิก</label></td>
                  <td>
                    <input type="text" class="form-control" name="code" value="{!! $users->code !!}" readonly="readonly">
                  </td>
                </tr>
                <tr>
                  <td><label>ชื่อ - นามสกุล</label></td>
                  <td>
                    <input type="text" class="form-control" name="name" value="{!! $users->name !!}">
                  </td>
                </tr>
                <tr>
                  <td><label>ที่อยู่</label></td>
                  <td>
                    <textarea class="form-control" name="address" rows="5" style="resize:none">{!! $users->address !!}</textarea>
                  </td>
                </tr>
                <tr>
                  <td><label>เบอร์โทรศัพท์</label></td>
                  <td>
                    <input type="text" class="form-control" name="tel" value="{!! $users->tel !!}">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <label>อีเมล</label>
                    <input type="text" class="form-control" name="email" value="{!! $users->email !!}">
                  </td>
                </tr>
                <tr>
                  <td><label>ชื่อผู้ใช้งาน</label></td>
                  <td>
                    <input type="text" class="form-control" name="username" value="{!! $users->username !!}" readonly>
                  </td>
                </tr>
                <tr>
                  <td><label>รหัสผ่าน</label></td>
                  <td>
                    <input type="password" class="form-control" name="password" value="{!! $users->password !!}">
                  </td>
                </tr>
                <tr>
                  <td><label>ยืนยันรหัสผ่าน</label></td>
                  <td>
                    <input type="password" class="form-control" name="password_confirmation" value="{!! $users->password !!}">
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-success" style="width:100%">บันทึก</button>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
