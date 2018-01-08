@extends('admin.templates.master')
@section('content')

  <div ng-controller="MemberUpdateCtrl"> 

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Edit member
        {{--<small>preview of simple tables</small>--}}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- /.box-header -->
            <form role="form" method="post" id="main" ng-submit="updateMember(member)">
            {{ csrf_field() }}
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Birthday</th>
                  <th>Gender</th>
                </tr>
                <tr>
                  <td>
                    <div class="form-group">
                        <input ng-model="member.email" type="email" name="email" class="form-control" id="email" value="@{{ member.email }}" >
                        <label class="error" ng-if="error.email[0] != null">@{{ error.email[0] }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        <input ng-model="member.password" type="password" name="password" class="form-control" id="password">
                        <label class="error" ng-if="error.password[0] != null">@{{ error.password[0] }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="input-group date">
                        <input ng-model="member.birthday" type="date" name="birthday" class="form-control" value="@{{ member.birthday }}">
                        <!-- <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div> -->
                      </div>
                      <label class="error" ng-if="error.birthday[0] != null">@{{ error.birthday[0] }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <select ng-model="member.gender" ng-init="genders = [{name: 'Female', value: 0},{name: 'Male', value: 1}]" class="form-control" name="gender">
                        <option ng-selected="gender.value == member.gender" ng-repeat="gender in genders" value="@{{ gender.value }}">@{{ gender.name }}</option>
                        <!-- <option value="">---Chọn giới tính---</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option> -->
                      </select>
                      <label class="error" ng-if="error.gender[0] != null">@{{ error.gender[0] }}</label>
                    </div>
                  </td>
                </tr>
              </table>

              <div class="row" style="margin-top: 30px;">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <button ng-click="updateMember(member)" type="submit" name="submit" class="btn btn-primary" style="margin-right:5px;">@lang('web.save')</button>
                    <a href="{{ route('webMemberIndex') }}"><button type="button" class="btn btn-primary" style="margin-left:5px;">@lang('web.cancel')</button></a>
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
<script src="{{ asset('assets/base/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('assets/frontend/resource/MemberResource.js') }}"></script>
<script src="{{ asset('assets/frontend/page/member/MemberCtrl.js') }}"></script>
<script>

</script>
@endsection 