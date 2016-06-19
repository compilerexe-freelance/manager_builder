@extends('layouts.app_home')

@section('content')
  <?php $report = DB::table('report_user')->where('id', $id)->first(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">รายงาน {{ $report->title }}</div>
        <div class="panel-body">
          <div class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">ชื่อรายงาน</label>
              <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ $report->title }}">
                @if ($errors->has('title'))
                  <span class="help-block">
                    <strong>กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
              <label for="detail" class="col-md-4 control-label">รายละเอียด</label>
              <div class="col-md-6">
                <textarea id="detail" class="form-control" name="detail" rows="10" style="resize:none">{{ $report->detail }}</textarea>
                @if ($errors->has('detail'))
                  <span class="help-block">
                    <strong>กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-right">
                <a href="{{ url('report') }}">
                  <button class="btn btn-info"><i class="fa fa-btn fa-angle-left"></i> ย้อนกลับ</button>
                </a>
              </div>
            </div>

          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
