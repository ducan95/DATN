@extends('admin.templates.master')
@section('content')

  <div ng-controller="UserUpdateCtrl"> 

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          @lang('user.admin_user_edit')
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
            {{--  <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>  --}}
            <!-- /.box-header -->
            <form role="form" ng-submit="updateUser(user)" id="main">
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
                          <input ng-model="user.username" type="text" name="username" class="form-control" id="username" value="@{{ user.username }}">
                          <label class="error" ng-if="error.username[0] != null">@{{ error.username[0] }}</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                          <select ng-init="user.role_code=''" name="role_code" class="form-control" ng-model="user.role_code">
                            <option ng-repeat="role in roles" value="@{{ role.role_code }}">@{{ role.name }}</option>
                          </select>
                          <label class="error" ng-if="error.role_code[0] != null"></label>
                      </div>
                    </td>
                    <td>
                    <div class="form-group">
                          <input ng-model="user.email" type="email" name="email" class="form-control" id="email" value="@{{ user.email }}">
                           <label class="error" ng-if="error.email[0] != null">@{{ error.email[0] }}</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                          <input ng-model="user.password" type="password" name="password" class="form-control" id="password" value="">
                          <label class="error" ng-if="error.password[0] != null">@{{ error.password[0] }}</label>
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="row" style="margin-top: 30px;">
                  <div class="col-md-4"></div>
                  <div class="col-md-4 text-center">
                      <button type="submit" href="" ng-click="updateUser(user)" name="submit" class="btn btn-primary" style="margin-right:5px;">@lang('web.edit')</button>
                      <button type="reset" href="" class="btn btn-primary" style="margin-left:5px;">@lang('web.cancel')</button>
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
    <!-- /.content -->

  </div>

@endsection

@section('bottom-js')
<!-- Validatejs -->
<script src="{{ asset('assets/base/bower_components/validate.min.js') }}"></script>
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/user/UserCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/UserResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/RoleResource.js') }}"></script>
@endsection 