@extends('layouts.app_admin')

@section('content')
  <?php $project = DB::table('project_detail')->where('id', $id)->first(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">โครงการ {{ $project->title }}</div>
        <div class="panel-body">
          <div class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">ชื่อโครงการ</label>
              <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ $project->title }}">
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
                <textarea id="detail" class="form-control" name="detail" rows="10" style="resize:none">{{ $project->detail }}</textarea>
                @if ($errors->has('detail'))
                  <span class="help-block">
                    <strong>กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
              <label for="detail" class="col-md-4 control-label">รูปภาพ</label>
              <div class="col-md-6">
                @if ($project->image == "-")
                  <label class="control-label">โครงการนี้ไม่มีรูปภาพ</label>
                @else
                  <img src="{{ asset('uploads/project/' . $project->image) }}" class="img-responsive">
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-right">
                <a href="{{ url('/admin/project/project') }}">
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
