@extends('admin.templates.master')

@section('title')
{{trans('web.Registration_releasenumber')}}
@endsection 

@section('content')

<div ng-controller="ReleaseCtrl" ng-init="getRelease(1)">
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
          <div class="release-thumb">
            {{-- 
            <a data-lightbox="image-1" href="{{ storage_asset() }}/@{{ release.image_release_path }}">
              <img ng-if="release.image_release_path != 'assets/img/no-image.jpg'" src="{{ storage_asset() }}/@{{ release.image_release_path }}" class="img-responsive release-img" alt="">
            </a>
            <img data-lightbox="image-1" ng-if="release.image_release_path == 'assets/img/no-image.jpg'" src="{{ asset('assets/img/no-image.jpg') }}" class="img-responsive release-img" alt=""> --}}
            <a data-lightbox="image-1" href="{{ storage_asset() }}/@{{ release.image_release_path }}">
              <div ng-if="release.image_release_path != 'assets/img/no-image.jpg'" class="release-img" style="background: url('{{ storage_asset() }}/@{{ release.image_release_path }}')"></div>
            </a>
            <a data-lightbox="image-1" href="{{ asset('assets/img/no-image.jpg') }}">
              <div ng-if="release.image_release_path == 'assets/img/no-image.jpg'" class="release-img" style="background: url('{{ asset('assets/img/no-image.jpg') }}')"></div>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="header-thumb">
            <div>
              <label for="" style=" padding-top: 11px;">Ngày phát hành:</label>
              <h4 ng-bind='release.created_at' style="float: right;"></h4>
            </div>
            <div>
              <label for="" style=" padding-top: 11px;padding-left: 0px;" class='col-md-5'>Số phát hành:</label>
              <h4 ng-bind="release.name" style="float: right;" class="col-md-5"></h4>
            </div>  
          </div>
        </div>
        <div class="col-md-3 text-left">
          <a href="" ng-click="redirectEdit(release.id_release_number)" style="margin-right: 2px" class="btn btn-primary">{{ trans('web.edit') }}</a>
          <a href="javascript:void(0)" ng-click="delete(release.id_release_number, $index)" style="margin-left: 2px" class="btn btn-danger">
            @lang('web.delete')
          </a>
        </div>
        <!-- /.col -->
      </div>
    </section>

    <section class="invoice pg-section">
      <div class="row text-center" ng-if="lastPage > 1">
        <ul class="pagination no-margin text-center">
          <li ng-click="pageChanged()" ng-if="currentPage == 1" class="disabled">
            <a href="javascript:void(0)">«</a>
          </li>
          <li ng-click="pageChanged()" ng-if="currentPage != 1">
            <a href="javascript:void(0)" ng-click=getRelease(prePage)>«</a>
          </li>
          <li ng-click="pageChanged()" ng-repeat="i in totalPages" ng-class="{ active: currentPage == i }">
            <a href="javascript:void(0)" ng-bind="i" ng-click=getRelease(i)></a>
          </li>
          <li ng-click="pageChanged()" ng-show="currentPage != lastPage" >
            <a href="javascript:void(0)" ng-click=getRelease(nextPage)>»</a>
          </li>
          <li ng-click="pageChanged()" ng-if="currentPage == lastPage" class="disabled">
            <a href="javascript:void(0)">»</a>
          </li>
        </ul>
      </div>
    </section>
</div>
@endsection  

@section('bottom-js')
<script src="{{ asset('assets/frontend/page/release/releaseCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ReleaseResource.js') }}"></script>
<!-- Angular Paging -->
<script src="{{ asset('assets/base/bower_components/paging.js') }}"></script>

@endsection 