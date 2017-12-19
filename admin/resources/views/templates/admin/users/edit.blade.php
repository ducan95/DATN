@extends('templates.master')
@section('content')

  <div ng-controller="UserUpdateCtrl"> 

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Chỉnh sửa người dùng
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
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
            <form role="form" ng-submit="updateUser()" id="main">
              {{ csrf_field() }}
              <div class="box-body">
                <table class="table table-bordered">
                  <tr>
                    <th>Tên người dùng</th>
                    <th>Quyền hạn</th>
                    <th>Email</th>
                    <th>Password</th>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                          <input ng-model="user.username" type="text" name="username" class="form-control" id="username" value="@{{ user.data.username }}">
                          <label class="error">@{{ error.username }}</label>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                          <select ng-init="user.id_role=''" ng-model="user.id_role" name="id_role" class="form-control">
                              <option value="">Chọn quyền</option>
                              <option value="1">Admin</option>
                              <option value="2">Mod</option>
                              <option value="3">User</option>
                          </select>
                          <label class="error"></label>
                      </div>
                    </td>
                    <td>
                    <div class="form-group">
                          <input ng-model="user.email" type="email" name="email" class="form-control" id="email" value="@{{ user.email }}">
                          <label class="error"></label>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                          <input required ng-model="user.password" type="password" name="password" class="form-control" id="password" placeholder="Type your password">
                          <label class="error"></label>
                      </div>
                    </td>
                  </tr>
                </table>

                <div class="row" style="margin-top: 30px;">
                  <div class="col-md-4"></div>
                  <div class="col-md-4 text-center">
                      <a href="" ng-click="updateUser()" name="submit" class="btn btn-primary" style="margin-right:5px;">Update</a>
                      <a href="" class="btn btn-primary" style="margin-left:5px;">Cancel</a>
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
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/user/UserCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/UserResource.js') }}"></script>
<script src="{{ asset('assets/theme/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/theme/js/validate.js') }}"></script>
@endsection 