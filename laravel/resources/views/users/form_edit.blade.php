@extends('master')
@section('content')
  <?php $users = DB::table('users')->get(); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <b>แก้ไขข้อมูลสมาชิก</b>
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
                <td><a href="edit_user/{!! $user->id !!}"><button type="submit" class="btn btn-warning" style="width:100%">แก้ไข</button></a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
