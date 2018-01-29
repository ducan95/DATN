<!DOCTYPE html>
<html>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="shortcut icon" type="image/x-icon" href="https://friday.kodansha.ne.jp/media/icon/faviconf.ico">
    <title> @yield('title') </title>
    <meta name="keywords" content="FRIDAY,">
    <meta name="description" content="">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('client/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('client/plugins/adminLTE/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/plugins/adminLTE/css/skins/skin-purple.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('client/css/common/custom-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/common/site-custom-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/common/friday.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/site/common/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/site/common/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/common/mycss.css') }}">
<!--     <link rel="stylesheet" href="{{ asset('client/css/mycss.css') }}"> -->
  </head>
  <body class="hold-transition skin-purple layout-top-nav">
    <div class="wrapper cus-container container">

      {{--  ###### Layout #######  --}}
      @include("client.layout.header") 
      {{--  ###### Layout #######  --}}

      <!-- Full Width Column -->

      {{--  ###### Layout #######  --}}
      <div class="content-wrapper">
        <div class="_container">
          <div class="row">
            <div class="col-md-9 main-content-container">
            @yield('release')
            @yield('content')
            </div>
            <div class="col-md-3 main-sidebar-container">
            @yield('nav-bar')
            </div>
          </div>
        </div>
      </div>
      {{--  ###### Layout #######  --}}

      <!-- /.content-wrapper -->

      {{--  ###### Layout #######  --}}
      @include("client.layout.footer") 
      {{--  ###### Layout #######  --}}

    </div>
    <a href="#" class="scrollToTop"></a>
    <!-- jQuery 2.2.3 -->
    <!-- <script src="{{ asset('client/plugins/jQuery/jquery-2.2.3.min.js') }}"></script> -->
    <script src="{{ asset('assets/base/bower_components/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/base/bower_components/jquery.validate.min.js') }}"></script>
    <!--<script src="https://friday.kodansha.ne.jp/plugins/jQuery/jquery.mobile-1.4.5.min.js"></script>-->
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('client/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('client/plugins/adminLTE/js/app.min.js') }}"></script>
    <!--Custom js-->
    <script src="{{ asset('client/js/common/site.js') }}"></script>
    
    {{--  ###### Custom js #######  --}}
    @yield('bottom-js')
    @yield('usersite-bottom-js')
  </body>
</html>