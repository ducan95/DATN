@extends('admin.templates.master')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/sweetalert2/dist/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/theme/css/posts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/theme/css/angular-ui-switch.css') }}">
@endsection

@section('content')

<div ng-controller="PostCtrl">
	<section class="content-header">
		<h2>{{ trans('web.creat_new_post')}}</h2>
	</section>
	<section class="content">
		<div class="row">
				<form id="main" role="form" ng-submit="creatPost" method="post">
					<div class="col-md-9">
						<div class="form-group">
							<label class="col-sm-2">{{ trans('web.date_start_public')}}</label>
							<div class="col-sm-5">
								<input type="date" name="timeBegin" class="form-control" 
								ng-model="postBeginDate">
							</div>
							<label class="col-sm-2" id="status" ng-bind="status"></label>
						</div>
						<div class="form-group" id="dateend">
							<label class="col-sm-3" >{{ trans('web.date_end_public')}}</label>
							<label class="col-sm-3" ng-bind="dateStart"> </label>
							<div class="col-sm-2"></div>
						</div>
						<div class="form-group" id="article" >
							<input  type="text" name="title" ng-model='postTitle' style="width: 100%" >
						</div>
						<div>
							<textarea class="form-control ckeditor" rows="7" cols="10" id="editor1" 
							 name="content" ng-model="postcontent"></textarea>
							<!-- <ng-ckeditor id="editor1" ng-model="postcontent" skin="moono" remove-buttons="Image" remove-plugins="iframe,flash,smiley" msn-count="
							Number of typed characters:"></ng-ckeditor> -->
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4" id="creatfinish">
								<button class="btn btn-primary" type="submit" ng-click="creatPost()">{{ trans('web.creat_finish')}}</button>
							</div>	
							<div class="col-md-4"></div>
						</div>	
					</div>
					<div class="col-md-3">
						<div class=" box-solid">
							<div id="thumbnail">
								<p>{{ trans('web.thumbnail')}}</p>
                <div ngf-drop ngf-select  ng-model="thumbnail" class="drop-box"  ngf-max-size="320MB"
              ngf-drag-over-class="'dragover'" ngf-multiple="true" ngf-allow-dir="true"
              accept="image/*"  ngf-pattern="'image/*'" >{{ trans('web.add_new_image') }}
	              	<div class="re-thumbnail">
	              		<img ngf-thumbnail="thumbnail[0]" class="thumb">	
	              	</div>	
          			</div>
							</div>
							<div id="release">
								<span>{{ trans('web.release_number')}}</span>
      					<select name="release" id="release" ng-model="listRelease.model">
						      	<option ng-repeat="option in listRelease.availableOptions" 
			      					value="@{{option.id_release_number}}"
			      					ng-bind="option.name" 
			      					ng-selected="@{{option.id_release_number == 2}}">
						      	</option>
						    </select>
							</div>
							<div id="display">
								<p>{{ trans('web.display_top')}}</p>
								<input id="enabled" type="checkbox" name="statusPreviewTop"  ng-model="statusPreviewTop" value="1"></input>
							</div>
							<div id="category">
								<p>{{trans('web.category')}}</p>
								<ul class="sidebar-menu" data-widget="tree" ng-repeat="category in categories">
									<li class="">
					          <input type="checkbox" value="category.id_category">
					            <span>@{{ category.name }}</span>
					          <ul>
					            <li  ng-repeat="cate in categoryChildren" ng-if = "cate.id_category_parent ==  category.id_category">
					            	<input type="checkbox" ng-click="getcategory(cate.id_category)" ng-model="category">
					            	<span ng-bind="cate.name"></span>
					            </li>
					          </ul>
					          <!-- <ul>
					          	<li ng-repeat="cate in categoryChildren">
					          		<div ng-if="cate.id_category_parent == category.id_category ">
						          		<input type="checkbox" ng-model="cate.id_category">
						          		<span ng-bind="cate.name"></span>
					          		</div>
					          	</li>
					          </ul>
					        </li>			 -->				
								</ul>
								<!-- <ul class="sidebar-menu" data-widget="tree">
									<li ng-repeat="category in categoryParent">
										<input type="checkbox" value="category.id_category">
											<span ng-click="listcategorychil(id_category)">@{{category.name}}</span>
											<span class="pull-right-container"></span>
										<ul>
											<li ng-if="category.id_category_parent != 0">
												<input type="checkbox" value="category.id_category" ng-model="cate">
												<span ng-bind="category.name"></span>
											</li>
										</ul>	
									</li>
								</ul> -->
							</div>
							<div id="image">
								<p>{{ trans('web.image_for_post')}}</p>
                <div ngf-drop  ng-model="file" class="drop-box"  ngf-max-size="320MB"
		              ngf-drag-over-class="'dragover'" ngf-multiple="true" ngf-allow-dir="true"
		              accept="image/*"  ngf-pattern="'image/*'">{{ trans('web.add_new_image') }}
		              <div class= "re-image" >  
		              	<div class="box-image" ng-repeat="img in files"> 
		              		<img  src="{{storage_asset()}}/@{{img.data}}" class="thumb">	
		              		<a href="" class="btn-dele-img" ng-click="deleteImagePost($index, img.key)">
		              		  <i class="fa fa-close"></i>
		              		</a>
		              	</div>
		              	
		              </div>
          			</div>
						</div>
					</div>
				</form>
		</div>
	</section>	
</div>


@endsection
@section('bottom-js')<!-- 
<script text="text/javascript" src="{{ asset('assets/base/bower_components/ng-ckeditor.js') }}"></script> -->
<!-- <script text="text/javascript" src="{{ asset('assets/base/bower_components/ng-ckeditor.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('assets/base/bower_components/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/base/bower_components/ckeditor/adapters/jquery.js') }}"></script>
<script type="text/javascript">  
	 CKEDITOR.replace( 'editor1',
		{
			filebrowserBrowseUrl : '{{asset('assets/base/bower_components/ckfinder/ckfinder.html') }}',
			filebrowserImageBrowseUrl : '{{asset('assets/base/bower_components/ckfinder/ckfinder.html?type=Images')}}',
			filebrowserFlashBrowseUrl :'{{ asset('assets/base/bower_components/ckfinder/ckfinder.html?type=Flash')}}',
			filebrowserUploadUrl :'{{ asset('assets/base/bower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}',
			filebrowserImageUploadUrl : '{{ asset('assets/base/bower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
			filebrowserFlashUploadUrl : '{{asset('assets/base/bower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')}}',
		});
</script>
<script src="{{ asset('assets/base/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/PostResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ImageResource.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/ReleaseResource.js') }}"></script>
<script src="{{ asset('assets/frontend/extension/uploadImage.js') }}"></script>
<script src="{{ asset('assets/frontend/extension/tranDate.js') }}"></script>
<script src="{{ asset('assets/frontend/page/post/PostCtrl.js') }}"></script>
@endsection 

		      
					
	          	
									
