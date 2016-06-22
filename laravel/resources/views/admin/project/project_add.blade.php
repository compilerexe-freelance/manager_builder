@extends('layouts.app_admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
        <div class="panel-heading">เพิ่มโครงการ</div>
        <div class="panel-body">

          {{ Form::open(['url'=>'/admin/project/project_add','method'=>'POST','class'=>'form-horizontal','files'=>true]) }}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">ชื่อโครงการ</label>
              <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
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
                <textarea id="detail" class="form-control" name="detail" rows="10" style="resize:none">{{ old('detail') }}</textarea>
                @if ($errors->has('detail'))
                  <span class="help-block">
                    <strong>กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
              <label for="file" class="col-md-4 control-label">รูปภาพ</label>
              <div class="col-md-6">
                <input type="file"class="form-control" name="image">
                @if ($errors->has('file'))
                  <span class="help-block">
                    <strong>กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-right">
                <button type="submit" class="btn btn-success">
                  <i class="fa fa-btn fa-save"></i> บันทึกโครงการ
                </button>
              </div>
            </div>

          {{ Form::close() }}

          </form>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
