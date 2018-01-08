@extends('admin.templates.master')

@section('title')
{{trans('web.user_management')}}
@endsection 

@section('content')

  <div ng-controller="UserAddCtrl"> 

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="mg-bt-25">
          @lang('user.admin_user_add_new')
        {{--<small>preview of simple tables</small>--}}
      </h1>
      {{--<ol class="breadcrumb">--}}
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li><a href="#">Tables</a></li>--}}
        {{--<li class="active">Simple</li>--}}
      {{--</ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <form role="form" method="post" id="main" ng-submit="addUser()">
            {{ csrf_field() }}
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>@lang('user.admin_user_name')</th>
                  <th>@lang('user.admin_user_role')</th>
                  <th>@lang('user.admin_user_email')</th>
                  <th>@lang('web.password')</th>
                </tr>
                <tr>
                  <td>
                    <div class="form-group">
                        <input ng-model="user.username" type="text" name="username" class="form-control" id="username" placeholder="Enter name">
                        <label class="error" ng-if="error.username[0] != null">@{{ error.username[0] }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        <select ng-init="user.role_code=''" name="role_code" class="form-control" ng-model="user.role_code">
                          <option value="">Chọn quyền</option>
                          <option ng-repeat="role in roles" value="@{{ role.role_code }}">@{{ role.name }}</option>
                        </select>
                        <label class="error" ng-if="error.role_code[0] != null">@{{ error.role_code[0] }}</label>
                    </div>
                  </td>
                  <td>
                   <div class="form-group">
                        <input ng-model="user.email" type="text" name="email" class="form-control" id="email" placeholder="Enter an email">
                        <label class="error" ng-if="error.email[0] != null">@{{ error.email[0] }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        <input ng-model="user.password" type="password" name="password" class="form-control" id="password" placeholder="Type your password">
                        <label class="error" ng-if="error.password[0] != null">@{{ error.password[0] }}</label>
                    </div>
                  </td>
                </tr>
              </table>

              <div class="row" style="margin-top: 30px;">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <button ng-click="" type="submit" name="submit" class="btn btn-primary" style="margin-right:5px;">@lang('web.save')</button>
                    <button type="reset" class="btn btn-default" style="margin-left:5px;">@lang('web.cancel')</button>
                </div>
                 <div class="col-md-4"></div>
              </row>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>

  </div> <!-- /.ng-controller -->
@endsection    

@section('bottom-js')
<!-- Validatejs -->
<script src="{{ asset('assets/base/bower_components/validate.min.js') }}"></script>
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/user/UserCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/UserResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/RoleResource.js') }}"></script>
@endsection 