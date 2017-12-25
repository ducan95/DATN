@extends('admin.templates.master')
@section('content')
<div ng-controller="ImageAdd">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>List hinh anh da dang ki</h3>
    </section>

    <!-- Main content -->
    <section class="content content-image">
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
        <div class="col-md-2">
          <a href="{{ route('webImageIndex')}}"  class="btn btn-block btn-success">Come Back</a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12" >
          Drop File:
          <div ngf-drop ngf-select ng-model="files" class="drop-box" 
              ngf-drag-over-class="'dragover'" ngf-multiple="true" ngf-allow-dir="true"
              accept="image/*,application/pdf" 
              ngf-pattern="'image/*,application/pdf'">Drop pdfs or images here or click to upload
             <!--  <input type="file" ng-model="files" name=""> -->
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