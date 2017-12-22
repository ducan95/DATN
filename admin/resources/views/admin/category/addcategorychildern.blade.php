@extends('admin.templates.master')
@section('content')

<div ng-controller='CategoryChildrenAddCtrl'>
	<section class="content-header">
		<h2>List Category</h2>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<form class="form-horizontal" ng-submit='addCategoryChil()' method="post">
						{{ csrf_field() }}	
					 <div class="box-body">
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Category Name</label>
                <div class="col-sm-9">
                  <input class="form-control" ng-model="categorychil.name" placeholder="...name" name="name" type="text">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Name Alphabet For Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model='categorychil.slug' name="slug" placeholder="...slug" >
                </div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">Display Global Navi</label>
              	<div class="col-sm-9">
              		<input type="checkbox" name="global_status" value="1" ng-model="categorychil.global_status">
              	</div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">Display Menu Bar</label>
              	<div class="col-sm-9">
              		<input type="checkbox"  name="menu_status" value="1" ng-model="categorychil.menu_status">
              	</div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">Parent Name</label>
              	<div class="col-sm-9">
              		<!-- <input type="text" ng-model="category.name"  class="form-control" disabled>
                  <input type="hidden" ng-model="categorychil.id_category" ng-value="id_category" name="id_category"> -->
                    <!-- <select  class="form-control" ng-sele>
                      <option ng-repeat="cate in categorytparent" value="id_category">@{{ cate.name }}</option>
                    </select> -->
                    <select type="text" class="form-control" ng-options="cate.id_category as cate.name for cate in categorytparent" ng-model="categorychil.parent_category">
                    </select>
              	</div>
              </div>
              <div class="row" style="padding-bottom: 20px">
              	<div class="col-md-4"></div>
		            <div class="col-md-4">
                  <button type="submit" class="btn btn-primary" style="margin-left: 95px" data-toggle="modal" data-target="#myModal"> Add</button>
                </div>  
								<div class="col-md-4">
                    <a href="{{route('webCategoryIndex')}}"><button type="button" class="btn btn-primary" style="margin-left: -200px">Cancel</button></a>
                </div>    
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

<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>

@endsection 
				             

	              
		
			

                



		              	


							
	             
