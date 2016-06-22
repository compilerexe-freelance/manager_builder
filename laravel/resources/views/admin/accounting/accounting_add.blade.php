@extends('layouts.app_admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
        <div class="panel-heading">เพิ่มรายการบัญชี</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/accounting/accounting_add') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">ชื่อรายการ</label>
              <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="">
                @if ($errors->has('title'))
                  <span class="help-block">
                    <strong style="color:red">กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="type_data" class="col-md-4 control-label">ชนิดบัญชี</label>
              <div class="col-md-6">
                <select class="form-control" name="type_data">
                  <option>รายรับ</option>
                  <option>รายจ่าย</option>
                </select>
              </div>
            </div>

            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
              <label for="money" class="col-md-4 control-label">จำนวนเงิน (บาท)</label>
              <div class="col-md-6">
                <input id="money" type="text" class="form-control" name="money" value="" placeholder="ตัวอย่าง 5000">
                @if ($errors->has('money'))
                  <span class="help-block">
                    <strong style="color:red">กรุณากรอกข้อมูล</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4 text-right">
                <button type="submit" class="btn btn-success">
                  <i class="fa fa-btn fa-save"></i> บันทึกรายการบัญชี
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
