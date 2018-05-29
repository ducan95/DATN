<!DOCTYPE html>
<html ng-app="sougou_zyanaru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> @yield('title') </title>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
  <link href="{{ asset('assets/base/bower_components/lightbox2/dist/css/lightbox.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icon/faviconf.ico') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Toast -->
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/toast/angular-toastr.css') }}" />
  <!-- ckeditor -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/base/dist/css/AdminLTE.min.css') }}">
  <!-- Custom style -->
  <link rel="stylesheet" href="{{ asset('assets/theme/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/fakeloader/fakeloader.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('bower_components/ckeditor') }}"> -->
  @yield('custom-css')
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/base/dist/css/skins/_all-skins.min.css') }}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/alertifyjs/css/alertify.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/alertifyjs/css/themes/default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/base/bower_components/sweetalert/dist/sweetalert.css') }}">



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
<body class="hold-transition skin-purple-light sidebar-mini animated fadeIn" ng-cloak>
<div></div>
<div id="spinner_sougouzyanaru">
    <div id="spinner_sougouzyanaru-opacity"></div>
    <div class="spinner_sougouzyanaru-spinner"></div>
</div>
<div class="wrapper">

{{--  ###### Layout #######  --}}
 @include("admin.templates.header") 
{{--  @if(($role_code == 'admin') || ($role_code == 's_admin'))  --}}
  @include("admin.templates.AdminSideBar")
{{--  @endif  --}}

{{--  @if($role_code == 'user')
  @include("admin.templates.UserSideBar")
@endif

@if($role_code == 'editor')
  @include("admin.templates.EditorSideBar")
@endif  --}}
{{--  ###### Layout #######  --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    {{--  ###### Layout #######  --}}
    @yield('content')
    {{--  ###### Layout #######  --}}

  </div>
  <!-- /.content-wrapper -->

    {{--  ###### Layout #######  --}}
    @include("admin.templates.footer") 
    {{--  ###### Layout #######  --}}

</div>

<script>
  var APP_CONFIGURATION = {
    BASE_URL: "{{ url('/') }}"
  }
</script>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{ asset('assets/base/bower_components/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/base/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Angular JS and resource -->
<script src="{{ asset('assets/base/bower_components/angular.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/angular-resource.min.js') }}"></script>
<!-- Angular Toast -->
<script src="{{ asset('assets/base/bower_components/toast/angular-toastr.tpls.js') }}"></script>
<!-- Angular Ng-File-Upload -->
<script src="{{ asset('assets/base/bower_components/ng-file-upload.min.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/ng-file-upload-shim.min.js') }}"></script>
<!-- Angular Paging -->
<script src="{{ asset('assets/base/bower_components/paging.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/ng-ckeditor.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/ng-ckeditor.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/base/dist/js/adminlte.min.js') }}"></script>
<!-- <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script> -->
<!-- SlimScroll -->
<script src="{{ asset('assets/base/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/base/dist/js/demo.js') }}"></script>

<!-- App Config -->
<script src="{{ asset('assets/frontend/config/config.js') }}"></script>
<!-- Japanese Charecter -->
<script src="{{ asset('assets/frontend/extension/lang.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/angular-ui-switch.js') }}"></script>
<!-- Ng-Clipboard -->
<script src="{{ asset('assets/base/bower_components/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/ngclipboard.min.js') }}"></script>
<script src="{{ asset('assets/frontend/extension/tranDate.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/lightbox2/dist/js/lightbox.js') }}"></script>
<!-- <script src="{{ asset('assets/base/bower_components/alertifyjs/alertify.min.js') }}"></script> -->
<script src="{{ asset('assets/base/bower_components/SweetAlert.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/angular-sweetalert/SweetAlert.js') }}"></script>
<!-- <script src="{{ asset('assets/base/bower_components/SweetAlert.js') }}"></script> -->

@yield('bottom-js')

</body>
</html>
