@extends('admin.templates.master')

@section('title')
{{trans('web.Registration_releasenumber')}}
@endsection 

@section('content')
<div ng-controller="ReleaseEditCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="mg-bt-25">
        {{ trans('release.editRelease') }}
        {{-- <small>preview of simple tables</small> --}}
      </h1>
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
                <form role="form" name="myForm" method="post" id="main" ng-submit="updateRelease(release)" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="txtName">{{ trans('release.nameRelease') }}</label>
                      <input ng-model="release.name" name="name" type="text" class="form-control" id="txtName" value="@{{ release.name }}">
                      <label class="error" ng-if="error.name[0] != null">@{{ error.name[0] }}</label>
                    </div>

                    <div class="form-group">
                      <label for="input-file">{{ trans('release.imageRelease') }}</label>
                      <div 
                        ngf-drop ngf-select 
                        ng-model="release.image_release_path"
                        name="file"
                        class="upload-box" 
                        ngf-max-size="25MB"
                        ngf-drag-over-class="'box-dragover'" 
                        ngf-allow-dir="true"
                        accept="image/*"
                        ngf-pattern="'image/*'">
                        {{-- <span ng-if="release.image_release_path == undefined" class="fa fa-cloud-upload upload-icon"></span>
                        <b ng-if="release.image_release_path == undefined">{{ trans('release.addImage') }}</b>
                        <div ng-if="release.image_release_path != undefined" class="upload-preview">
                          <img ng-show="release.image_release_path" ngf-thumbnail="release.image_release_path" class=""> 
                        </div> --}}

                        <div ng-if="release.image_release_path != 'assets/img/no-image.jpg'" class="upload-preview">
                          <img src="{{ storage_asset() }}/@{{ release.image_release_path }}" class=""> 
                        </div>
                        <span ng-if="release.image_release_path == 'assets/img/no-image.jpg'" class="fa fa-cloud-upload upload-icon"></span>
                        <b ng-if="release.image_release_path == 'assets/img/no-image.jpg'">{{ trans('release.addImage') }}</b>
                     </div>
                    </div>
                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer text-center" style="padding-bottom: 70px">
                    <button type="submit" name="submit" class="btn btn-primary">{{ trans('web.confirm') }}</button>
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
<script src="{{ asset('assets/frontend/page/release/releaseCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/extension/uploadImage.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ReleaseResource.js') }}"></script>
<!-- Validatejs -->
<script src="{{ asset('assets/base/bower_components/validate.min.js') }}"></script>
@endsection 