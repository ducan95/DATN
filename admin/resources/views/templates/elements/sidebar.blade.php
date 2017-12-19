
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active menu-open">
          <a href="#">
            <i class="fa fa-barcode"></i> <span>{{trans('web.sidebar.Registration_releasenumber')}}
</span>
            {{--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>  --}}
          </a>
          {{--  <ul class="-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>  --}}
        </li>
        <li class="">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>記事一覧
(Bài viết)</span>
            {{--  <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>  --}}
          </a>
        </li>
        <li class="">
          <a href="/admincp/category">
            <i class="fa fa-newspaper-o"></i>
            <span>カテゴリー管理(category)</span>
          </a>
        </li>
        <li class="">
          <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>画像管理(images)</span>
          </a>
        </li>
        <li class="">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>サイドバー管理(本番)
(Hội viên)</span>
          </a>
        </li>
        <li class="">
          <a href="{{ route('webUserIndex') }}">
            <i class="fa fa-user-o"></i>
            <span>ユーザー管理(Users)
</span>
          </a>
        </li>
        <li class="header">MORE</li>
        <li><a href="{{ route('getLogout') }}"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>