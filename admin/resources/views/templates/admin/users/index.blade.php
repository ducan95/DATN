@extends('templates.master')
@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách người dùng
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row" style="margin-bottom: 15px;margin-top:15px;">
        <div class="col-md-2">
            <a href="" class="btn btn-block btn-success">Add new</a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            {{--  <div class="box-header">
              <h3 class="box-title">List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>  --}}
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="user-table">
                <tr>
                  <th>#No</th>
                  <th>Tên user</th>
                  <th>Quyền hạn</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Chức năng</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>Admin</td>
                  <td>JohnDoe@hotmail.com</td>
                  <td>**********</td>
                  <td>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                  </td>  
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>Admin</td>
                  <td>JohnDoe@hotmail.com</td>
                  <td>**********</td>
                  <td>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                  </td>  
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>Admin</td>
                  <td>JohnDoe@hotmail.com</td>
                  <td>**********</td>
                  <td>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                  </td>  
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>Admin</td>
                  <td>JohnDoe@hotmail.com</td>
                  <td>**********</td>
                  <td>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                  </td>  
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>Admin</td>
                  <td>JohnDoe@hotmail.com</td>
                  <td>**********</td>
                  <td>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                  </td>  
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>Admin</td>
                  <td>JohnDoe@hotmail.com</td>
                  <td>**********</td>
                  <td>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                  </td>  
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>Admin</td>
                  <td>JohnDoe@hotmail.com</td>
                  <td>**********</td>
                  <td>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                  </td>  
                </tr>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->

@endsection  

@section('bottom-js')
<!-- Edit table -->
<script src="{{ asset('assets/theme/js/jquery.tabledit.min.js') }}"></script>
<script src="{{ asset('assets/theme/js/edit-table.js') }}"></script>
@endsection 