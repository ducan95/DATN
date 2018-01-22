@extends('admin.templates.master')
@section('content')
<div ng-controller="PostCtrl" ng-init="getPosts(1)">
	<section class="content-header">
		<div class="row">
			<div class="col-md-2">
				<h1>
		      List Post
		    </h1>
		  </div>
		  <div class="col-md-2">
		    	<a href="{{ route('webPostAdd')}}"><button class="btn btn-primary" style="margin-top:20px ">Creat New Post</button></a>
		  </div>
    </div>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Simple</li>
    </ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-2">
				<label>Release Number</label>
				<select name='releaseNumber' ng-model='releaseNumber'>
					<option value="1">zxcxzc</option>
					<option value="2">zxcxzc</option>
				</select>
			</div>
			<div class="col-md-2">
				<label>Category Parent</label>
          <select name='categoryParent' ng-model='categoryParent' ng-change='getCatChildren()'>
            <option 
            	ng-repeat="cat in listCatParent" 
            	value="@{{cat.id_category }}"
              ng-bind="cat.name"
              ng-selected = "cat.id_category == 1 ">
            </option>
          </select>
			</div>
			<div class="col-md-2">
				<label>Category Children</label>
          <select name='categoryChildren' ng-model='categoryChildren' style="width: 115px">
            <option 
            	ng-repeat="catChildrent in listCatChildrent"
              value="@{{catChildrent.id_category }}"
              ng-bind="catChildrent.name" >
            </option>
          </select>
			</div>
			<div class="col-md-2">
				<label style="width: 110px">Status</label>
  			 <select ng-model = "status">
  			 	<option ng-repeat= "item in listStatus" value="@{{item.id}}" ng-bind = "item.name"></option>
  			 </select>
			</div>
			<div class="col-md-2">
				<label>Creator</label>
			</div>
			<a href="#"><button class="btn btn-primary" style="margin-left: 50px" ng-click="searchPost()">Search</button></a>
		</div>

		<div class="btn-group" role="group" style="margin-top: 10px">
			<a href="#"><button type="button" class="btn btn-primary">Draff</button></a>
			<a href="#"><button type="button" class="btn btn-primary">List Confirm</button></a>
		</div>
		<div class="box" style="margin-top: 10px">
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">Thumbnail</th>
            <th>Title</th>
            <th>Creator</th>
            <th>Category</th>
            <th>Release Number</th>
            <th>Date Public</th>
            <th>status</th>
          </tr>
          <tr ng-repeat="post in posts">
            <td>
              <img  style="width: 60px; height: 60px;" src="{{storage_asset()}}/@{{post.thumbnail_path}}">
            </td>
            <td ng-bind="post.title"></td>
            <td ng-bind="post.creator"></td>
            <td ng-bind="post.categories_name"></td>
            <td ng-bind="post.release_name"></td>
            <td ng-bind="post.time_begin"></td>
            <td>
			<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" ng-click="ridirectquickedit(post.id_post)">Quick Edit</button>
			<form id="myModal" class="modal fade" role="form" ng-submit="quickedit(editpost)">
				<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Quick Edit</h4>
				  </div>
				  <div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label class="col-md-3">Post Title</label>
							<div class="col-md-9">
								<input type="text" name="title" class="form-control" ng-model="editpost.title">
							</div>
						</div>
						<div class="form-group" style="padding-top: 40px">
							<label class="col-md-3">Release Number</label>
							<div class="col-md-9">
								<select class="form-control" ng-model="editpost.releasenumber">
									<option ng-repeat="option in listRelease.availableOptions" 
						      					value="@{{option.id_release_number}}"
						      					ng-bind="option.name" 
						      					ng-selected="@{{option.id_release_number == 2}}">
						      		</option>
								</select>
							</div>
						</div>
						<div class="form-group" style="padding-top: 40px">
							<label class="col-md-3">Date Start</label>
							<div class="col-md-9">
								<input type="datetime" name="time_begin" class="form-control" ng-model="editpost.time_begin">
							</div>
						</div>
						<div class="form-group" style="padding-top: 40px">
							<label class="col-md-3">Date End</label>
							<div class="col-md-9">
								<input type="datetime" name="time_end" class="form-control" ng-model="editpost.time_end">
							</div>
						</div>
						<div class="form-group" style="padding-top: 40px">
							<label class="col-md-3">Status</label>
							<div class="col-md-9">
								<select ng-model="editpost.status_post">
									<!-- <option ng-value="Draff" selected="selected"></option>
									<option ng-value="ABC"></option>
									<option ng-value="EFK"></option> -->
									<option ng-repeat= "st in status" value="@{{st.id}}" ng-bind = "st.name"></option>
								</select>
							</div>
						</div>
					</div>
				  </div>
				<div class="modal-footer">
					<button type="submit" ng-click="quickedit(editpost)" data-dismiss="modal" class="btn btn-primary">Update</button>
				  </div>
				</div>
			  </div>
			</form>
			<a href="#"><button class="btn btn-primary">Nhan Ban</button></a>
			<a href="#"><button class="btn btn-primary">View</button></a>
			<a href="#"><button class="btn btn-primary">Edit</button></a>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer clearfix">
        <div ng-if = "lastPage > 1" class="row text-center">
			    <ul class="pagination">
			      <li ng-if="currentPage == 1" class="disabled">
			        <a href="javascript:void(0)">Prev</a>
			      </li>
			      <li  ng-show="currentPage != 1">
			        <a  href="javascript:void(0)"  ng-click=getPosts(prePage)>Prev</a>
			      </li>
			      <li ng-repeat="i in totalPages" ng-class="{active : currentPage == i}">
			        <a href="javascript:void(0)" ng-bind="i" ng-click=getPosts(i)></a>
			      </li>
			      <li  ng-show="currentPage != lastPage" >
			        <a href="javascript:void(0)"  ng-click=getPosts(nextPage)>Next</a>
			      </li>
			      <li ng-if="currentPage == lastPage" class="disabled">
			        <a href="javascript:void(0)">Next</a>
			      </li>
			    </ul>  
			  </div>
      </div>
    </div>
		</div>
	</section>
</div>	
@endsection
@section('bottom-js')
<script src="{{ asset('assets/frontend/resource/PostResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ImageResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ReleaseResource.js') }}"></script>
<script src="{{ asset('assets/frontend/extension/uploadImage.js') }}"></script>
<script src="{{ asset('assets/frontend/extension/tranDate.js') }}"></script>
<script src="{{ asset('assets/frontend/page/post/PostCtrl.js') }}"></script>
@endsection 


		      
							        			
							        			
