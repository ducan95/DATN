@extends('admin.templates.master')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/base/bower_components/sweetalert2/dist/sweetalert2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/theme/css/posts.css') }}">
@endsection

@section('content')

<div ng-controller="CreatpostCtrl">
	<section class="content-header">
		<h2>Creat New Post</h2>
	</section>
	<section class="content">
		<div class="row">
				<form id="main" role="form" ng-submit="creatpost(posts)">
					<div class="col-md-9">
						<div class="form-group">
							<label class="col-sm-2">Date Start Public</label>
							<div class="col-sm-5">
								<input type="datetime" name="time_begin" class="form-control" ng-model="posts.time_begin">
							</div>
							<label class="col-sm-2" id="status">Status</label>
							<div class="col-sm-2">
								<select ng-model="posts.status" ng-options="st.key as st.value for st in status">
								</select>
							</div>
						</div>
						<div class="form-group" id="dateend">
							<label class="col-sm-2">Date End Public</label>
							<div class="col-sm-5">
								<input type="datetime" name="time_end" class="form-control" ng-model="posts.time_end"> 
							</div>
							<div class="col-sm-2"></div>
						</div>
						<div class="form-group" id="article">
							<p>Article Title</p>
						</div>
						<div>
							<textarea class="form-control ckeditor" rows="7" cols="10" id="editor1" ng-model="posts.content" name="content"></textarea>
						</div>
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4" id="creatfinish">
								<button class="btn btn-primary" type="submit" ng-click="creatpost(posts)">Creat Finish</button>
							</div>	
							<div class="col-md-4"></div>
						</div>	
					</div>
					<div class="col-md-3">
						<div class="box box-solid">
							<div id="thumbnail">
								<p>Thumbnail</p>
                <input  type="file" id="input-file" class="dropify" name="thumbnail_path" ng-model="posts.thumbnail_path" />
							</div>
							<div id="release">
								<span>Release Number</span>
								<select id="selectrelease">
									<option>No</option>
								</select>
							</div>
							<div id="display">
								<p>Display Top</p>
								<input type="checkbox" name="" style="margin-left:100px">
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
					          <ul class="" ng-if = "categoryChildren.key ==  category.id_category">
					            <li  ng-repeat="cate in categoryChildren.data"><i class="fa fa-circle-o"></i>
					            	<input type="checkbox" name="">
					            	<span ng-bind="cate.name"></span>
					            </li>
					          </ul>
					        </li>							
								</ul>
							</div>
	
							<div id="image">
								<p>Image for Post</p>
                <input type="file" id="input-file" class="dropify" />
							</div>
						</div>
					</div>
				</form>
		</div>
	</section>	
</div>

@endsection
@section('bottom-js')
<script type="text/javascript" src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/base/bower_components/dropify/dist/js/dropify.min.js') }}"></script>

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

		      
					
	          	
									
