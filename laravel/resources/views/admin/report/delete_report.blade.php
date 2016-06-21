@extends('layouts.app_admin')

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
          <div class="panel-heading">โครงการทั้งหมด</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อโครงการ</th>
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
                  <td><a href="delete_report/{!! $report->id !!}"><button type="submit" class="btn btn-danger" style="width:100%"><i class="fa fa-btn fa-recycle"></i> ลบ</button></a></td>
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
