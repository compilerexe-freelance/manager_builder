<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/master.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('home') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                    @if (session('current_menu') == 'home')
                    <li class="active">
                    @else
                    <li>
                    @endif
                      <a href="{{ url('/home') }}">หน้าแรก</a>
                    </li>

                    @if (session('current_menu') == 'member')
                    <li class="dropdown active">
                    @else
                    <li class="dropdown">
                    @endif
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             จัดการข้อมูลสมาชิก<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/member') }}">สมาชิกภายในหน่วยงาน</a></li>
                            <li><a href="{{ url('/member_add') }}">เพิ่มสมาชิก</a></li>
                            <li><a href="{{ url('/member_edit') }}">แก้ไขสมาชิก</a></li>
                            <li><a href="{{ url('/member_delete') }}">ลบสมาชิก</a></li>
                        </ul>
                    </li>

                    @if (session('current_menu') == 'report')
                    <li class="dropdown active">
                    @else
                    <li class="dropdown">
                    @endif
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             จัดการข้อมูลรายงาน<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/report') }}">รายงานทั้งหมด</a></li>
                            <li><a href="{{ url('/send_report') }}">ส่งรายงาน</a></li>
                        </ul>
                    </li>

                    @if (session('current_menu') == 'project')
                    <li class="dropdown active">
                    @else
                    <li class="dropdown">
                    @endif
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             จัดการข้อมูลโครงการ<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/project') }}">โครงการทั้งหมด</a></li>
                            <li><a href="{{ url('/project_add') }}">เพิ่มโครงการ</a></li>
                            <li><a href="{{ url('/project_edit') }}">แก้ไขโครงการ</a></li>
                            <!-- <li><a href="{{ url('/project_delete') }}">ลบโครงการ</a></li> -->
                        </ul>
                    </li>

                    @if (session('current_menu') == 'list')
                    <li class="dropdown active">
                    @else
                    <li class="dropdown">
                    @endif
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             จัดการข้อมูลการสั่งซื้อ<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/list') }}">รายการสั่งซื้อทั้งหมด</a></li>
                            <li><a href="{{ url('/list_add') }}">เพิ่มรายการสั่งซื้อ</a></li>
                            <li><a href="{{ url('/list_edit') }}">แก้ไขรายการสั่งซื้อ</a></li>
                            <!-- <li><a href="{{ url('/list_delete') }}">ลบรายการสั่งซื้อ</a></li> -->
                        </ul>
                    </li>

                    <!-- <li><a href="{{ url('/buy_list') }}">เพิ่มรายการสั่งซื้อวัสดุ</a></li> -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <!-- <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/info_edit') }}"><i class="fa fa-btn fa-edit"></i>แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
