@extends('admin.templates.master')
@section('content')
<div>
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        発売号一覧
        <small>preview of simple tables</small>
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
            <a href="{{ route('webReleaseAdd') }}" class="btn btn-block btn-success">発売号新規登録</a>
        </div>
      </div>
    </div>
    <!-- /.content -->
    <section class="invoice release-section">
      <!-- title row -->
      <div class="row">
        <div class="col-md-3 text-center">
          <img src="{{ asset('assets/img/release/1.jpg') }}" class="img-responsive release-img" alt="">
        </div>
        <div class="col-md-6">
          <img src="{{ asset('assets/img/release/banner1.jpg') }}" class="img-responsive release-img-mobile" alt="">
          <h4>2016年10月14日号</h4>
        </div>
        <div class="col-md-3 text-left">
          <a href="" style="margin-right: 2px" class="btn btn-primary">編集</a>
          <a href="" style="margin-left: 2px" class="btn btn-default">
            <i class="fa fa-trash-o"></i>
          </a>
        </div>
        <!-- /.col -->
      </div>
    </section>

    <section class="invoice release-section">
      <!-- title row -->
      <div class="row">
        <div class="col-md-3 text-center">
          <img src="{{ asset('assets/img/release/2.jpg') }}" class="img-responsive release-img" alt="">
        </div>
        <div class="col-md-6">
          <img src="{{ asset('assets/img/release/banner2.png') }}" class="img-responsive release-img-mobile" alt="">
          <h4>2016年9月30日・10月7日 合併号</h4>
        </div>
        <div class="col-md-3 text-left">
          <a href="" style="margin-right: 2px" class="btn btn-primary">編集</a>
        </div>
        <!-- /.col -->
      </div>
    </section>

    <section class="invoice release-section">
      <!-- title row -->
      <div class="row">
        <div class="col-md-3 text-center">
          <img src="{{ asset('assets/img/release/6.jpg') }}" class="img-responsive release-img" alt="">
        </div>
        <div class="col-md-6">
          <img src="{{ asset('assets/img/release/banner6.jpg') }}" class="img-responsive release-img-mobile" alt="">
          <h4>2016年10月14日号</h4>
        </div>
        <div class="col-md-3 text-left">
          <a href="" style="margin-right: 2px" class="btn btn-primary">編集</a>
          <a href="" style="margin-left: 2px" class="btn btn-default">
            <i class="fa fa-trash-o"></i>
          </a>
        </div>
        <!-- /.col -->
      </div>
    </section>

    <section class="invoice pg-section">
      <div class="row">
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
@endsection 