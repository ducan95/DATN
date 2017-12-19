@extends('templates.master')
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
                  <th style="width: 10px">STT</th>
                  <th>Tên danh mục</th>
                  <th>Chức năng</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr ng-repeat='category in categories'> 
                  <td>@{{ category.id_category }}</td>
                  <td>@{{ category.name }}</td>
                  <td>
                    	<a href="{{ route('webCategorEdit') }}"><button class="btnMize btn btn-primary">Sửa</button></a>                
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
              <h3 class="box-title">Striped Full Width Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Clean database</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Cron job running</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Fix and squish bugs</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <div>
            <a href="{{ route('webCategoryAddChildren') }}"><button type="button" class="btn btn-primary">Add Category Children</button></a>
              
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