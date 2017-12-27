@extends('admin.templates.master')
@section('content')

	<section class="content-header">
		<div class="row">
			<div class="col-md-2">
				<h1>
		      List Post
		    </h1>
		  </div>
		  <div class="col-md-2">
		    	<a href="{{ route('webPostAdd')}}"><button class="btn btn-primary" style="margin-top:20px ">Creat New Post</button></a>
		  </div>
    </div>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Simple</li>
    </ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-2">
				<label>Release Number</label>
			</div>
			<div class="col-md-2">
				<label>Category Parent</label>
			</div>
			<div class="col-md-2">
				<label>Category Children</label>
			</div>
			<div class="col-md-1">
				<label>Status</label>
			</div>
			<div class="col-md-1">
				<label>Creator</label>
			</div>
			<div class="col-md-2"> 
				<label>Keyword</label>
			</div>
			<a href="#"><button class="btn btn-primary" style="margin-left: 50px">Search</button></a>
		</div>
		<div class="row">
			<div class="col-md-2">
				<select style="width: 100px">
					<option>All</option>
				</select>
			</div>
			<div class="col-md-2">
				<select style="width: 100px">
					<option>All</option>
				</select>
			</div>
			<div class="col-md-2">
				<select style="width: 100px">
					<option>All</option>
				</select>
			</div>
			<div class="col-md-1">
				<select style="width: 50px">
					<option>All</option>
				</select>
			</div>
			<div class="col-md-1">
				<select style="width: 50px"> 
					<option>All</option>
				</select>
			</div>
			<div class="col-md-2">
				<input type="text">
			</div>
		</div>
		<div class="btn-group" role="group" style="margin-top: 10px">
			<a href="#"><button type="button" class="btn btn-primary">Draff</button></a>
			<a href="#"><button type="button" class="btn btn-primary">List Confirm</button></a>
		</div>
		<div class="box" style="margin-top: 10px">
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">Thumbnail</th>
            <th>Title</th>
            <th>Creator</th>
            <th>Category</th>
            <th>Release Number</th>
            <th>Date Public</th>
            <th>status</th>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
								<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Quick Edit</button>
								<form id="myModal" class="modal fade" role="dialog">
									<div class="modal-dialog">
								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Quick Edit</h4>
								      </div>
								      <div class="modal-body">
								        <div class="row">
								        	<div class="form-group">
							        			<label class="col-md-3">Post Title</label>
							        			<div class="col-md-9">
							        				<input type="text" name="" class="form-control">
							        			</div>
								        	</div>
								        	<div class="form-group" style="padding-top: 40px">
							        			<label class="col-md-3">Release Number</label>
							        			<div class="col-md-9">
							        				<select class="form-control">
							        					<option>ABC</option>
							        				</select>
							        			</div>
								        	</div>
								        	<div class="form-group" style="padding-top: 40px">
							        			<label class="col-md-3">Date Start</label>
							        			<div class="col-md-5">
							        				<input type="date" name="" class="form-control">
							        			</div>
							        			<div class="col-md-4">
							        				<input type="text" name="" class="form-control">
							        			</div>
								        	</div>
								        	<div class="form-group" style="padding-top: 40px">
							        			<label class="col-md-3">Date End</label>
							        			<div class="col-md-5">
							        				<input type="date" name="" class="form-control">
							        			</div>
							        			<div class="col-md-4">
							        				<input type="text" name="" class="form-control">
							        			</div>
								        	</div>
								        	<div class="form-group" style="padding-top: 40px">
							        			<label class="col-md-3">Status</label>
							        			<div class="col-md-9">
							        				<select>
							        					<option>ABC</option>
							        				</select>
							        			</div>
								        	</div>
								        </div>
								      </div>
								    <div class="modal-footer">
								        <button type="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
								      </div>
								    </div>
								  </div>						
								</form>
							<a href="#"><button class="btn btn-primary">Nhan Ban</button></a>
							<a href="#"><button class="btn btn-primary">View</button></a>
							<a href="#"><button class="btn btn-primary">Edit</button></a>
            </td>
          </tr>
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>

		<!-- <div class="row" style="border: solid 1px; margin-top: 20px;margin-left: 77px">
			<div class="col-md-1"></div>
			<div class="col-md-2">Thumbnail</div>
			<div class="col-md-2">Post title</div>
			<div class="col-md-2">Creator</div>
			<div class="col-md-2">Category</div>
			<div class="col-md-1">Release Number</div>
			<div class="col-md-2">Date time</div>
		</div> -->

		<!-- <div class="row" style="border: solid 1px; margin-top: 5px">
			<div class="col-md-1" style="border: solid 1px">
				<a href="#"><button class="btn btn-primary">Edit</button><i class="fa fa-edit"></i></a>
			</div>
			<div class="col-md-11" style="border: solid 1px;">
					<div class="col-sm-2">Content Thumbnail</div>
					<div class="col-sm-2">Content Post title</div>
					<div class="col-sm-2">Content Creator</div>
					<div class="col-sm-2">Content Category</div>
					<div class="col-sm-2">Content Release Number</div>
					<div class="col-sm-2">Content Date time</div>
			</div> -->
			<!-- <div class="col-md-11" style="margin-top: 10px">
				<div class="col-sm-6 btn-group">
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Quick Edit</button>
					<form id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
					    <!-- Modal content-->
					    <!-- <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Quick Edit</h4>
					      </div>
					      <div class="modal-body">
					        <div class="row">
					        	<div class="form-group">
					        			<label class="col-md-3">Post Title</label>
					        			<div class="col-md-9">
					        				<input type="text" name="" class="form-control">
					        			</div>
					        	</div>
					        	<div class="form-group" style="padding-top: 40px">
				        			<label class="col-md-3">Release Number</label>
				        			<div class="col-md-9">
				        				<select class="form-control">
				        					<option>ABC</option>
				        				</select>
				        			</div>
					        	</div> -->
					        	<!-- <div class="form-group" style="padding-top: 40px">
				        			<label class="col-md-3">Date Start</label>
				        			<div class="col-md-5">
				        				<input type="date" name="" class="form-control">
				        			</div>
				        			<div class="col-md-4">
				        				<input type="text" name="" class="form-control">
				        			</div>
					        	</div>
					        	<div class="form-group" style="padding-top: 40px">
				        			<label class="col-md-3">Date End</label>
				        			<div class="col-md-5">
				        				<input type="date" name="" class="form-control">
				        			</div>
				        			<div class="col-md-4">
				        				<input type="text" name="" class="form-control">
				        			</div>
					        	</div>
					        	<div class="form-group" style="padding-top: 40px">
				        			<label class="col-md-3">Status</label>
				        			<div class="col-md-9">
				        				<select>
				        					<option>ABC</option>
				        				</select>
				        			</div>
					        	</div>
					        </div>
					      </div>
					    <div class="modal-footer">
					        <button type="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
					      </div>
					    </div>
					  </div>						
					</form>
					<a href="#"><button class="btn btn-primary">Nhan Ban</button></a>
					<a href="#"><button class="btn btn-primary">View</button></a>
			</div> --> -->
		</div>
	</section>
@endsection

		      
