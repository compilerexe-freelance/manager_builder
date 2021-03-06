@extends('layouts.app_admin')
@section('content')
  <?php $users = DB::table('users')->get(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">
            แก้ไขสมาชิก
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>ลำดับ</th>
                  <th>รหัสสมาชิก</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>ชื่อผู้ใช้งาน</th>
                  <th>สิทธิ์การใช้งานระบบ</th>
                  <th></th>
                </tr>
                @foreach ($users as $user)
                <tr>
                  <td>{!! $user->id !!}</td>
                  <td>{!! $user->code !!}</td>
                  <td>{!! $user->name !!}</td>
                  <td>{!! $user->username !!}</td>
                  <td>{!! $user->permission !!}</td>
                  <td><a href="edit_user/{!! $user->id !!}"><button type="submit" class="btn btn-warning" style="width:100%"><i class="fa fa-btn fa-repeat"></i> แก้ไข</button></a></td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
