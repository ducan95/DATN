@extends('admin.templates.master')
@section('content')

  <div ng-controller="MembAddCtrl"> 

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Add new member
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
            <form role="form" method="post" id="main" ng-submit="addMember()">
            {{ csrf_field() }}
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Email</th>
                  <th>Birthday</th>
                  <th>Gender</th>
                  <th>Password</th>
                </tr>
                <tr>
                  <td>
                    <div class="form-group">
                        <input ng-model="member.email" type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                        <label class="error" ng-if="error.username[0] != null">@{{ error.username[0] }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" placeholder="Pick your date">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <select class="form-control">
                          <option value="true">Male</option>
                          <option value="false">Female</option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        <input ng-model="member.password" type="password" name="email" class="form-control" id="password" placeholder="Enter password">
                        <label class="error" ng-if="error.username[0] != null">@{{ error.username[0] }}</label>
                    </div>
                  </td>
                </tr>
              </table>

              <div class="row" style="margin-top: 30px;">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <button ng-click="" type="submit" name="submit" class="btn btn-primary" style="margin-right:5px;">@lang('web.save')</button>
                    <button type="reset" class="btn btn-primary" style="margin-left:5px;">@lang('web.cancel')</button>
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
<script src="{{ asset('assets/frontend/page/user/MemberCtrl.js') }}"></script>
<script>

</script>
@endsection 