@extends('admin.templates.master')
@section('content')
<div ng-controller="ImageCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
     <h3>List hinh anh da dang ki</h3>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
        <div class="col-md-2">
          <a href="{{ route('webImageAdd')}}"  class="btn btn-block btn-success">Add new</a>
        </div>
        <div class="col-md-10">
          <div class="box-tools">
            <div class="input-group input-group-sm" >
              <input type="text" name="table_search" ng-model='parameter' class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" ng-click="searchImage()" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 " >
          <div class="item-image" ng-repeat="image in images">
            <div class="content-image-left ">
              <a href="javascript:void(0)"  ng-click="deleteImage(image.id_image, $index)">
                <i class="fa  fa-trash"></i></a>
            </div>
            <div class="content-image-right">
              <div class="content-image-top">
                <div class="image">
                  <a href="{{storage_asset()}}/@{{image.path}}">
                    <img  style="width: 50px; height: 50px;" src="{{storage_asset()}}/@{{image.path}}">
                  </a>
                </div>
                <div class="name">
                    <div class="name-image">
                      <a href="">@{{image.name}}</a>
                    </div>  
                    <div class="name-archive">
                      <span>@{{image.namePost}}</span>
                    </div> 
                </div>
                <div class="create">@{{image.created_at}}</div>
                <div class="clear"></div>
              </div>
              <div class="content-image-bottom">
                <div class="path"><a href="">URL Image</a></div>
                <div class="url-image">
                  <a href="{{storage_asset()}}/@{{image.path}}">{{storage_asset()}}/@{{image.path}}</a>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>
@endsection  

@section('bottom-js')

<script src="{{ asset('assets/frontend/page/image/ImageCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ImageResource.js') }}"></script>

@endsection 