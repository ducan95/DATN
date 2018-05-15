@extends('admin.templates.master')

@section('title')
{{ trans('web.list_image') }}
@endsection 

@section('content')
<div ng-controller="ImageCtrl" ng-init="getImages(1)">
   <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>{{ trans('web.list_image') }}</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-bottom: 25px;margin-top:15px;">
        <div class="col-md-2">
          <a href="{{ route('webImageAdd')}}"  class="btn btn-block btn-success">{{ trans('web.add_new_image') }}</a>
        </div>
        <div class="col-md-4 col-md-offset-6">
          <div class="box-tools">
            <div class="input-group input-group-sm" >
              <input type="text" name="table_search" ng-model='parameter' class="form-control pull-right" placeholder="">

              <div class="input-group-btn">
                <button type="submit" ng-click="searchImage()" class="btn btn-default"> Tìm kiếm</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
              <table class="table table-striped">
                <tr ng-repeat="image in images" class="media-wrap">
                  <td style="width: 10px;padding-left: 30px">
                    <button ng-click="deleteImage(image.id_image, $index)" type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  </td>
                  <td style="padding-left: 20px">
                    <div class="media-thumbnail">
                      <div class="media-img" style="background-image: url('{{storage_asset()}}/@{{image.path}}')"></div>
                    </div>
                    <p class="media-name">
                      <p>
                      <a data-lightbox="image-1" href="{{storage_asset()}}/@{{image.path}}">{{ storage_asset() }}/@{{ image.path }}</a>
                    </p>
                      <button title="Copy URL image to clipboard" class="btn btn-copy" ngclipboard ngclipboard-success="onSuccess(e);" ngclipboard-error="onError(e);" data-clipboard-text="{{storage_asset()}}/@{{image.path}}">Sao chép
                        <!-- <img src="{{ asset('assets/img/icon/clippy.svg') }}" alt="Copy to clipboard"> -->
                      </button>
                      <span ng-bind="image.name"></span>
                    </p>
                   
                  </td>
                  <td style="width: 200px" ng-bind="image.created_at"></td>
                </tr>
              </table>
            </div>
          </div>
          {{-- <div class="item-image" ng-repeat="image in images">
            <div class="content-image-left ">
              <a href="javascript:void(0)"  ng-click="deleteImage(image.id_image, $index)">
                <i class="fa  fa-trash"></i></a>
            </div>
            
            <div class="content-image-right">
              <div class="content-image-top">
                <div class="image">
                  <a href="{{storage_asset()}}/@{{image.path}}">
                    <img style="width: 50px; height: 50px;" src="{{storage_asset()}}/@{{image.path}}">
                  </a>
                </div>
                <div class="name">
                    <div class="name-image">
                      <a href="" ng-bind = "image.name"></a>
                    </div>  
                    <div class="name-archive">
                      <span ng-bind = "image.namePost"></span>
                    </div> 
                </div>
                <div class="create" ng-bind = "image.created_at"></div>
                <div class="clear"></div>
              </div>
              <div class="content-image-bottom">
                <div class="path"><a href="">URL Image</a></div>
                <div class="url-image">
                  <a href="{{storage_asset()}}/@{{image.path}}" rel="lightbox">{{storage_asset()}}/@{{image.path}}</a>
                </div>
              </div>
            </div>
            <div class="clear"></div>
          </div> --}}
        </div>
      </div>
    </section>

  <div ng-if = "lastPage > 1" class="row text-center">
    <ul class="pagination">
      <li ng-if="currentPage == 1" class="disabled">
        <a href="javascript:void(0)">Prev</a>
      </li>
      <li  ng-show="currentPage != 1">
        <a  href="javascript:void(0)"  ng-click=getImages(prePage)>Prev</a>
      </li>
      <li ng-repeat="i in totalPages" ng-class="{active : currentPage == i}">
        <a href="javascript:void(0)" ng-bind="i" ng-click=getImages(i)></a>
      </li>
      <li  ng-show="currentPage != lastPage" >
        <a href="javascript:void(0)"  ng-click=getImages(nextPage)>Next</a>
      </li>
      <li ng-if="currentPage == lastPage" class="disabled">
        <a href="javascript:void(0)">Next</a>
      </li>
    </ul>  
  </div>  <!-- /.content -->
  
</div>
@endsection  

@section('bottom-js')
<script src="{{ asset('assets/frontend/page/image/ImageCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ImageResource.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/paging.js') }}"></script>
@endsection 