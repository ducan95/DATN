@extends('admin.templates.master')
@section('content')

<div ng-controller='CategoryChildrenAddCtrl'>
	<section class="content-header">
		<h2>子カテゴリー追加</h2>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<form class="form-horizontal" ng-submit='addCategoryChil()' method="post" id="main">
						{{ csrf_field() }}	
					 <div class="box-body">
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">子カテゴリー名称</label>
                <div class="col-sm-9">
                 <input class="form-control" ng-model="categorychil.name" placeholder="" name="name" type="text" >
                  <label class="error" ng-if="error.name[0] != null" ng-bind="error.name[0]"></label>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">アドレス用英字名称</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model='categorychil.slug' name="slug" placeholder="" >
                  <label class="error" ng-if="error.slug[0] != null" ng-bind="error.slug[0]"></label>
                </div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">グローバルナビ表示</label>
              	<div class="col-sm-9">
              		<input type="checkbox" name="global_status" value="1" ng-model="categorychil.global_status">
                  <label class="error" ng-if="error.global_status[0] != null" ng-bind="error.global_status[0]"></label>
                </div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">メニューバー表示</label>
              	<div class="col-sm-9">
              		<input type="checkbox"  name="menu_status" value="1" ng-model="categorychil.menu_status">
                  <label class="error" ng-if="error.menu_status[0] != null" ng-bind="error.menu_status[0]"></label>
                </div>
              </div>
              <div class="form-group">
              	<label class="col-sm-3 control-label">親カテゴリー</label>
              	<div class="col-sm-9">
                    <select type="text" class="form-control" ng-options="cate.id_category as cate.name for cate in categorytparent" ng-model="categorychil.parent_category" name="parent">
                      <option value="">---親カテゴリー---</option>
                    </select>
                    <label class="error" ng-if="error.parent[0] != null" ng-bind=" error.parent[0]"></label>
              	</div>
              </div>
              <div class="row" style="padding-bottom: 20px">
              	<div class="col-md-4"></div>
		            <div class="col-md-4">
                  <button type="submit" class="btn btn-primary" style="margin-left: 95px" data-toggle="modal" data-target="#myModal"> 登録する</button>
                </div>  
								<div class="col-md-4">
                    <a href="{{route('webCategoryIndex')}}"><button type="button" class="btn btn-primary" style="margin-left: -200px">キャンセル</button></a>
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
<!-- Validatejs -->
<script src="{{ asset('assets/base/bower_components/validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>

@endsection 
				             

	              
		
			

                



		              	


							
	             
