@extends('admin.templates.master')
@section('content')
<div ng-controller="Editcategoryparent">
	<section class="content-header">
		<h2>List Category</h2>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<form class="form-horizontal" role="form" ng-submit="updateCategory(categoryparent)" id="editparent">
						<div class="box-body">
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Category Name</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" ng-model="categoryparent.name" name="name">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Name Alphabet For Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model='categoryparent.slug' name="slug">
                </div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">Global Status</label>
              	<div class="col-sm-9">
              		<input type="checkbox" name="global_status" value="1" ng-model="categoryparent.global_status">
              	</div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">Menu Status</label>
              	<div class="col-sm-9">
              		<input type="checkbox" name="menu_status" value="1" ng-model="categoryparent.menu_status">
              	</div>
              </div>
              <div class="row" style="padding-bottom: 20px">
              	<div class="col-md-4"></div>
		            <div class="col-md-4 text-center">
                  <button type="submit" ng-click="updateCategory(categoryparent)" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
                  <a href="{{ route('webCategoryIndex') }}"><button type="button" class="btn btn-primary" style="margin-left:5px;">Cancel</button></a>
	              </div>
            	<div class="col-md-4"></div>
             </div>
           </div>
          </form>    
        </div>
			</div>
		</div>
</section>
</div>

@endsection  
@section('bottom-js')

<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
@endsection 

              
	

						
		
	                


                



