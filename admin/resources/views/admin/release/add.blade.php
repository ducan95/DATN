@extends('admin.templates.master')

@section('content')
<div ng-controller="ReleaseAddCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ trans('release.addRelease') }}
        {{-- <small>preview of simple tables</small> --}}
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="row">
              <div class="col-md-9">
                <form role="form" method="post" id="main" ng-submit="addRelease()" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="txtName">{{ trans('release.nameRelease') }}</label>
                      <input ng-model="release.name" name="name" type="text" class="form-control" id="txtName" ng-init="release.name=date">
                      <label class="error" ng-if="error.name[0] != null">@{{ error.name[0] }}</label>
                    </div>

                    <div class="form-group">
                      <label for="input-file">{{ trans('release.imageRelease') }}</label>
                      <div 
                        ngf-drop ngf-select 
                        ng-model="release.releaseImage" 
                        class="upload-box" 
                        ngf-max-size="25MB"
                        ngf-drag-over-class="'box-dragover'" 
                        ngf-allow-dir="true"
                        accept="image/*"
                        ngf-pattern="'image/*'">
                        <span class="fa fa-cloud-upload upload-icon"></span>
                        {{ trans('release.addImage') }}
                     </div>
                    </div>

                    <div class="form-group">
                      <label for="input-file">{{ trans('release.headerRelease') }}</label>
                      <div 
                        ngf-drop ngf-select 
                        ng-model="release.headerImage" 
                        class="upload-box" 
                        ngf-max-size="25MB"
                        ngf-drag-over-class="'box-dragover'" 
                        ngf-allow-dir="true"
                        accept="image/*"
                        ngf-pattern="'image/*'">
                        <span class="fa fa-cloud-upload upload-icon"></span>
                        {{ trans('release.addImage') }}
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer text-center" style="padding-bottom: 70px">
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-right:5px;">{{ trans('web.confirm') }}</button>
                    <button type="reset" class="btn btn-default" style="margin-left:5px;">{{ trans('web.cancel') }}</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
    </section>
    <!-- /.content -->
</div>
@endsection  

@section('bottom-js')
<!-- AngularResource -->
<script src="{{ asset('assets/frontend/page/release/ReleaseCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ReleaseResource.js') }}"></script>
<!-- Validatejs -->
<script src="{{ asset('assets/base/bower_components/validate.min.js') }}"></script>
<!-- MomentJS -->
<script src="{{ asset('assets/base/bower_components/moment/moment.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/moment/locale/ja.js') }}"></script>
@endsection 