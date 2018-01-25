<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>総合ジャーナル</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/base/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" >
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h2 class="login-box-msg">総合ジャーナル</h2>
     
    @if (count($errors) >0)
        <div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               {{--   <h4><i class="icon fa fa-ban"></i> Alert!</h4>  --}}
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
          </div>
     @endif
    
     @if (session('status'))
          <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{--  <h4><i class="icon fa fa-ban"></i> Alert!</h4>  --}}
             <p>{{ session('status') }}</p>
        </div> 
     @endif

     <form action="{{ route('getLogin') }}" method="post">
         {{ csrf_field() }}
         <div class="form-group has-feedback">
             <input type="email" class="form-control" required="required" name="txtEmail" placeholder="Email">
             <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         </div>
         <div class="form-group has-feedback">
             <input type="password" class="form-control" placeholder="パスワード" name="txtPassword">
             <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         </div>
         <div class="row">
             <div class="col-xs-8">
                 <div class="checkbox icheck">
                     <label>
                         <input type="checkbox"> Remember Me
                     </label>
                 </div>
             </div>
             <div class="col-xs-4">
                 <button type="submit" class="btn btn-primary btn-block btn-flat">ログイン</button>
             </div>
         </div>
     </form>
    <!-- <a href="#">I forgot my password</a><br> -->
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/base/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/base/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('assets/base/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
