<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('getIndex') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">ADMIN</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <span style="color: #fff;padding-top: 14px;float: right;margin-right: 10px" >Xin chào {{ Auth::user()->username }}</span>
    </nav>
  </header>