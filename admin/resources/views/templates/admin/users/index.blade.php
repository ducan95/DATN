@extends('templates.master')
@section('content')
<div ng-controller="UserCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách người dùng
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
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
        <div class="col-md-2">
            <a href="{{ route('webUserAdd') }}" class="btn btn-block btn-success">Add new</a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="user-table">
                <tr>
                  <th>#No</th>
                  <th>Tên user</th>
                  <th>Quyền hạn</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Chức năng</th>
                </tr>
                <tr ng-repeat="user in users">
                  <td>@{{ user.id_user }}</td>
                  <td>@{{ user.username }}</td>
                  <td>@{{ user.id_role }}</td>
                  <td>@{{ user.email }}</td>
                  <td>**********</td>
                  <td>
                    <a href="{{ route('webUserEdit') }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    <a ng-controller="UserDeleteCtrl" href="" class="btn btn-sm btn-danger" ng-click="deleteUser(user)"><i class="fa fa-trash-o"></i> Delete</a>
                  </td>  
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
@endsection  

@section('bottom-js')
<!-- Edit table -->
<script src="{{ asset('assets/theme/js/jquery.tabledit.min.js') }}"></script>
<script src="{{ asset('assets/theme/js/edit-table.js') }}"></script>
<script src="{{ asset('assets/frontend/page/user/UserCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/UserResource.js') }}"></script>
@endsection 