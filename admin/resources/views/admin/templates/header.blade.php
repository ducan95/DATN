<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('getIndex') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>G</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>総合</b>ジャーナル</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="{{ route('getLogout') }}"><i class="fa fa-power-off"></i></a>
            {{--  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>  --}}
          </li>
        </ul>
      </div>
    </nav>
  </header>