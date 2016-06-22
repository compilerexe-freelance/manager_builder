@extends('layouts.app_admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">เพิ่มรายการสั่งซื้อ</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/list/list_add') }}">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="code" class="col-md-4 control-label">รหัสรายการสั่งซื้อ</label>
              <div class="col-md-6">
                <input id="code" type="text" class="form-control" name="code" value="<?php echo rand(0,999999999); ?>" readonly="readonly">
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

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-right">
                <button type="submit" class="btn btn-success">
                  <i class="fa fa-btn fa-save"></i> บันทึกรายการสั่งซื้อ
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
