@extends('admin.templates.master')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/sweetalert2/dist/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/theme/css/posts.css') }}">
@endsection

@section('content')

<div ng-controller="PostCtrl">
	<section class="content-header">
		<h2>Creat New Post</h2>
	</section>
	<section class="content">
		<div class="row">
				<form id="main" role="form" >
					<div class="col-md-9">
						<div class="form-group">
							<label class="col-sm-2">Date Start Public</label>
							<div class="col-sm-5">
								<input type="datetime" name="time_begin" class="form-control" ng-model="posts.time_begin">
							</div>
							<label class="col-sm-2" id="status">Status : Draff</label>
						</div>
						<div class="form-group" id="dateend">
							<label class="col-sm-7">Date End Public : 1/1/3000</label>
							<!-- <div class="col-sm-5">
								<input type="datetime" name="time_end" class="form-control" ng-model="posts.time_end"> 
							</div> -->
							<div class="col-sm-2"></div>
						</div>
						<div class="form-group" id="article" >
							<input  type="text" name="title" ng-model='title' style="width: 100%" >
						</div>
						<div>
							<textarea class="form-control ckeditor" rows="7" cols="10" id="editor1" ng-model="posts.content" name="content"></textarea>
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4" id="creatfinish">
								<button class="btn btn-primary" type="submit" ng-click="creatpost()">Creat Finish</button>
							</div>	
							<div class="col-md-4"></div>
						</div>	
					</div>
					<div class="col-md-3">
						<div class=" box-solid">
							<div id="thumbnail">
								<p>Thumbnail</p>
                <div ngf-drop ngf-select  ng-model="thumbnail" class="drop-box"  ngf-max-size="320MB"
              ngf-drag-over-class="'dragover'" ngf-multiple="true" ngf-allow-dir="true"
              accept="image/*"  ngf-pattern="'image/*'" >{{ trans('web.add_new_image') }}
	              	<div class="re-thumbnail">
	              		<img ngf-thumbnail="thumbnail[0]" class="thumb">	
	              	</div>	
          			</div>
							</div>
							<div id="release">
								<span>Release Number</span>
								<select id="selectrelease">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
							<div id="display">
								<p>Display Top</p>
								<input type="checkbox" checked data-toggle="toggle" data-size="mini">
							</div>
							<div id="category">
								<p>Category</p>
								<ul class="sidebar-menu" data-widget="tree" ng-repeat="category in categories">
									<li class="">
					          <input type="checkbox" name="">
					            <span ng-click="listcategorychil(category.id_category)">@{{ category.name }}</span>
					            <span class="pull-right-container">
					              <i class="fa fa-angle-left pull-right"></i>
					            </span>
					          <ul class="" ng-if = "catChildren.key ==  category.id_category">
					            <li  ng-repeat="cat in catChildren.data"><i class="fa fa-circle-o"></i>
					            	<input type="checkbox" name="">
					            	<span ng-bind="cat.name"></span>
					            </li>
					          </ul>
					        </li>							
								</ul>
							</div>
							<div id="image">
								<p>Image for Post</p>
                <div ngf-drop  ng-model="file" class="drop-box"  ngf-max-size="320MB"
		              ngf-drag-over-class="'dragover'" ngf-multiple="true" ngf-allow-dir="true"
		              accept="image/*"  ngf-pattern="'image/*'">{{ trans('web.add_new_image') }}
		              <div class= "re-image" >  
		              	<div class="box-image" ng-repeat="img in files" > 
		              		<img  ngf-thumbnail="img" class="thumb">	
		              		<a href="" class="btn-dele-img" ng-click="deleteImagePost($index)">
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
@section('bottom-js')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/frontend/extension/uploadImage.js') }}"></script>
<script src="{{ asset('assets/frontend/page/post/PostCtrl.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/PostResource.js') }}"></script>
<script>
	$(document).ready(function(){
    // Basic
    $('.dropify').dropify({
      messages: {
        default: 'ここに画像をドラッグ',
        //replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
        remove:  '削除',
        error:   'Có lỗi xảy ra, vui lòng thử lại'
      }
    });
  });
</script>

@endsection 

		      
					
	          	
									
