@extends('layouts.app_home')

@section('content')
  <?php $reports = DB::table('report_user')->get(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">รายงานทั้งหมด</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อรายงาน</th>
                  <th>ผู้บันทึก</th>
                  <th>บันทึกเมื่อ</th>
                  <th></th>
                </tr>
                @foreach ($reports as $report)
                <tr>
                  <td>{!! $report->id !!}</td>
                  <td>{!! $report->title !!}</td>
                  <td>{!! $report->username !!}</td>
                  <td>{!! $report->created_at !!}</td>
                  <td><a href="view_report/{!! $report->id !!}"><button type="submit" class="btn btn-info" style="width:100%">รายละเอียด</button></a></td>
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
