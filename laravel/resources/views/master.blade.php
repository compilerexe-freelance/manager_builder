<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Laravel</title>

    <link rel="stylesheet" href="{!! URL::asset('assets/css/bootstrap-theme.min.css'); !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/css/bootstrap.min.css'); !!}">
    <link rel="stylesheet" href="{!! URL::asset('assets/css/master.css'); !!}">
    <script src="{!! URL::asset('assets/js/jquery-2.2.3.min.js'); !!}"></script>
    <script src="{!! URL::asset('assets/js/bootstrap.min.js'); !!}"></script>

  </head>
  <body style="background-image: url({!! URL('assets/image/background/wood_pattern.png') !!})">

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a href="{!! URL('admin_panel') !!}" class="navbar-brand">Laravel</a>
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ระบบจัดการผู้ใช้งาน <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{!! URL('users/form_add') !!}">เพิ่ม</a></li>
              <li><a href="{!! URL('users/form_edit') !!}">แก้ไข</a></li>
              <li><a href="{!! URL('users/form_delete') !!}">ลบ</a></li>
            </ul>
          </li>
          <li><a href="{!! URL('logout') !!}">ออกจากระบบ</a></li>
        </ul>



      </div>
    </div>
  </nav>

  <div class="container" style="//border: 1px solid #abc">
    @yield('content')
  </div>



  </body>
</html>
