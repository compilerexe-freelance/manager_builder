@extends('layouts.app_admin')

@section('content')
  <?php $accountings = DB::table('manage_money')->get(); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
          <div class="alert alert-success text-center">
            <strong>{!! session('status') !!}</strong>
          </div>
        @endif
        <div class="panel panel-default">
          <div class="panel-heading">ข้อมูลการเงินทั้งหมด</div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อรายการ</th>
                  <th>ชนิดข้อมูล</th>
                  <th>จำนวนเงิน</th>
                  <th>ยอดเงินคงเหลือ</th>
                  <th>บันทึกเมื่อ</th>
                </tr>
                @foreach ($accountings as $accounting)
                <tr>
                  <td>{!! $accounting->id !!}</td>
                  <td>{!! $accounting->title !!}</td>
                  <td>{!! $accounting->type_data !!}</td>
                  <td><?php echo number_format($accounting->money, 0, '', ','); ?></span></td>
                  <td><?php echo number_format($accounting->total, 0, '', ','); ?></td>
                  <td>{!! $accounting->created_at !!}</td>
                  <!-- <td><a href="view_list/{!! $accounting->id !!}"><button type="submit" class="btn btn-info" style="width:100%">รายละเอียด</button></a></td> -->
                  <!-- <td></td> -->
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
