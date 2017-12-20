@extends('templates.master')
@section('content')

  <div ng-controller="UserAddCtrl"> 

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tạo mới người dùng
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
            <!-- /.box-header -->
            <form role="form" method="post" id="main" ng-submit="addUser()">
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
                        <input ng-model="user.username" type="text" name="username" class="form-control" id="username" placeholder="Enter name">
                        <label class="error"></label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        {{--  <label>Chọn Q</label>  --}}
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
                        <input ng-model="user.email" type="email" name="email" class="form-control" id="email" placeholder="Enter an email">
                        <label class="error"></label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        <input ng-model="user.password" type="password" name="password" class="form-control" id="password" placeholder="Type your password">
                        <label class="error"></label>
                    </div>
                  </td>
                </tr>
              </table>

              <div class="row" style="margin-top: 30px;">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-right:5px;">Add</button>
                    <button type="reset" class="btn btn-primary" style="margin-left:5px;">Cancel</button>
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
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/user/UserCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/UserResource.js') }}"></script>
<script src="{{ asset('assets/theme/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/theme/js/validate.js') }}"></script>
@endsection 