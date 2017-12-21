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
					<form class="form-horizontal" method="post" ng-submit='addCategory()'>
					 {{ csrf_field() }}	
					<div class="box-body">
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Category Name</label>
	                  <div class="col-sm-9">
	                    <input required ng-model="category.name" class="form-control" id="" placeholder="" type="text"  name="name">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="" class="col-sm-3 control-label">Name Alphabet For Address</label>
	                  <div class="col-sm-9">
	                    <input type="text" class="form-control" id="" placeholder="" ng-model="category.slug" name="slug">
	                  </div>
	                </div>
	                <div class="form-group">
	                	<label class="col-sm-3 control-label">Display Global Navi</label>
	                	<div class="col-sm-9">
	                		<input type="checkbox" ng-model="category.global_status" name="global_status" value="1">
	                	</div>
	                </div>
	                <div class="form-group">
	                	<label class="col-sm-3 control-label">Display Menu Bar</label>
	                	<div class="col-sm-9">
	                		<input type="checkbox" ng-model="category.menu_status" name="menu_status" value="1">
	                	</div>
	                </div>

	                <div class="row" style="padding-bottom: 20px">
		              	<div class="col-md-4"></div>
				            	<div class="col-md-4 text-center">
		                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
												  Add
												</button>

												<!-- <div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title">Register parent category?</h4>
												      </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
												        <button type="submit" name="submit" class="btn btn-primary">Yes</button>
												      </div>
												    </div>
												  </div>
												</div> -->
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
<!-- Toggle -->		
<script src="{{ asset('assets/base/bower_components/bootstrap/dist/js/bootstrap-toggle.min.js') }}"></script>
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
@endsection 

  
	              
		
			

                


