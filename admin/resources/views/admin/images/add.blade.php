@extends('admin.templates.master')

@section('title')
{{ trans('web.list_image') }}
@endsection 

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/theme/css/images.css') }}">
@endsection
@section('content')
<div ng-controller="ImageAdd">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="mg-bt-25">{{ trans('web.list_image') }}</h1>
    </section>

    <!-- Main content -->
    <section class="content content-image">
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
        <div class="col-md-2">
          <a href="{{ route('webImageIndex')}}"  class="btn btn-block btn-success">{{ trans('web.add_new_image') }}</a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12" >
          Drop File:
          <div ngf-drop  ng-model="files" class="drop-box"  ngf-max-size="320MB"
              ngf-drag-over-class="'dragover'" ngf-multiple="true" ngf-allow-dir="true"
              accept="image/*"  ngf-pattern="'image/*'">{{ trans('web.add_new_image') }}
              <p>{{ trans('web.add_new_image') }}</p> 
              <button class="button"  ngf-max-size="320MB" ngf-select="upload($files)" ng-model="file" name="files"   ngf-pattern="'image/*'" ngf-multiple="true" ngf-accept="'image/*'" >
              {{ trans('web.add_new_image') }}</button>
              <p>{{ trans('web.add_new_image') }}</p> 
          </div>    
        </div>
      
        <div class="col-xs-12 ">
          <div class="list-img-upload" >
            <div class="image centerMize" ng-repeat="path in pathImages |  orderBy:'-toString()'">
              <img class="imgeMize" src="{{storage_asset()}}/@{{path}}">     
            </div>
          </div>
        </div> 
      </div>   
    </section>

    
    <!-- /.content -->
</div>
@endsection  

@section('bottom-js')
<!-- Angular Ng-File-Upload -->
<script src="{{ asset('assets/frontend/extension/uploadImage.js') }}"></script>
<script src="{{ asset('assets/frontend/page/image/ImageCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ImageResource.js') }}"></script>

@endsection 