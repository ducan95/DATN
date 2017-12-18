<!DOCTYPE html>
<html ng-app="sougou_zyanaru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title')</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icon/faviconf.ico') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/base/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/fakeloader/fakeloader.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/base/dist/css/skins/_all-skins.min.css') }}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
<div></div>
<div id="spinner_sougouzyanaru">
    <div id="spinner_sougouzyanaru-opacity"></div>
    <div class="spinner_sougouzyanaru-spinner"></div>
</div>
<div class="wrapper">

{{--  ###### Layout #######  --}}
 @include("templates.elements.header") 
 @include("templates.elements.sidebar") 
{{--  ###### Layout #######  --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    {{--  ###### Layout #######  --}}
    @yield('content')
    {{--  ###### Layout #######  --}}

  </div>
  <!-- /.content-wrapper -->

    {{--  ###### Layout #######  --}}
    @include("templates.elements.footer") 
    {{--  ###### Layout #######  --}}

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/base/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/base/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Angular JS and resource -->
<script src="{{ asset('assets/base/bower_components/angular.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/angular-resource.min.js') }}"></script>
<!-- Validate JS -->
<script src="{{ asset('assets/base/bower_components/validate.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/base/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/fakeloader/fakeloader.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets/base/dist/js/adminlte.min.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('assets/base/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/base/dist/js/demo.js') }}"></script>

{{--angular app--}}
<script src="{{ asset('assets/frontend/config/config.js') }}"></script>

@yield('bottom-js')

</body>
</html>
