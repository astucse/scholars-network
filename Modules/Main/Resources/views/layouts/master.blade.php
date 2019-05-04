<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Scholars Network| @yield('title')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/assets/dist/css/skins/skin-green-light.min.css">
</head>
<body class="hold-transition skin-green-light layout-top-nav">

	<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{route('index')}}" class="navbar-brand"><b>Scholars</b>Network</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              @guest
              <li class="active"><a href="{{route('index')}}">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="{{route('index')}}">Contact us<span class="sr-only">(current)</span></a></li>
              @else

              @if (Auth::user()->scholar)
                <li><a href="{{route('page.myapplication')}}">My Applications<span class="label label-warning">10</span></a></li>
              @endif

              @if (Auth::user()->representative)
                <li><a href="{{route('page.myposts')}}">My Posts<span class="label label-warning">10</span></a></li>
              @endif

              @endguest
            </ul>
          </div>

          @guest
          <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                      <a href="{{route('login')}}" >
                          <span class="">JOIN the network</span>
                        </a>
                    </li>
                </ul>
            </div>
          @else
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                @if (Auth::user()->scholar)
                <a href="{{route('page.profile')}}" >
                <img src="{{Auth::user()->scholar->img}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{Auth::user()->name}}</span>
                </a>
                @else
                <a href="{{route('logout')}}" >
                    <img src="{{Auth::user()->university->logo}}" class="user-image" alt="Univ Logo">
                    <span class="hidden-xs">{{Auth::user()->university->university->name}} ( Logout )</span>
                </a>
                @endif
              </li>
            </ul>
          </div>
          @endguest

            <!-- /.navbar-custom-menu -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </header>


    @yield('content')

    <!-- /.content-wrapper -->
  <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <!-- <b>Version</b> 2.4.0 -->
          </div>
          <!-- <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights reserved. -->
        </div>
        <!-- /.container -->
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Vue js -->
		<script src="/js/vue.js"></script>
		@yield('js')
    <!-- <script src="/assets/bower_components/jquery/dist/jquery.min.js"></script> -->
    <!-- Bootstrap 3.3.7 -->
    <!-- <script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- SlimScroll -->
    <!-- <script src="/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
    <!-- FastClick -->
    <!-- <script src="/assets/bower_components/fastclick/lib/fastclick.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="/assets/dist/js/adminlte.min.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="/assets/dist/js/demo.js"></script> -->
    </body>
    </html>
