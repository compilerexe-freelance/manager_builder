@extends('layouts.app_home')

@section('content')
  <?php $projects = DB::table('project_detail')->get(); ?>
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
                @foreach ($projects as $project)
                <tr>
                  <td>{!! $project->id !!}</td>
                  <td>{!! $project->title !!}</td>
                  <td>{!! $project->username !!}</td>
                  <td>{!! $project->created_at !!}</td>
                  <td><a href="view_project/{!! $project->id !!}"><button type="submit" class="btn btn-info" style="width:100%">รายละเอียด</button></a></td>
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
