@extends('templates.master')
@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tạo mới người dùng
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
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            {{--  <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>  --}}
            <!-- /.box-header -->
            <form role="form">
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Tên người dùng</th>
                  <th>Quyền hạn</th>
                  <th>Email</th>
                  <th>Password</th>
                </tr>
                <tr>
                  <td>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        {{--  <label>Chọn Q</label>  --}}
                        <select class="form-control">
                            <option>Admin</option>
                            <option>option 2</option>
                            <option>option 3</option>
                            <option>option 4</option>
                            <option>option 5</option>
                        </select>
                    </div>
                  </td>
                  <td>
                   <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter password">
                    </div>
                  </td>
                </tr>
              </table>

              <div class="row" style="margin-top: 30px;">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <button type="button" class="btn btn-primary" style="margin-right:5px;">Add</button>
                    <button type="button" class="btn btn-primary" style="margin-left:5px;">Cancel</button>
                </div>
                 <div class="col-md-4"></div>
              </row>
            </div>
            <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->

@endsection    