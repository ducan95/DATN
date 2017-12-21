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
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Name</th>
                  <th>Update</th>
                  <th style="width: 40px">Delete</th>
                </tr>
                <tr ng-repeat='category in categories'> 
                  <td style="cursor: pointer;" ng-click="changeToCategoryChil(category.id_category)">@{{ category.id_category }}</td>
                  <td style="cursor: pointer;" ng-click="changeToCategoryChil(category.id_category)">@{{ category.name }}</td>
                  <td>
                    	<a href="{{ route('webCategorEdit') }}"><button class="btnMize btn btn-primary">Update</button></a>                
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                        Delete
                    </button>
                  </td>
                    <div id="myModal"  class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete Category Parent?</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary">Yes</button>
                          </div>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
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
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên Danh Mục</th>
                  <th>Sửa</th>
                  <th style="width: 40px">Xóa</th>
                </tr>
                <tr ng-repeat='categoryChil in categoryChildren'>
                  <td>@{{ categoryChil.id_category }}</td>
                  <td>@{{ categoryChil.name}}</td>
                  <td>
                      <a href="{{ route('webCategorEdit') }}"><button class="btnMize btn btn-primary">Update</button></a>                
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                        Delete
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <div>
            <a href="" ng-click="redirectAddChil(categoryParent.id_category_parent)"><button   type="button" class="btn btn-primary">Add Category Children</button></a>
              
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
<!-- Toggle -->		
<script src="{{ asset('assets/base/bower_components/bootstrap/dist/js/bootstrap-toggle.min.js') }}"></script>
<!-- Edit table -->
<script src="{{ asset('assets/frontend/page/category/Category.js') }}"></script>
<script src="{{ asset('assets/frontend/resource/CategoryResource.js') }}"></script>
@endsection 
              
