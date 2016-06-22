@extends('layouts.app_admin')

@section('content')
  <?php $list = DB::table('list_buy')->where('id', $id)->first(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">เพิ่มรายการสั่งซื้อ</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/list/list_edit') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="form-group">
              <label for="code" class="col-md-4 control-label">รหัสรายการสั่งซื้อ</label>
              <div class="col-md-6">
                <input id="code" type="text" class="form-control" name="code" value="{{ $list->code }}" readonly="readonly">
              </div>
            </div>

            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
              <label for="detail" class="col-md-4 control-label">รายละเอียด</label>
              <div class="col-md-6">
                <textarea id="detail" class="form-control" name="detail" rows="10" style="resize:none">{{ $list->detail }}</textarea>
                @if ($errors->has('detail'))
                  <span class="help-block">
                    <strong>กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-right">

                <a href="{{ url('/admin/list/list_edit') }}" style="margin-right:5px">
                  <button type="button" class="btn btn-info"><i class="fa fa-btn fa-angle-left"></i> ย้อนกลับ</button>
                </a>
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
