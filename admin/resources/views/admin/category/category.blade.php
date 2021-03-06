@extends('admin.templates.master')

@section('title')
{{trans('web.category')}}
@endsection 

@section('content')
<div ng-controller="CategoryCtrl">
    <section class="content-header">
  	 <h1 class="mg-bt-25">カテゴリー一覧</h1>
    </section>
	 <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover">
                <tr><th colspan="2">親カテゴリー</th></tr>
                <tr ng-repeat='category in categories' ng-class="{'active':category.id_category==states.categoryactive}" id="a" class="category" ng-click="states.categoryactive=category.id_category"> 
                  <td style="cursor: pointer;padding-left: 50px" ng-click="changeToCategoryChil(category.id_category)" ng-bind="category.name"></td>
                  <td>
                    	<a href="" ng-click="redirecteditparent(category.id_category)"><button class="btnMize btn btn-primary">編集</button></a>
                    <button type="button" class="btn btn-danger" href="javascript:void(0)"
                    ng-click="deleteCategory(category.id_category)">
                      削除
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>
            <a href="{{ route('webCategoryAdd') }}"><button type="button" class="btn btn-primary">親カテゴリーを追加する</button></a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover">
                <tr><th colspan="2">子カテゴリー</th></tr>
                <tr ng-repeat='categoryChil in categoryChildren'>
                  <td ng-bind="$index + 1"></td>
                  <td style="padding-left: 50px" ng-bind="categoryChil.name"></td>
                  <td ng-bind="categoryChil.slug"></td>
                  <td>
                    <a href="" ng-click="redirecteditchil(categoryChil.id_category)"><button class="btnMize btn btn-primary">編集</button></a>
                    <button type="button" class="btn btn-danger" href="javascript:void(0)"
                    ng-click="deleteCategoryChil(categoryChil.id_category)"></i>
                      削除
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <div>
            <a href="{{ route('webCategoryAddChildren')}}"><button type="button" class="btn btn-primary">子カテゴリーを追加する</button></a>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    
    </section>
    
</div>
@stop  

@section('bottom-js')
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
@endsection 
              
                     
                 
                  
