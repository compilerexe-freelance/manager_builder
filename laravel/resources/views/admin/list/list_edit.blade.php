@extends('layouts.app_admin')

@section('content')
  <?php $lists = DB::table('list_buy')->get(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">รายการสั่งซื้อทั้งหมด</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>ลำดับ</th>
                  <th>รหัสรายการสั่งซื้อ</th>
                  <th>ผู้บันทึก</th>
                  <th>บันทึกเมื่อ</th>
                  <th></th>
                </tr>
                @foreach ($lists as $list)
                <tr>
                  <td>{!! $list->id !!}</td>
                  <td>{!! $list->code !!}</td>
                  <td>{!! $list->username !!}</td>
                  <td>{!! $list->created_at !!}</td>
                  <td><a href="list_edit/{!! $list->id !!}"><button type="submit" class="btn btn-warning" style="width:100%"><i class="fa fa-btn fa-repeat"></i> แก้ไข</button></a></td>
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
