@extends('admin.templates.master')
<link rel="stylesheet" href="{{ asset('assets/theme/css/posts.css') }}">
@section('content')
<div ng-controller="PostCtrl" ng-init="getPosts(1)">
	<section class="content-header">
		<div class="row">
			<div class="col-md-4">
				<h1>
		      Danh sách bài viết
		    </h1>
		  </div>
		  <div class="col-md-2">
		    	<a href="{{ route('webPostAdd')}}"><button class="btn btn-primary" style="margin-top:20px ">Tạo mới bài viết</button></a>
		  </div>
    </div>
	</section>
	<section class="content">
		<div class="row">
			{{--  <div class="col-md-2">
				<label>Release Number</label>
				<select name="release" id="release" ng-model="listRelease.model">
		      	<option ng-repeat="option in listRelease.availableOptions" 
    					value="@{{option.id_release_number}}"
    					ng-bind="option.name" 
    					ng-selected="@{{option.id_release_number == 2}}">
		      	</option>
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
			<a href="#"><button class="btn btn-primary" style="margin-left: 50px" ng-click="searchPost()">Search</button></a>
		</div>  --}}

		<div class="btn-group" role="group" style="margin-top: 10px">
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
            <th>Xem</th>
						<th>Xóa</th>
						<th>Sửa</th>
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
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal" ng-click="review(post.id_post)">Xem</button>
                
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">@{{ editpost1 }}</h4>
                        </div>
                        <div class="modal-body">
                            <div ng-bind-html="editpost" class="editpost"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </td>
			<td>
				<a href="#"><button class="btn btn-primary">Xóa</button></a>
			</td>
			<td>	
				<a href="" ng-click="redirectEdit(post.id_post)" class="btn btn-sm btn-primary">Sửa</a>
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


		      
							        			
							        			
