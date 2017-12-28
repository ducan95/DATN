@extends('admin.templates.master')
@section('content')
<div ng-controller="ReleaseCtrl">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ trans('release.listRelease') }}
        {{-- <small>preview of simple tables</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <div class="pad margin no-print">
     <div class="row" style="margin-bottom: 15px;margin-top:15px;margin-left:-10px;">
        <div class="col-md-2">
            <a href="{{ route('webReleaseAdd') }}" class="btn btn-block btn-success">{{ trans('release.addRelease') }}</a>
        </div>
      </div>
    </div>
    <!-- /.content -->

    <section class="invoice release-section" ng-repeat="release in releases | orderBy: '-id_release_number' ">
      <div class="row">
        <div class="col-md-3 text-center">
          <img src="{{ storage_asset() }}/@{{ release.image_release_path }}" class="img-responsive release-img" alt="">
        </div>
        <div class="col-md-6">
          <img src="{{ storage_asset() }}/@{{ release.image_header_path }}" class="img-responsive release-img-mobile" alt="">
          <h4>@{{ release.name }}</h4>
        </div>
        <div class="col-md-3 text-left">
          <a href="" style="margin-right: 2px" class="btn btn-primary">{{ trans('web.edit') }}</a>
          <a href="" style="margin-left: 2px" class="btn btn-default">
            <i class="fa fa-trash-o"></i>
          </a>
        </div>
        <!-- /.col -->
      </div>
    </section>

    <section class="invoice pg-section">
      <div class="row text-center">
        <ul class="pagination no-margin text-center">
          <li>
            <a href="#">«</a>
          </li>
          <li>
            <a href="#">1</a>
          </li>
          <li class="active">
            <a href="#">2</a>
          </li>
          <li>
            <a href="#">..</a>
          </li>
          <li>
            <a href="#">3</a>
          </li>
          <li>
            <a href="#">»</a>
          </li>
        </ul>
      </div>
    </section>
</div>
@endsection  

@section('bottom-js')
<script src="{{ asset('assets/frontend/page/release/ReleaseCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ReleaseResource.js') }}"></script>
@endsection 