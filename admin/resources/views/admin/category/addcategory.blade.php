@extends('admin.templates.master')
@section('content')

<div ng-controller="CategoryAddCtrl">
	<section class="content-header">
		<h2>List Category</h2>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<form class="form-horizontal" id="main" method="post" ng-submit='addCategory()'>
					 {{ csrf_field() }}	
					<div class="box-body">
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Category Name</label>
	                  <div class="col-sm-9">
	                    <input ng-model="category.name" class="form-control" placeholder="...name" type="text"  name="name">
	                  	<label class="error" ng-if="error.name[0] != null">@{{ error.name[0] }}</label>
										</div>
	                </div>
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Name Alphabet For Address</label>
	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" placeholder="...slug" ng-model="category.slug" name="slug">
	                  	<label class="error" ng-if="error.slug[0] != null">@{{ error.slug[0] }}</label>
										</div>
	                </div>
	                <div class="form-group">
	                	<label class="col-sm-3 control-label">Display Global Navi</label>
	                	<div class="col-sm-9">
	                		<input type="checkbox" checked data-toggle="modal" ng-model="category.global_status"  name="global_status" value="1">
	                  	<label class="error" ng-if="error.global_status[0] != null">@{{ error.global_status[0] }}</label>
										</div>
	                </div>
	                <div class="form-group">
	                	<label class="col-sm-3 control-label">Display Menu Bar</label>
	                	<div class="col-sm-9">
	                		<input type="checkbox" checked data-toggle="modal" ng-model="category.menu_status"  
	                		name="menu_status" value="1">
	                  	<label class="error" ng-if="error.menu_status[0] != null">@{{ error.menu_status[0] }}</label>
	                	</div>
	                </div>
	                <div class="row" style="padding-bottom: 20px">
		              	<div class="col-md-4"></div>
				            	<div class="col-md-4 text-center">
		                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
												  Add
												</button>
		                    <a href="{{ route('webCategoryIndex') }}"><button type="button" class="btn btn-primary" style="margin-left:5px;">Cancel</button></a>
				              </div>
		              	<div class="col-md-4"></div>
	              	</div>
	              <!-- /.box-footer -->
	              </div>
	              <!-- /.box-body -->
            </form>
				</div>
			</div>
		</div>
	</section>
</div>	

	@endsection 
	
@section('bottom-js')
<!-- Validatejs -->
<script src="{{ asset('assets/base/bower_components/validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
@endsection 

  
	              
		
			

                



