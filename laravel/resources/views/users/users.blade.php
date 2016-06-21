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
          <div class="panel-heading">ผู้ใช้งานทั้งหมด</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tr>
                  <!-- <th>ลำดับ</th> -->
                  <th>รหัสสมาชิก</th>
                  <th>รหัสสมาชิก</th>
                  <th>ชื่อผู้ใช้งาน</th>
                  <th>บันทึกเมื่อ</th>
                  <th></th>
                </tr>
                @foreach ($users as $user)
                <tr>
                  <td>{!! $user->id !!}</td>
                  <td>{!! $user->code !!}</td>
                  <td>{!! $user->username !!}</td>
                  <td>{!! $user->created_at !!}</td>
                  <td><a href="view_user/{!! $user->id !!}"><button type="submit" class="btn btn-info" style="width:100%">รายละเอียด</button></a></td>
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
