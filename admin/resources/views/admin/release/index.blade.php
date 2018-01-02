@extends('admin.templates.master')
@section('content')
<div ng-controller="ReleaseCtrl" ng-init="getImages(1)">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ trans('release.listRelease') }}
      </h1>
    </section>

    <div class="pad margin no-print">
     <div class="row" style="margin-bottom: 15px;margin-top:15px;margin-left:-10px;">
        <div class="col-md-2">
            <a href="{{ route('webReleaseAdd') }}" class="btn btn-block btn-success">{{ trans('release.addRelease') }}</a>
        </div>
      </div>
    </div>
    <!-- /.content -->

    <section class="invoice release-section" ng-if="releases != undefine" ng-repeat="release in releases">
      <div class="row">
        <div class="col-md-3 text-center">
          <img src="{{ storage_asset() }}/@{{ release.image_release_path }}" class="img-responsive release-img" alt="">
        </div>
        <div class="col-md-6">
          <img src="{{ storage_asset() }}/@{{ release.image_header_path }}" class="img-responsive release-img-mobile" alt="">
          <h4>@{{ release.name }}</h4>
        </div>
        <div class="col-md-3 text-left">
          <a href="" ng-click="redirectEdit(release.id_release_number)" style="margin-right: 2px" class="btn btn-primary">{{ trans('web.edit') }}</a>
          <a href="javascript:void(0)" ng-click="delete(release.id_release_number)" style="margin-left: 2px" class="btn btn-default">
            <i class="fa fa-trash-o"></i>
          </a>
        </div>
        <!-- /.col -->
      </div>
    </section>

    <section class="invoice pg-section">
      <div class="row text-center">
        <ul class="pagination no-margin text-center">
          <li ng-if="currentPage == 1" class="disabled">
            <a href="javascript:void(0)">«</a>
          </li>
          <li ng-if="currentPage != 1">
            <a href="javascript:void(0)" ng-click=getImages(prePage)>«</a>
          </li>
          <li ng-repeat="i in totalPages" ng-class="{ active: currentPage == i }">
            <a href="javascript:void(0)" ng-bind="i" ng-click=getImages(i)></a>
          </li>
          <li ng-show="currentPage != lastPage" >
            <a href="javascript:void(0)" ng-click=getImages(nextPage)>»</a>
          </li>
          <li ng-if="currentPage == lastPage" class="disabled">
            <a href="javascript:void(0)">»</a>
          </li>
        </ul>
      </div>
    </section>
</div>
@endsection  

@section('bottom-js')
<script src="{{ asset('assets/frontend/page/release/ReleaseCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ReleaseResource.js') }}"></script>
<!-- Angular Paging -->
<script src="{{ asset('assets/base/bower_components/paging.js') }}"></script>
@endsection 