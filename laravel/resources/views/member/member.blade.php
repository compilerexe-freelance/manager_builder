@extends('layouts.app_home')

@section('content')
  <?php $members = DB::table('users')->where('permission', 'สมาชิกหน่วยงาน')->get(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">สมาชิกหน่วยงาน</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tr>
                  <!-- <th>ลำดับ</th> -->
                  <th>รหัสสมาชิก</th>
                  <th>ชื่อผู้ใช้งาน</th>
                  <th>บันทึกเมื่อ</th>
                  <th></th>
                </tr>
                @foreach ($members as $member)
                <tr>
                  <!-- <td>{!! $member->id !!}</td> -->
                  <td>{!! $member->code !!}</td>
                  <td>{!! $member->username !!}</td>
                  <td>{!! $member->created_at !!}</td>
                  <td><a href="view_member/{!! $member->id !!}"><button type="submit" class="btn btn-info" style="width:100%">รายละเอียด</button></a></td>
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
