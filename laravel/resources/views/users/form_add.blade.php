@extends('master')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <b>เพิ่มข้อมูลสมาชิก</b>
        </div>
        <div class="panel-body">
          @if (session('status'))
            <div class="alert alert-success text-center">
              <label class="control-label">{!! session('status') !!}</label>
            </div>
          @endif
          <div class="col-md-5 col-md-offset-3 table-responsive">
            <form action="{!! URL('/insert_user') !!}" method="POST">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
              <table class="table table-borderless">
                <tr>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <td><label class="control-label">รหัสสมาชิก</label></td>
                  <td>
                    <input type="text" class="form-control" name="code" value="<?php echo rand(0,999999999); ?>" readonly="readonly">
                  </td>
                </tr>
                <tr>
                  <td><label class="control-label">ชื่อ - นามสกุล</label></td>

                  @if ($errors->has('name') == 1)
                    <td>
                      <div class="form-group has-error">
                        <input type="text" class="form-control" name="name" autofocus>
                      </div>
                    </td>
                  @else
                    <td>
                      <input type="text" class="form-control" name="name" value="{!! Input::old('name') !!}">
                    </td>
                  @endif

                </tr>
                <tr>
                  <td><label class="control-label">ที่อยู่</label></td>

                  @if ($errors->has('address') == 1)
                    <td>
                      <div class="form-group has-error">
                        <textarea class="form-control" name="address" rows="5" style="resize:none" autofocus></textarea>
                      </div>
                    </td>
                  @else
                    <td>
                      <textarea class="form-control" name="address" rows="5" style="resize:none">{!! Input::old('address') !!}</textarea>
                    </td>
                  @endif

                </tr>
                <tr>
                  <td><label class="control-label">เบอร์โทรศัพท์</label></td>

                  @if ($errors->has('tel') == 1)
                    <td>
                      <div class="form-group has-error">
                        <input type="text" class="form-control" name="tel" autofocus>
                      </div>
                    </td>
                  @else
                    <td>
                      <input type="text" class="form-control" name="tel" value="{!! Input::old('tel') !!}">
                    </td>
                  @endif

                </tr>
                <tr>
                  <td><label class="control-label">อีเมล</label></td>

                  @if ($errors->has('email') == 1)
                    <td>
                      <div class="form-group has-error">
                        <input type="text" class="form-control" name="email" autofocus>
                      </div>
                    </td>
                  @else
                    <td>
                      <input type="text" class="form-control" name="email" value="{!! Input::old('email') !!}">
                    </td>
                  @endif

                </tr>
                <tr>
                  <td><label class="control-label">ชื่อผู้ใช้งาน</label></td>

                  @if ($errors->has('username') == 1)
                    <td>
                      <div class="form-group has-error">
                        <input type="text" class="form-control" name="username" autofocus>
                      </div>
                    </td>
                  @else
                    <td>
                      <input type="text" class="form-control" name="username" value="{!! Input::old('username') !!}">
                    </td>
                  @endif

                </tr>
                <tr>
                  <td><label class="control-label">รหัสผ่าน</label></td>

                  @if ($errors->has('password') == 1)
                    <td>
                      <div class="form-group has-error">
                        <input type="password" class="form-control" name="password" autofocus>
                      </div>
                    </td>
                  @else
                    <td>
                      <input type="password" class="form-control" name="password" placeholder="ขั้นต่ำ 4 ตัวอักษร">
                    </td>
                  @endif

                </tr>
                <tr>
                  <td><label class="control-label">ยืนยันรหัสผ่าน</label></td>

                  @if ($errors->has('password_confirmation') == 1)
                    <td>
                      <div class="form-group has-error">
                        <input type="password" class="form-control" name="password_confirmation" autofocus>
                      </div>
                    </td>
                  @else
                    <td>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="ขั้นต่ำ 4 ตัวอักษร">
                    </td>
                  @endif

                </tr>
                <tr>
                  <td><label class="control-label">สิทธิ์การใช้งานระบบ</label></td>
                  <td>
                    <select class="form-control" name="permission">
                      <option>ผู้ใช้งานระบบ</option>
                      <option>ผู้ดูแลระบบ</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="submit" class="btn btn-success" style="width:100%">เพิ่มผู้ใช้งาน</button>
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
