
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="menu-open">
          <a href="{{ route('webReleaseIndex') }}">
            <i class="fa fa-barcode"></i> <span>{{trans('web.Registration_releasenumber')}}
</span>
            {{--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>  --}}
          </a>
        </li>
        <li class="">
          <a href="{{ route('webPostIndex')}}">
            <i class="fa fa-pencil"></i>
            <span>{{trans('web.list_archive')}}
</span></span>
            {{--  <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>  --}}
          </a>
        </li>
        <li class="">
          <a href="{{ route('webCategoryIndex') }}">
            <i class="fa fa-hashtag"></i>
            <span>{{trans('web.category')}}</span>
          </a>
        </li>
        <li class="">
          <a href="{{route('webImageIndex')}}">
            <i class="fa fa-picture-o"></i>
            <span>{{trans('web.images')}}</span>
          </a>
        </li>
        <li class="">
          <a href="{{ route('webMemberIndex') }}">
            <i class="fa fa-address-book-o"></i>
            <span>{{trans('web.sidebar_management')}}</span>
          </a>
        </li>
          <li class="">
          <a href="{{ route('webCommentIndex') }}">
            <i class="fa fa-users"></i>
            <span>{{"Quản lí comment"}}</span>
          </a>
        </li>
        <li class="">
          <a href="{{ route('webUserIndex') }}">
            <i class="fa fa-user-o"></i>
            <span>{{trans('web.user_management')}}</span>
          </a>
        </li>

        <li><a href="{{ route('getLogout') }}"><i class="fa fa-circle-o text-red"></i> <span>{{trans('web.logout')}}</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>