@extends('admin.templates.master')
@section('content')
<div ng-controller="MemberCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List user
      </h1>
      {{--<ol class="breadcrumb">--}}
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li><a href="#">Tables</a></li>--}}
        {{--<li class="active">Simple</li>--}}
      {{--</ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
        <div class="col-md-2">
            <a href="{{ route('webUserAdd') }}" class="btn btn-block btn-success">Add new user</a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="user-table">
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Birthday</th>
                  <th>Gender</th>
                  <th>Password</th>
                  <th></th>
                </tr>
                <tr ng-repeat="member in members | orderBy : 'id_member'">
                  <td ng-bind="$index+1"></td>
                  <td ng-bind="member.email"></td>
                  <td ng-bind="member.birthday"></td>
                  <td ng-if="member.gender==false">Male</td>
                  <td ng-if="member.gender==true">Female</td>
                  <td>**********</td>
                  <td>
                    <a href="" ng-click="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" ng-click="deleteMember(member.id_member)"><i class="fa fa-trash-o"></i>Delete</a>
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
<script src="{{ asset('assets/frontend/page/member/MemberCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/MemberResource.js') }}"></script>
@endsection 