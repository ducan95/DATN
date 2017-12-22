@extends('admin.templates.master')
@section('content')
<div ng-controller="UserCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ユーザー一覧
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
            <a href="{{ route('webUserAdd') }}" class="btn btn-block btn-success">新規追加</a>
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
                  <th>ユーザー名</th>
                  <th>権限</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Chức năng</th>
                </tr>
                <tr ng-repeat="user in users | orderBy : 'id_user'">
                  <td>@{{ '00' }}@{{ $index+1 }}</td>
                  <td>@{{ user.username }}</td>
                  <td ng-repeat="role in roles" ng-if="user.role_code == role.role_code">@{{ role.name }}</td>
                  <td>@{{ user.email }}</td>
                  <td>**********</td>
                  <td>
                    <a href="" ng-click="redirectEdit(user.id_user)" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> 編集</a>
                    <a href="javascript:void(0)" ng-if="user.role_code != 's_admin'" class="btn btn-sm btn-danger" ng-click="deleteUser(user.id_user)"><i class="fa fa-trash-o"></i> 削除</a>
                    <a href="javascript:void(0)" ng-if="user.role_code == 's_admin'" class="btn btn-sm btn-danger" href="javascript:void(0)"><i class="fa fa-trash-o"></i> 削除</a>
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
<script src="{{ asset('assets/frontend/resource/RoleResource.js') }}"></script>
@endsection 