@extends('admin.templates.master')
@section('content')
<div ng-controller="MemberCtrl" ng-init="getMembers(1)">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ trans('web.list_member') }}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
        <div class="col-md-2">
            <a href="{{ route('webMemberAdd') }}" class="btn btn-block btn-success">{{ trans('web.add_new_member') }}</a>
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
                <tr ng-repeat="member in members">
                  <td ng-bind="member.id_member"></td>
                  <td ng-if="member.is_active == false" style="color: red; text-decoration: line-through;" ng-bind="member.email"></td>
                  <td ng-if="member.is_active == true" ng-bind="member.email"></td>
                  <td ng-if="member.is_active == false" ng-bind="member.birthday" style="color: red; text-decoration: line-through;" ></td>
                  <td ng-if="member.is_active == true" ng-bind="member.birthday"></td>
                  <td ng-if="member.gender==1">Male</td>
                  <td ng-if="member.gender==0">Female</td>
                  <td>***********</td>
                  <td>
                    <a href="javascript:void(0)" ng-click="redirectEdit(member.id_member)" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> {{ trans('web.edit') }}</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" ng-click="activeMember(member.id_member)"><i class="fa fa-trash-o"></i>{{ trans('web.active') }}</a>
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

    <div ng-if = "lastPage > 1" class="row text-center">
    <ul class="pagination">
      <li ng-if="currentPage == 1" class="disabled">
        <a href="javascript:void(0)">Prev</a>
      </li>
      <li  ng-show="currentPage != 1">
        <a  href="javascript:void(0)"  ng-click=getMembers(prePage)>Prev</a>
      </li>
      <li ng-repeat="i in totalPages" ng-class="{active : currentPage == i}">
        <a href="javascript:void(0)" ng-bind="i" ng-click=getMembers(i)></a>
      </li>
      <li  ng-show="currentPage != lastPage" >
        <a href="javascript:void(0)"  ng-click=getMembers(nextPage)>Next</a>
      </li>
      <li ng-if="currentPage == lastPage" class="disabled">
        <a href="javascript:void(0)">Next</a>
      </li>
    </ul>  
  </div>
  <!-- /.content -->
</div>
@endsection  

@section('bottom-js')
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/member/MemberCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/MemberResource.js') }}"></script>
@endsection 