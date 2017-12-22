@extends('admin.templates.master')
@section('content')
<div ng-controller="CategoryCtrl">
	<h2 style="margin-top: 0px;padding-top: 25px;padding-left: 15px">List Category</h2>
	 <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover">
                <tr>
                  <th style="width: 10px">No</th>
                  <th style="padding-left: 50px">Name</th>
                  <th>Slug</th>
                  <th style="padding-left: 50px">Status</th>
                </tr>
                <tr ng-repeat='category in categories'> 
                  <td>@{{ $index +1}}</td>
                  <td style="cursor: pointer;padding-left: 50px" ng-click="changeToCategoryChil(category.id_category)">@{{ category.name }}</td>
                  <td>@{{ category.slug }}</td>
                  <td>
                    	<a href="" ng-click="redirecteditparent(category.id_category)"><button class="btnMize btn btn-primary"><i class="fa fa-edit"></i>Update</button></a>                
                    <button type="button" class="btn btn-danger" href="javascript:void(0)"
                    ng-click="deleteCategory(category.id_category)"><i class="fa fa-trash-o"></i>
                      Delete
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>
            <a href="{{ route('webCategoryAdd') }}"><button type="button" class="btn btn-primary">Add Category Parent</button></a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover">
                <tr>
                  <th style="width: 10px">No</th>
                  <th style="padding-left: 50px">Name</th>
                  <th>Slug</th>
                  <th style="padding-left: 50px">Status</th>
                </tr>
                <tr ng-repeat='categoryChil in categoryChildren'>
                  <td>@{{ $index + 1 }}</td>
                  <td style="padding-left: 50px">@{{ categoryChil.name}}</td>
                  <td>@{{ categoryChil.slug }}</td>
                  <td>
                    <a href="" ng-click="redirecteditchil(categoryChil.id_category)"><button class="btnMize btn btn-primary"><i class="fa fa-edit"></i>Update</button></a>
                    <button type="button" class="btn btn-danger" href="javascript:void(0)"
                    ng-click="deleteCategoryChil(categoryChil.id_category)"><i class="fa fa-trash-o"></i>
                      Delete
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <div>
            <!-- <a href="" ng-click="redirectAddChil(categoryParent.id_category_parent)"><button   type="button" class="btn btn-primary">Add Category Children</button></a> -->
            <a href="{{ route('webCategoryAddChildren')}}"><button type="button" class="btn btn-primary">Add Category Children</button></a>
              
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
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
@endsection 
              
                     
                 
                  
