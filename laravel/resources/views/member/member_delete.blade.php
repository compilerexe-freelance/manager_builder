@extends('layouts.app_home')
@section('content')
  <?php $members = DB::table('users')->where('permission', 'สมาชิกหน่วยงาน')->get(); ?>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">
          <b>ลบสมาชิกหน่วยงาน</b>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <tr>
                <!-- <th>ลำดับ</th> -->
                <th>รหัสสมาชิก</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ชื่อผู้ใช้งาน</th>
                <th>สิทธิ์การใช้งานระบบ</th>
                <th></th>
              </tr>
              @foreach ($members as $member)
              <tr>
                <!-- <td>{!! $member->id !!}</td> -->
                <td>{!! $member->code !!}</td>
                <td>{!! $member->name !!}</td>
                <td>{!! $member->username !!}</td>
                <td>{!! $member->permission !!}</td>
                <td><a href="member_delete/{!! $member->id !!}"><button type="submit" class="btn btn-danger" style="width:100%"><i class="fa fa-btn fa-recycle"></i> ลบ</button></a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
