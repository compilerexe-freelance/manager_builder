@extends('layouts.app_home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">ข้อความจากระบบ</div>

                <div class="panel-body">
                    <span style="color:green">ยินดีต้อนรับคุณ <?php echo Auth::user()->username; ?> เข้าสู่ระบบ</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
