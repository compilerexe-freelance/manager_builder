@extends('layouts.app_admin')

@section('content')
  <?php $report = DB::table('report_user')->where('id', $id)->first(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">แก้ไขรายงาน {{ $report->title }}</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/edit_report_id') }}">
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $report->id }}">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">ชื่อเรื่องรายงาน</label>
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
                <a href="{{ url('/admin/edit_report') }}" style="margin-right:5px">
                  <button type="button" class="btn btn-info"><i class="fa fa-btn fa-angle-left"></i> ย้อนกลับ</button>
                </a>
                <button type="submit" class="btn btn-success">
                  <i class="fa fa-btn fa-save"></i> บันทึกการแก้ไข
                </button>
              </div>
            </div>

          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
